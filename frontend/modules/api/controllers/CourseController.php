<?php

namespace frontend\modules\api\controllers;

use yii\web\Controller;
use common\models\Courses;

/**
 * Courses controller for the `api` module
 */
class CourseController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionGetCources()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        \Yii::$app->response->statusCode = 200;
        $course = Courses::findAll(['status' => 1]);
        
        return array('status' => true, 'data'=> $course, 'count'=> count($course), 'message'=>'Course list');
    }
}