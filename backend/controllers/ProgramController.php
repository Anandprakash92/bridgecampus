<?php

namespace backend\controllers;

use Yii;
use common\models\Program;
use common\models\search\ProgramSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use common\models\MasterFileUpload;
use yii\helpers\FileHelper;


/**
 * ProgramController implements the CRUD actions for Program model.
 */
class ProgramController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Program models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProgramSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Program models.
     * @return mixed
     */
    public function actionCourses($id)
    {
        $program = Program::findOne($id);
        $searchModel = new ProgramSearch();
        $dataProvider = $searchModel->courses(Yii::$app->request->queryParams,$id);
        //print_r($dataProvider->getModels());exit;
        return $this->render('courses', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'program' => $program
        ]);
    }

    /**
     * Displays a single Program model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /**
     * Creates a new Program model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Program();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success', 'Created Successfully.');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Program model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success', 'Updated Successfully.');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Program model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Program model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Program the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Program::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionProgramList($q = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select(["id", new \yii\db\Expression("name AS text")])
            ->from('program')
            ->where(['like', 'name', $q])
            ->andWhere(['status'=>1])
            ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        return $out;
    }
    
    public function actionMasterCourseFileUpload() {
        
        $model = new MasterFileUpload();
        if ($model->load(Yii::$app->request->post())) {  
            $filename = time();
            $urlImage = \yii\web\UploadedFile::getInstance($model, 'name');
            
            if(!empty($urlImage))
            {
                $model->name = $filename.".".pathinfo($urlImage->name, PATHINFO_EXTENSION);
                $model->urlImage = $urlImage->name;
                if(!$model->save()) {
                    \Yii::$app->getSession()->setFlash('error', "Unable to saveMaster Upload data");
                }
            }
            $uploadPath = Yii::$app->myhelper->getUploadPath(3,@Yii::$app->params['uID'])."program/";
           
            FileHelper::createDirectory($uploadPath,0775,true);
            
            $urlImage->saveAs($uploadPath.$model->name);
            
            require_once dirname(__FILE__) . '/../../vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php';
            
            $inputFileName = $uploadPath.$model->name;
            if(file_exists($inputFileName)) {
                try {
                    $transaction = Yii::$app->db->beginTransaction();
      
                    $inputFileType = \PHPExcel_IOFactory::identify($uploadPath.$model->name);
                    $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);
                    
                    //  Get worksheet dimensions
                    $sheet = $objPHPExcel->getSheet(0); 
                    $highestRow = $sheet->getHighestRow(); 
                    $highestColumn = $sheet->getHighestColumn();
                    
                    for ($row = 1; $row <= $highestRow; ++ $row) 
                    {
                        $rowsData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row, NULL,TRUE,FALSE);
                        if($row == 1)
                        {
                            continue;
                        }
                        $programModel = new Program();
                        $programModel->name = $rowsData[0][0];
                        $programModel->short_name = $rowsData[0][1];
                        $programModel->description = $rowsData[0][2];
                        $programModel->status = $rowsData[0][3] == 'Active'?1:0;
                        $programModel->save();
                    }
                    $transaction->commit();
                }catch(Exception $error){
                    print_r($error);
                    $transaction->rollback();
                }
            }   
        }
        return $this->render('file-upload', [
            'model' => $model
        ]);
    }
    
    public function actionDownload()
    {
        $path = Yii::getAlias('@webroot').'/uploads/masterFile/program/';
        $file = $path . '/program.xlsx';

        if (file_exists($file)) {
            Yii::$app->response->sendFile($file);
        }
    }
}
