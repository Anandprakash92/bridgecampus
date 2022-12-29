<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CourseQualificationTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Course Qualification Types';
$this->params['subtitle'] = '<h1>Course Qualification Type '.Yii::$app->myhelper->getCreatenew($roleid = array(1),'',' Add').'</h1>';
$this->params['breadcrumbs'][] = $this->title;
$status = Yii::$app->myhelper->getActiveInactive();

echo Yii::$app->message->display();
?>
<div class="course-qualification-type-index">
<div class="custumbox box box-info">
        <div class="box-body">
            <?= GridView::widget([
                'striped'=>false,
                'hover'=>true,
                'panel'=>['type'=>'default', 'heading'=>'Course Qualification List','after'=>false],
                'toolbar'=> [
                    '{export}',
                    '{toggleData}',
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'name',
                    [
                        'attribute' => 'statue',
                        'filter' => $status,
                        'value' => function($model)use($status){
                            return $status[$model['statue']];
                        }

                    ],

                ],'exportConfig'=> [
                    GridView::CSV=>[
                        'label' => 'CSV',
                    ],
                    GridView::EXCEL=>[
                        'label' => 'Excel',
                    ],
                ],
            ]); ?>
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

