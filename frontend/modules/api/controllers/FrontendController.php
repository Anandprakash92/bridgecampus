<?php

namespace frontend\modules\api\controllers;

use yii\web\Controller;
//use common\models\Frontend;

/**
 * College controller for the `api` module
 */
class FrontendController extends Controller
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
    public function actionGetFrontend()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        \Yii::$app->response->statusCode = 200;
        $frontend = \common\models\Frontend::find()->all();
        
        return array('status' => true, 'data'=> $frontend,  'message'=>'Frontend list');
    }
    
}