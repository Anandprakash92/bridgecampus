<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdvertiseClassifiedAds */

$this->title = 'Update Advertise Classified Ads: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Advertise Classified Ads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="advertise-classified-ads-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
