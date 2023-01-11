<?php

namespace frontend\modules\api\controllers;

use yii\web\Controller;
use common\models\University;

/**
 * University controller for the `api` module
 */
class UniversityController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionGetUniversity()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        \Yii::$app->response->statusCode = 200;
        $university = University::findAll(['status' => 1]);
        
        return array('status' => true, 'data'=> $university, 'count'=> count($university), 'message'=>'University list');
    }
}