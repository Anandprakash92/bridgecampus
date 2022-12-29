<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\CollegeTestimonialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="college-testimonial-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'col_uniID') ?>

    <?= $form->field($model, 'visitor_name') ?>

    <?= $form->field($model, 'course') ?>

    <?= $form->field($model, 'program') ?>

    <?php // echo $form->field($model, 'visitor_photo') ?>

    <?php // echo $form->field($model, 'highest_edu') ?>

    <?php // echo $form->field($model, 'year_completion') ?>

    <?php // echo $form->field($model, 'current_status') ?>

    <?php // echo $form->field($model, 'email_id') ?>

    <?php // echo $form->field($model, 'contact_number') ?>

    <?php // echo $form->field($model, 'summ_testimonial') ?>

    <?php // echo $form->field($model, 'intern_placement') ?>

    <?php // echo $form->field($model, 'infrastructure') ?>

    <?php // echo $form->field($model, 'hostel') ?>

    <?php // echo $form->field($model, 'faculty') ?>

    <?php // echo $form->field($model, 'course_curriculum') ?>

    <?php // echo $form->field($model, 'library') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'createdBy') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
