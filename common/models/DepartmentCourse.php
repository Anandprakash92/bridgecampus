<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "department_course".
 *
 * @property int $id
 * @property int $departmentID
 * @property int $courseID
 * @property string $createdDate
 * @property int $createdBy
 * @property string $updatedDate
 * @property int $updatedBy
 */
class DepartmentCourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department_course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['departmentID', 'courseID'], 'required'],
            [['departmentID', 'courseID', 'createdBy', 'updatedBy'], 'integer'],
            [['createdDate', 'updatedDate'], 'safe'],
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->createdBy = \Yii::$app->user->identity->id;
                $this->createdDate = date('Y-m-d H:i:s');
            }
            $this->updatedBy = \Yii::$app->user->identity->id;
            $this->updatedDate = date('Y-m-d H:i:s');
            return true;
        }
        return false;
    }

    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'departmentID' => 'Department ID',
            'courseID' => 'Course ID',
            'createdDate' => 'Created Date',
            'createdBy' => 'Created By',
            'updatedDate' => 'Updated Date',
            'updatedBy' => 'Updated By',
        ];
    }
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Courses::className(), ['id' => 'courseID']);
    }
}
