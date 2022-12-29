<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CollegeTestimonial */

$this->title = 'Update College Testimonial: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'College Testimonials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="college-testimonial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
