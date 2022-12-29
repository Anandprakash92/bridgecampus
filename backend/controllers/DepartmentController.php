<?php

namespace backend\controllers;

use Yii;
use common\models\Department;
use common\models\search\DepartmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\models\UniversityCollegeCourse;
use common\models\Courses;
use common\models\DepartmentCourse;

/**
 * DepartmentController implements the CRUD actions for Department model.
 */
class DepartmentController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Department models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DepartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Department model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Department model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Department();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success', 'Department Created Successfully.');
            return $this->redirect(['department/index']);
        }

        return $this->render('_form', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Department model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           \Yii::$app->getSession()->setFlash('success', 'Department Updated Successfully.');
            return $this->redirect(['department/index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Department model.
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
     * Finds the Department model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Department the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Department::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAddDepartmentCourses($id) {

        $department = $this->findModel($id);
        $courses = ArrayHelper::map(Courses::find()->where(['status'=>1])->all(),'id','name');
        $departmentModel = new DepartmentCourse();
        
        $oldCourses = ArrayHelper::getColumn(DepartmentCourse::find()->where(['departmentID'=>$id])->asArray()->all(), 'courseID');
      
        $departmentModel->departmentID = $oldCourses;

        if ($departmentModel->load(Yii::$app->request->post())) {
            $datas = Yii::$app->request->post();
           
            $newCourses = [];
            if(!empty($departmentModel->departmentID)){
                $newCourses = array_diff((array)$datas['DepartmentCourse']['departmentID'], (array)$oldCourses);
            }
            $deletedCourses = array_diff((array)$oldCourses,(array)$departmentModel['departmentID']);

            foreach ($newCourses as $key => $courseData) {
                $dpmodel = new DepartmentCourse();
                $dpmodel->courseID = $courseData;
                $dpmodel->departmentID = $department->id;
                if(!$dpmodel->save()){
                    echo "<pre>";
                    print_r($dpmodel->getErrors());
                    echo "</pre>";
                    exit;
                }    
            }

            if(!empty($deletedCourses))
            {       
                DepartmentCourse::deleteAll(['departmentID' => $department->id, 'courseID' =>  array_values($deletedCourses)]);
            }
            \Yii::$app->getSession()->setFlash('success', 'Course successfully added in Department '.$department->name.".");           
            return $this->redirect(['add-department-courses','id'=>$department->id]);
        }
        
        
        return $this->render('add_department_courses', [
            'department' => $department,
            'courses'=>$courses,
            'ucmodel' => $departmentModel
        ]);
    }
}
