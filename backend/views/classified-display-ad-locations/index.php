<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ClassifiedDisplayAdLocationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['subtitle'] = '<h1>Classified Display Ad Locations '.Yii::$app->myhelper->getCreatenew($roleid = array(1),'','Add').'</h1>';
$status = Yii::$app->myhelper->getActiveInactive();
echo Yii::$app->message->display();
?>
<div class="classified-display-ad-locations-index">
<div class="custumbox box box-info">
        <div class="box-body">
            <?= GridView::widget([
                'striped'=>false,
                'hover'=>true,
                'panel'=>['type'=>'default', 'heading'=>'Classified Display Ad Locations','after'=>false],
                'toolbar'=> [
                    '{export}',
                    '{toggleData}',
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],
                    'name',
                    [
                        'attribute' => 'status',
                        'filter' => $status,
                        'value' => function($model)use($status){
                            return $status[$model['status']];
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