<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdvertisePurposeType */

$this->title = 'Create Advertise Purpose Type';
$this->params['breadcrumbs'][] = ['label' => 'Advertise Purpose Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertise-purpose-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
