<?php

namespace frontend\modules\api\controllers;

use yii\web\Controller;
use common\models\Exam;

/**
 * Exam controller for the `api` module
 */
class ExamController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionGetExam()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        \Yii::$app->response->statusCode = 200;
        $exam = Exam::findAll(['status' => 1]);
        
        return array('status' => true, 'data'=> $exam, 'count'=> count($exam), 'message'=>'Exam list');
    }
}