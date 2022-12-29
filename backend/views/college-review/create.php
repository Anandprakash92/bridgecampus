<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CollegeReview */

$this->title = 'Create College Review';
$this->params['breadcrumbs'][] = ['label' => 'College Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="college-review-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
