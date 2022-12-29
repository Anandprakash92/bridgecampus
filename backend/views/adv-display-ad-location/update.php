<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdvDisplayAdLocation */

$this->title = 'Update Adv Display Ad Location: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Adv Display Ad Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="adv-display-ad-location-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
