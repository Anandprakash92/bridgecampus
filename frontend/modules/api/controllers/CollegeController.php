<?php

namespace frontend\modules\api\controllers;

use yii\web\Controller;
use common\models\College;

use Yii;
use common\models\University;
use common\models\Courses;
use common\models\search\CollegeSearch;
//use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\web\Response;
use yii\bootstrap\ActiveForm;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use common\models\UniversityCollegeCourse;
use common\models\search\UniversityCollegeCourseSearch;
use common\models\search\CollegeTestimonialSearch;
use common\models\CollegeTestimonial;
use common\models\CollegeGallery;
use yii\web\UploadedFile;
use common\models\Approved;
use common\models\Accredite;
use common\models\CollegeReview;
use common\models\Accredited;
use common\models\Affiliate;
use common\models\CourseDetails;
use yii\helpers\ArrayHelper;
use common\models\search\FacilitySearch;
use common\models\Facility;
use common\models\search\ReviewSearch;
use common\models\Review;
use common\models\CollegeUniversityAdvpurpose;
use common\models\search\CollegeUniversityAdvpurposeSearch;
use common\models\CourseSpecialization;
use common\models\UniversityCollegeCourseSpecialization;
use common\models\Exam;
use common\models\MasterFileUpload;
use common\models\FacilityGallery;
use yii\base\Model;

/**
 * College controller for the `api` module
 */
class CollegeController extends Controller
{
    
    public static function allowedDomains()
    {
        return [
            // '*',                        // star allows all domains
            'https://bridgecampus.in/',
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Request-Method'    => ['POST', 'GET'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                ],
            ],

        ]);
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionGetCollege()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        \Yii::$app->response->statusCode = 200;
        $college = College::findAll(['status' => 1]);
        
        return array('status' => true, 'data'=> $college, 'count'=> count($college), 'message'=>'College list');
    }
    
    
    protected function findModel($id)
    {
        if (($model = College::findOne($id)) !== null) {
            Yii::$app->params['cTitle'] = $model->name;
            Yii::$app->params['cID'] = $model->id;
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionGetCollegeData() {
        
        $id = Yii::$app->getRequest()->getQueryParam('id');

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        \Yii::$app->response->statusCode = 200;
        
        $model = College::findOne($id);
        
        if(!empty($model->approved_by)){
            $model->approved_by = ArrayHelper::map(Approved::find()->where(new \yii\db\Expression("id IN(".$model->approved_by.")"))->asArray()->all(),'id','name');
        }else{
            $model->approved_by = [];
        }

        if(!empty($model->accredited_by)){
            $model->accredited_by = ArrayHelper::map(Accredited::find()->where(new \yii\db\Expression("id IN(".$model->accredited_by.")"))->asArray()->all(),'id','name');
        }else{
            $model->accredited_by = [];
        }

        if(!empty($model->affiliate_to)){
            $model->affiliate_to = ArrayHelper::map(Affiliate::find()->where(new \yii\db\Expression("id IN(".$model->affiliate_to.")"))->asArray()->all(),'id','name');
        }else{
            $model->affiliate_to = [];
        }
//        
        $ownership = Yii::$app->myhelper->getOwnership();
        if(!empty($model->ownership) && isset($ownership[$model->ownership])){

            $model->ownership = $ownership[$model->ownership];
        }
        
        //Type 1->Image Type 2->video
        $fileType = "image";
        $fileList = CollegeGallery::find()->where(['collegeID'=>$model->id,'type'=>1])->all();
        $fBasePath = Yii::$app->myhelper->getFileBasePath(2,$model->id,1);
        
        //Video
        $videoList = CollegeGallery::find()->where(['collegeID'=>$model->id,'type'=>2])->all();
        $videoPath = Yii::$app->myhelper->getFileBasePath(2,$model->id,2);

        $courseGallery = [
            'fileList' => $fileList,
            'fileType'=>$fileType,
            'fBasePath' => $fBasePath,
            'videoList' =>$videoList,
            'videopath' => $videoPath
        ];
        
        //$type = 'college';
        
        $query = new Query;
        $query	->select(['courses.name'])  
                ->from('university_college_course')
                ->leftJoin('courses', 'courses.id = university_college_course.courseID ')
//                ->leftJoin('program', 'program.id = university_college_course.collegeID')
                ->where(['university_college_course.collegeID'=>$id]);
        

        $command = $query->createCommand();
        $courses= $command->queryAll();
        
        $fquery = new Query;
        $fquery	->select(['campus_facilities.name'])  
                ->from('facility')
                ->leftJoin('campus_facilities', 'campus_facilities.id = facility.ftype ')
//                ->leftJoin('program', 'program.id = university_college_course.collegeID')
                ->where(['facility.coll_univID'=>$id])
                ->andWhere(['type'=>2]);
        

        $fcommand = $fquery->createCommand();
        $facility= $fcommand->queryAll();
        
        return array('status' => true, 'data'=> $model, 
            'gallery'=> $courseGallery, 
            'courses'=>$courses, 
            'facility'=>$facility,
            'message'=>'College View');
       
        
    }
}