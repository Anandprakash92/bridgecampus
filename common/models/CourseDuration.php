<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course_duration".
 *
 * @property int $id
 * @property string $name
 * @property string $createdDate
 * @property int $createdBy
 * @property string $updatedDate
 * @property int $updatedBy
 * @property int $status
 */
class CourseDuration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course_duration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['createdDate', 'updatedDate'], 'safe'],
            [['createdBy', 'updatedBy', 'status'], 'integer'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'createdDate' => 'Created Date',
            'createdBy' => 'Created By',
            'updatedDate' => 'Updated Date',
            'updatedBy' => 'Updated By',
            'status' => 'Status',
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
            return true;
        }
        return false;
    }
		
}
