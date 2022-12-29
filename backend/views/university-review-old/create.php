<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UniversityReview */

$this->title = 'Create University Review';
$this->params['breadcrumbs'][] = ['label' => 'University Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-review-create">

    <?= $this->render('_form', [
        'model' => $model,
        'program' =>$program
    ]) ?>

</div>
