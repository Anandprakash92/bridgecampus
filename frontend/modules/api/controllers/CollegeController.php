<?php

namespace frontend\modules\api\controllers;

use yii\web\Controller;
use common\models\College;

/**
 * College controller for the `api` module
 */
class CollegeController extends Controller
{
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