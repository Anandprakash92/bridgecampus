<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Review */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="review-form">
    <div class="custumbox box box-info">
        <div class="box-body">
            <?php $form = ActiveForm::begin([
                 'layout' => 'horizontal',
                 'enableClientValidation' => true,
                 'enableAjaxValidation' => false,
                 'options' => ['enctype' => 'multipart/form-data'],
             ]);?>

            <?= $form->field($model, 'type')->textInput() ?>

            <?= $form->field($model, 'coll_univID')->textInput() ?>

            <?= $form->field($model, 'courseID')->textInput() ?>

            <?= $form->field($model, 'placement_star')->textInput() ?>

            <?= $form->field($model, 'placement_review')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'infrastructure_star')->textInput() ?>

            <?= $form->field($model, 'infrastructure_review')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'fcc_star')->textInput() ?>

            <?= $form->field($model, 'fcc_review')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'ccl_star')->textInput() ?>

            <?= $form->field($model, 'cct_review')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'wtd_star')->textInput() ?>

            <?= $form->field($model, 'wtd_review')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'other_star')->textInput() ?>

            <?= $form->field($model, 'other_review')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'createdDate')->textInput() ?>

            <?= $form->field($model, 'updatedDate')->textInput() ?>

            <?= $form->field($model, 'status')->textInput() ?>

            <?= $form->field($model, 'createdBy')->textInput() ?>

            <?= $form->field($model, 'updatedBy')->textInput() ?>

    <div class="form-group" style="margin-left: 18% !important;">
        <button id="back_btn" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id'=>'load' ,'data-loading-text'=>"<i class='fa fa-spinner fa-spin '></i> Processing"]) ?>
   </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
</div>

<?php $this->registerJs("".Yii::$app->myhelper->formsubmitedbyajax('w0','../university/review')."");?>
