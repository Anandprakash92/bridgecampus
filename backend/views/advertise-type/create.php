<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdvertiseType */

$this->title = 'Create Advertise Type';
$this->params['breadcrumbs'][] = ['label' => 'Advertise Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertise-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
