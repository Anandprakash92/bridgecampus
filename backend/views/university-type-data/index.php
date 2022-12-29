<?php

use yii\helpers\Html;
use kartik\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel common\models\UniversityTypeDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'University Type';
$this->params['subtitle'] = '<h1>University Type '.Yii::$app->myhelper->getCreatenew($roleid = array(1),'','Add').'</h1>';
$this->params['breadcrumbs'][] = $this->title;

echo Yii::$app->message->display();
?>
<div class="university-type-data-index">

    <div class="custumbox box box-info">
        <div class="box-body">
    <?= GridView::widget([
        'striped'=>false,
        'hover'=>true,
        'panel'=>['type'=>'default', 'heading'=>'University Type','after'=>false],
        'toolbar'=> [
            '{export}',
            '{toggleData}',
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

//            'id',
            'university_name',
            'status',
//            'created_at',
//            'updated_at',

//            ['class' => 'yii\grid\ActionColumn'],
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