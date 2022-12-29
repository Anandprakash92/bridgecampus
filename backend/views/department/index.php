<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['subtitle'] = '<h1>Departments '.Yii::$app->myhelper->getCreatenew($roleid = array(1),'',' Add').'</h1>';
$this->params['breadcrumbs'][] = $this->title;
$status = Yii::$app->myhelper->getActiveInactive();
echo Yii::$app->message->display();
?>
<div class="department-index">

    <div class="custumbox box box-info">
        <div class="box-body">
            <?= GridView::widget([
                'striped'=>false,
                'hover'=>true,
                'panel'=>['type'=>'default', 'heading'=>'Department List','after'=>false],
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
                        'attribute' => 'status',
                        'filter' => $status,
                        'value' => function($model)use($status){
                            return $status[$model['status']];
                        }

                    ],
                    [
                  'class' => 'yii\grid\ActionColumn',
                  'template' => '{specialization}',/*{top_recruiters}*/
                  'buttons' => [
                    'specialization' => function ($url, $model) {
                        return Html::a(Yii::t('app', 'Add Courses'), Url::to(['add-department-courses','id'=>$model->id]), [
                            'title' => Yii::t('app', 'Add Courses'),
                            'class'=>'btn btn-primary btn btn-xs'
                        ]);
                    },
                ],
            ],

                // ['class' => 'yii\grid\ActionColumn'],
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

