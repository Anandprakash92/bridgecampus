<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CourseModeOfTeaching */

$this->title = 'Create Course Mode Of Teaching';
$this->params['breadcrumbs'][] = ['label' => 'Course Mode Of Teachings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-mode-of-teaching-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
