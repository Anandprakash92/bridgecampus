<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course_qualification_type".
 *
 * @property int $id
 * @property string $name
 * @property string $createdDate
 * @property int $createdBy
 * @property string $updatedDate
 * @property int $updatedBy
 * @property int $statue
 */
class CourseQualificationType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course_qualification_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','statue'], 'required'],
            [['id', 'createdBy', 'updatedBy', 'statue'], 'integer'],
            [['createdDate', 'updatedDate'], 'safe'],
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
            'statue' => 'Status',
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
