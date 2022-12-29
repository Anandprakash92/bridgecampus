<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use softark\duallistbox\DualListbox;
use common\models\Courses;
use common\models\Program;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\collegeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Testimonial : '.$college->name;
$this->params['subtitle'] = '<h1> Testimonial <a class="btn btn-success btn-xs" href="'.Url::to(['testimonial-create','id'=>$college->id]).'">Add</a></h1>';
$this->params['breadcrumbs'][] = ['label' => 'Universities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $college->name;
$this->params['breadcrumbs'][] = 'Testimonial Details';

$status = Yii::$app->myhelper->getReviewStatus();
$gtype = Yii::$app->myhelper->getAdvertisePossitionArray();

echo Yii::$app->message->display();
?>

<div class="college-index">
	<div class="custumbox box box-info">
		<div class="box-body">
                <?= GridView::widget([
                'striped'=>false,
                'hover'=>true,
                'panel'=>['type'=>'default', 'heading'=>$this->title,'after'=>false],
                'toolbar'=> [
                    '{export}',
                    '{toggleData}',
                ],
                'rowOptions' => function ($model, $key, $index, $grid)use($college) {
                    $url = Url::to(['testimonial-create','id'=> $college->id,'fid'=>$model['id']]);
                    return ['onclick' => 'location.href="'.$url.'"'];
                },
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    
                    [
                        'label'=>'Student Name',
                        'attribute' => 'visitor_name',
                        'value' => function($model){
                            return $model->visitor_name;
                        }
                    ],
                    [
                        'attribute' => 'course',
                        'value' => function($model){
                            $res = $model = Courses::findOne($model['course']);
                            return $res['name'];
                        }
                    ],
                    [
                    'label'=>'Program',
                    'contentOptions' => ['style' => 'width:20%;'],
                    'attribute' => 'program',
                    'value' => function($model){
                            $res = $model = Program::findOne($model['program']);
                            return $res['name'];
                        }
                    ],
                    [
                        'label'=>'Status',
                        'attribute' => 'status',
                        'filter' => $status,
                        'value' => function($model)use($status){
                            return $status[$model['status']] ? $status[$model['status']]:'';
                        }

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
<?php $this->registerJs("".Yii::$app->myhelper->formsubmitedbyajax('w0','../college/index')."");?>