<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Department : '.$university->name;
$this->params['subtitle'] = '<h1> Department <a class="btn btn-success btn-xs" href="'.Url::to(['department-create','id'=>$university->id]).'">Add</a></h1>';
$this->params['breadcrumbs'][] = ['label' => 'Department', 'url' => ['index']];
$this->params['breadcrumbs'][] = $university->name;
$this->params['breadcrumbs'][] = 'Department List';

$status = Yii::$app->myhelper->getActiveInactive();
echo Yii::$app->message->display();
?>
<div class="department-index">

    <div class="custumbox box box-info">
        <div class="box-body">
            <?php // echo?>
        </div>
    </div>
</div>

<?php 
$this->registerCss("
    .app-title{
       display: none;
   }
   ");
   ?>

