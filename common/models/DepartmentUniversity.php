<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "department_university".
 *
 * @property int $id
 * @property int $dept_id
 * @property int $university_id
 * @property string $createdDate
 * @property int $createdBy
 * @property string $updatedDate
 * @property int $updatedBy
 * @property int $status
 */
class DepartmentUniversity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department_university';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'dept_id', 'university_id', 'createdDate', 'createdBy', 'updatedBy', 'status'], 'required'],
            [['id', 'dept_id', 'university_id', 'createdBy', 'updatedBy', 'status'], 'integer'],
            [['createdDate', 'updatedDate'], 'safe'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dept_id' => 'Dept ID',
            'university_id' => 'University ID',
            'createdDate' => 'Created Date',
            'createdBy' => 'Created By',
            'updatedDate' => 'Updated Date',
            'updatedBy' => 'Updated By',
            'status' => 'Status',
        ];
    }
}
