<?php

namespace frontend\modules\api\controllers;

use yii\web\Controller;
use common\models\Courses;

/**
 * Courses controller for the `api` module
 */
class CourseController extends Controller
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
    public function actionGetCources()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        \Yii::$app->response->statusCode = 200;
        $course = Courses::findAll(['status' => 1]);
        
        return array('status' => true, 'data'=> $course, 'count'=> count($course), 'message'=>'Course list');
    }
}