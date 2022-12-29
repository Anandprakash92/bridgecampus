<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "college_testimonial".
 *
 * @property int $id
 * @property int $col_uniID
 * @property string $visitor_name
 * @property string $course
 * @property string $program
 * @property string $visitor_photo
 * @property string $highest_edu
 * @property string $year_completion
 * @property int $current_status
 * @property string $email_id
 * @property string $contact_number
 * @property string $summ_testimonial
 * @property string $intern_placement
 * @property string $infrastructure
 * @property string $hostel
 * @property string $faculty
 * @property string $course_curriculum
 * @property string $library
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property int $createdBy
 * @property int $updatedBy
 */
class CollegeTestimonial extends \yii\db\ActiveRecord
{
     public $url;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'college_testimonial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_uniID', 'visitor_name', 'course', 'program', 'visitor_photo', 'highest_edu', 'year_completion', 'current_status', 'email_id', 'contact_number', 'status'], 'required'],
            [['col_uniID', 'current_status', 'contact_number', 'status', 'createdBy', 'updatedBy'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['visitor_name', 'visitor_photo', 'email_id'], 'string', 'max' => 50],
            [['course', 'program', 'highest_edu'], 'string', 'max' => 20],
            [['year_completion'], 'string', 'max' => 10],
            [['summ_testimonial', 'infrastructure', 'hostel', 'faculty', 'course_curriculum', 'library'], 'string', 'max' => 250],
            [['intern_placement'], 'string', 'max' => 205],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'col_uniID' => 'Col Uni ID',
            'visitor_name' => 'Visitor Name',
            'course' => 'Course',
            'program' => 'Program',
            'visitor_photo' => 'Visitor Photo',
            'highest_edu' => 'Highest Edu',
            'year_completion' => 'Year Completion',
            'current_status' => 'Current Status',
            'email_id' => 'Email ID',
            'contact_number' => 'Contact Number',
            'summ_testimonial' => 'Summ Testimonial',
            'intern_placement' => 'Intern Placement',
            'infrastructure' => 'Infrastructure',
            'hostel' => 'Hostel',
            'faculty' => 'Faculty',
            'course_curriculum' => 'Course Curriculum',
            'library' => 'Library',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'createdBy' => 'Created By',
            'updatedBy' => 'Updated By',
        ];
    }
}
