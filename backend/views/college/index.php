<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SpecializationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Colleges';
$this->params['subtitle'] = '<h1>College '.Yii::$app->myhelper->getCreatenew($roleid = array(1),'','Add').'</h1>';
$this->params['breadcrumbs'][] = $this->title;
$status = Yii::$app->myhelper->getActiveInactive();

echo Yii::$app->message->display();
?>

<div class="specialization-index">
    <div class="custumbox box box-info">
        <div class="box-body">
            <?= GridView::widget([
                'striped'=>false,
                'hover'=>true,
                'panel'=>['type'=>'default', 'heading'=>'Colleges List','after'=>false],
                'toolbar'=> [
                    '{export}',
                    '{toggleData}',
                ],
                'rowOptions' => function ($model, $key, $index, $grid) {
                    $url = Url::to(['view','id'=> $model['id']]);
                    return ['onclick' => 'location.href="'.$url.'"'];
                },
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],

                    'name',
                    
                    [
                        'label'=>'Short Name',
                        'contentOptions' => ['style' => 'width:10%;'],
                        'attribute' => 'sortname'
                    ],
                    [
                        'label'=>'City',
                        'contentOptions' => ['style' => 'width:15%;'],
                        'attribute' => 'city_name',
                        'value' => function($model){
                            return  isset($model->city->name)?$model->city->name:'';
                        }
                    ],
                    [
                        'label'=>'State',
                        'contentOptions' => ['style' => 'width:15%;'],
                        'attribute' => 'state_name',
                        'value' => function($model){
                            return  isset($model->state->name)?$model->state->name:'';
                        }
                    ],
                    [
                       'label'=>'Country',
                       'contentOptions' => ['style' => 'width:15%;'],
                       'attribute' => 'countryID',
                       'value' => function($model){
                           return   isset($model->country->name)?$model->country->name:'';
                        }
                    ],
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

