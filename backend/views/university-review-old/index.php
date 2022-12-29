<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UniversityReviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'University Reviews';
$this->params['subtitle'] = '<h1>University Reviews '.Yii::$app->myhelper->getCreatenew($roleid = array(1),'','Add').'</h1>';
$this->params['breadcrumbs'][] = $this->title;
$status = Yii::$app->myhelper->getActiveInactive();
echo Yii::$app->message->display();
?>
<div class="university-review-index">

    <div class="custumbox box box-info">
        <div class="box-body">
            <?= GridView::widget([
                'striped'=>false,
                'hover'=>true,
                'panel'=>['type'=>'default', 'heading'=>'University Reviews','after'=>false],
                'toolbar'=> [
                    '{export}',
                    '{toggleData}',
                ],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'visitor_name',
                'highest_education:ntext',
                'year_completion:ntext',
                'current_status',

                ['class' => 'yii\grid\ActionColumn'],
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