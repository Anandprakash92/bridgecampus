<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AdvertiseVideoAdsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['subtitle'] = '<h1>'.$bannerName .  Yii::$app->myhelper->getCreatenewUrl($roleid = array(1),'',' Add', $bannerId).'</h1>';
$this->params['breadcrumbs'][] = $this->title;
$status = Yii::$app->myhelper->getActiveInactive();

echo Yii::$app->message->display();
?>
<div class="advertise-video-ads-index">
 <div class="custumbox box box-info">
    <div class="box-body">
        <?= GridView::widget([
            'striped'=>false,
            'hover'=>true,
            'panel'=>['type'=>'default', 'heading'=>$bannerName.' List','after'=>false],
            'toolbar'=> [
                '{export}',
                '{toggleData}',
            ],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'kartik\grid\SerialColumn'],
                    'institute_name',
                    'short_name',
                    // 'title_description',
                    // 'sub_title_description',
                    'image',
                    'date_from',
                    'to_date',
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