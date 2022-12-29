<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CourseDuration */

$this->title = 'Create Course Duration';
$this->params['breadcrumbs'][] = ['label' => 'Course Durations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-duration-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
