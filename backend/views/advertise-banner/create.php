<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdvertiseBanner */

$this->title = 'Create  '. $bannerType .' Banner';
$this->params['breadcrumbs'][] = ['label' => $bannerType .' Banner', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertise-banner-create">

    <?= $this->render('_form', [
        'model' => $model,
        'imgPreview'=>$imgPreview,
        'imgPreviewConfig'=> $imgPreviewConfig,
        'bannerType'=>$bannerType
    ]) ?>

</div>
