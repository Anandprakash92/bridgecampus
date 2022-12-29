<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdvertiseClassifiedAds */

$this->title = 'Create Advertise Classified Ads';
$this->params['breadcrumbs'][] = ['label' => 'Advertise Classified Ads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertise-classified-ads-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
