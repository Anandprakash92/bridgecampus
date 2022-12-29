<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use softark\duallistbox\DualListbox;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UniversitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $university->name.' Add Courses';
$this->params['subtitle'] = '<h1>Add Courses</h1>';
$this->params['breadcrumbs'][] = ['label' => 'Universities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $university->name;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['courses','id'=>$university->id]];
$this->params['breadcrumbs'][] = 'Add Courses';
?>
<div class="university-index">
	<div class="custumbox box box-info">
		<div class="box-body">
			<?php $form = ActiveForm::begin(); ?>
			<?php
			$options = [
				'multiple' => true,
				'size' => 20,
			];
			echo $form->field($ucmodel, 'courseID')->widget(DualListbox::className(),[
				'items' => $courses,
				'options' => [],
				'clientOptions' => [
					'moveOnSelect' => false,
					'selectedListLabel' => 'Selected Course',
					'nonSelectedListLabel' => 'Course List',
				],
			])->label(false);
			?>
                    <div class="col-sm-offset-2 col-sm-4" style="float:left" >
                        <button id="back_btn" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                        <?= Html::submitButton($ucmodel->isNewRecord ? Yii::t('app', 'Submit') : Yii::t('app', 'Update'), ['class' => $ucmodel->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id'=>'load' ,'data-loading-text'=>"<i class='fa fa-spinner fa-spin '></i> Processing"]) ?>
                      </div>
			<?php ActiveForm::end(); ?>
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