<?php

namespace frontend\modules\api\controllers;

use yii\web\Controller;
use common\models\Courses;

/**
 * Cources controller for the `api` module
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
        return Courses::findAll(['status' => 1]);
    }
}