<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CollegeTestimonial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="college-testimonial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'col_uniID')->textInput() ?>

    <?= $form->field($model, 'visitor_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'course')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'program')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visitor_photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'highest_edu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year_completion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'current_status')->textInput() ?>

    <?= $form->field($model, 'email_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summ_testimonial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intern_placement')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'infrastructure')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hostel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'faculty')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'course_curriculum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'library')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'createdBy')->textInput() ?>

    <?= $form->field($model, 'updatedBy')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
