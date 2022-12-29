<?php

namespace backend\controllers;

use Yii;
use common\models\Specialization;
use common\models\search\SpecializationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use common\models\TopRecruiters;
use common\models\SpecializationRecruiters;
use common\models\MasterFileUpload;
use yii\helpers\FileHelper;

/**
 * SpecializationController implements the CRUD actions for Specialization model.
 */
class SpecializationController extends Controller
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
     * Lists all Specialization models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SpecializationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Specialization model.
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
     * Creates a new Specialization model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Specialization();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success', 'Created Successfully.');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Specialization model.
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
     * Deletes an existing Specialization model.
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


    public function actionSpecializationList($q = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select(["id", new \yii\db\Expression("name AS text")])
            ->from('specialization')
            ->where(['like', 'name', $q])
            ->andWhere(['status'=>1])
            ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        return $out;
    }

    public function actionAddRecruiters($id){
        $specialization = $this->findModel($id);
        $recruiters = ArrayHelper::map(TopRecruiters::find()->where(['status'=>1])->all(),'id','short_name');
        $csmodel = new SpecializationRecruiters();


        $oldRecruiters = ArrayHelper::getColumn(SpecializationRecruiters::find()->where(['specializationID'=>$specialization->id])->asArray()->all(),'topRecruitersID');


        
        $csmodel->topRecruitersID = $oldRecruiters;

        $csmodel->specializationID = $specialization->id;

        if ($csmodel->load(Yii::$app->request->post())) {
            $newRecruiters = [];
            if(!empty($csmodel->topRecruitersID)){
               $newRecruiters = array_diff((array)$csmodel['topRecruitersID'], (array)$oldRecruiters); 
            }
            
            $deletedSpecializations = array_diff((array)$oldRecruiters,(array)$csmodel['topRecruitersID']);

            foreach ($newRecruiters as $key => $recruiter) {
                $ncsmodel = new SpecializationRecruiters();
                $ncsmodel->specializationID = $specialization->id;
                $ncsmodel->topRecruitersID = $recruiter;
                if(!$ncsmodel->save()){
                    //print_r($nucmodel);exit;
                }    
            }

            if(!empty($deletedSpecializations))
            {
                SpecializationRecruiters::deleteAll(['specializationID' => $specialization->id, 'topRecruitersID' =>  array_values($deletedSpecializations)]);
            }

            \Yii::$app->getSession()->setFlash('success', 'Recruiters successfully added in specialization '.$specialization->name.".");
            
            return $this->redirect(['add-recruiters','id'=>$specialization->id]);
        }

        
        return $this->render('add_recruiters', [
            'specialization' => $specialization,
            'recruiters'=>$recruiters,
            'csmodel' => $csmodel,
        ]);
    }

    /**
     * Finds the Specialization model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Specialization the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Specialization::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
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
            $uploadPath = Yii::$app->myhelper->getUploadPath(3,@Yii::$app->params['uID'])."specialization/";
           
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
                        $specModel = new Specialization();
                        $specModel->name = $rowsData[0][0];
                        $specModel->specialisation_short_name = $rowsData[0][1];
                        $specModel->specialisation_type = $rowsData[0][2] == 'Single Specialisation' ?1:2;
                        $specModel->course_overview = $rowsData[0][3];
                        $specModel->job_profile = $rowsData[0][4];
                        $specModel->status = $rowsData[0][5];
                        $specModel->save();
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
        $path = Yii::getAlias('@webroot').'/uploads/masterFile/specialization/';
        $file = $path . '/specialisation.xlsx';

        if (file_exists($file)) {
            Yii::$app->response->sendFile($file);
        }
    }
}
