<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdvertiseVideoAds */

$this->title = 'Update Advertise Video Ads: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Advertise Video Ads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="advertise-video-ads-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
