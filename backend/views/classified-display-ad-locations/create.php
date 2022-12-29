<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ClassifiedDisplayAdLocations */

$this->title = 'Create Classified Display Ad Locations';
$this->params['breadcrumbs'][] = ['label' => 'Classified Display Ad Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classified-display-ad-locations-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
