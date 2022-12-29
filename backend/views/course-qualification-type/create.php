<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CourseQualificationType */

$this->title = 'Create Course Qualification Type';
$this->params['breadcrumbs'][] = ['label' => 'Course Qualification Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-qualification-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
