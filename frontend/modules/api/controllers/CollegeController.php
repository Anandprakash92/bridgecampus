<?php

namespace frontend\modules\api\controllers;

use yii\web\Controller;
use common\models\College;

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
}