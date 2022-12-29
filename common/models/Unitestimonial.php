<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "unitestimonial".
 *
 * @property int $id
 * @property int $col_uniID
 * @property string $visitor_name
 * @property string $visitor_photo
 * @property string $highest_edu
 * @property string $year_completion
 * @property string $current_status
 * @property string $email_id
 * @property string $contact_number
 * @property string $summ_testimonial
 * @property string $intern_placement
 * @property string $infrastructure
 * @property string $hostel
 * @property string $faculty
 * @property string $course_curriculum
 * @property string $library
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Unitestimonial extends \yii\db\ActiveRecord
{
    public $url;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unitestimonial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['visitor_name', 'col_uniID','highest_edu', 'course','program','year_completion', 'current_status', 'email_id', 'contact_number', 'status'], 'required'],
            [['current_status', 'status'], 'string'],
            [['contact_number', 'col_uniID'], 'integer'],
            [['created_at', 'updated_at', 'col_uniID', 'createdBy', 'updatedBy'], 'safe'],
            [['visitor_name', 'visitor_photo', 'email_id'], 'string', 'max' => 50],
            [['highest_edu'], 'string', 'max' => 20],
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
            'col_univID' => 'Col Univ ID',
            'visitor_name' => 'Visitor Name',
            'visitor_photo' => 'Visitor Photo',
            'highest_edu' => 'Highest Edu',
            'year_completion' => 'Year Completion',
            'current_status' => 'Current Status',
            'email_id' => 'Email ID',
            'contact_number' => 'Contact Number',
            'summ_testimonial' => 'Sumerize your Testimonial',
            'intern_placement' => 'Internship & Placemennts',
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
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->createdBy = \Yii::$app->user->identity->id;
                $this->created_at = date('Y-m-d H:i:s');
            }
            $this->updatedBy = \Yii::$app->user->identity->id;
            $this->updated_at = date('Y-m-d H:i:s');
            return true;
        }
        return false;
    }
}
