<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CollegeTestimonial */

$this->title = 'Create College Testimonial';
$this->params['breadcrumbs'][] = ['label' => 'College Testimonials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="college-testimonial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
