<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CollegeTestimonial */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'College Testimonials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="college-testimonial-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'col_uniID',
            'visitor_name',
            'course',
            'program',
            'visitor_photo',
            'highest_edu',
            'year_completion',
            'current_status',
            'email_id:email',
            'contact_number',
            'summ_testimonial',
            'intern_placement',
            'infrastructure',
            'hostel',
            'faculty',
            'course_curriculum',
            'library',
            'status',
            'created_at',
            'updated_at',
            'createdBy',
            'updatedBy',
        ],
    ]) ?>

</div>
