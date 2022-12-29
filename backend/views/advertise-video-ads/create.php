<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdvertiseVideoAds */

$this->title = 'Create Advertise Video Ads';
$this->params['breadcrumbs'][] = ['label' => 'Advertise Video Ads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertise-video-ads-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
