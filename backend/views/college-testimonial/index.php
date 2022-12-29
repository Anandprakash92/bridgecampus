<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CollegeTestimonialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'College Testimonials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="college-testimonial-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create College Testimonial', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'col_uniID',
            'visitor_name',
            'course',
            'program',
            //'visitor_photo',
            //'highest_edu',
            //'year_completion',
            //'current_status',
            //'email_id:email',
            //'contact_number',
            //'summ_testimonial',
            //'intern_placement',
            //'infrastructure',
            //'hostel',
            //'faculty',
            //'course_curriculum',
            //'library',
            //'status',
            //'created_at',
            //'updated_at',
            //'createdBy',
            //'updatedBy',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
