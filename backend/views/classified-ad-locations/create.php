<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ClassifiedAdLocations */

$this->title = 'Create Classified Ad Locations';
$this->params['breadcrumbs'][] = ['label' => 'Classified Ad Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classified-ad-locations-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
