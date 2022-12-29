<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use softark\duallistbox\DualListbox;
use common\models\Courses;
use common\models\Program;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UniversitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reviews: '.$university->name;
$this->params['subtitle'] = '<h1>Reviews</h1>';
$this->params['breadcrumbs'][] = ['label' => 'Colleges', 'url' => ['index']];
$this->params['subtitle'] = '<h1> Reviews <a class="btn btn-success btn-xs" href="'.Url::to(['review-create','id'=>$university->id]).'">Add</a></h1>';
$this->params['breadcrumbs'][] = $university->name;
$this->params['breadcrumbs'][] = 'Reviews';
$status = Yii::$app->myhelper->getReviewStatus();
$ftype = Yii::$app->myhelper->getFacility();

echo Yii::$app->message->display();
?>

<div class="university-review-index">
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
                'rowOptions' => function ($model, $key, $index, $grid)use($university) {
                    $url = Url::to(['review-details','id'=> $university->id,'rid'=>$model->id]);
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
                        'attribute' => 'review_status',
                        'filter' => $status,
                        'value' => function($model)use($status){
                            return $status[$model['review_status']] ? $status[$model['review_status']]:'';
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