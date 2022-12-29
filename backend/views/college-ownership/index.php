<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CollegeOwnershipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'College Ownerships';
$this->params['subtitle'] = '<h1>College Ownerships '.Yii::$app->myhelper->getCreatenew($roleid = array(1),'','Add').'</h1>';
$this->params['breadcrumbs'][] = $this->title;
$status = Yii::$app->myhelper->getActiveInactive();

echo Yii::$app->message->display();
?>
<div class="college-ownership-index">
    <div class="custumbox box box-info">
        <div class="box-body">
            <?= GridView::widget([
            'striped'=>false,
            'hover'=>true,
            'panel'=>['type'=>'default', 'heading'=>'College Ownerships List','after'=>false],
            'toolbar'=> [
                '{export}',
                '{toggleData}',
            ],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],

                'ownership_name',
                [
                        'attribute' => 'status',
                        'filter' => $status,
                        'value' => function($model)use($status){
                            return $status[$model['status']];
                        }

                ],
        ],
        'exportConfig'=> [
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

