<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UniversityReview */

$this->title = 'Update University Review: ' . $model->visitor_name;
$this->params['breadcrumbs'][] = ['label' => 'University Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="university-review-update">

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
