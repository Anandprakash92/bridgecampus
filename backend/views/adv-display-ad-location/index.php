<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AdvDisplayAdLocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adv Display Ad Locations';
$this->params['breadcrumbs'][] = $this->title;
$this->params['subtitle'] = '<h1>Adv Display Ad Location '.Yii::$app->myhelper->getCreatenew($roleid = array(1),'','Add').'</h1>';
$status = Yii::$app->myhelper->getActiveInactive();

echo Yii::$app->message->display();
?>
<div class="Accrediteds-index">
    <div class="custumbox box box-info">
        <div class="box-body">
            <?= GridView::widget([
                'striped'=>false,
                'hover'=>true,
                'panel'=>['type'=>'default', 'heading'=>'Accreditations List','after'=>false],
                'toolbar'=> [
                    '{export}',
                    '{toggleData}',
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'name',
                    [
                        'attribute' => 'status',
                        'filter' => $status,
                        'value' => function($model)use($status){
                            return $status[$model['status']];
                        }

                    ],
                    // 'status',
                    // 'created_at',
                    // 'updated_at',
                    //'created_by',
                    //'updated_by',

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

