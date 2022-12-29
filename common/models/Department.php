<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $id
 * @property string $name
 * @property string $createdDate
 * @property int $createdBy
 * @property string $updatedDate
 * @property int $updatedBy
 * @property int $status
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            
            [['name', 'description','status'], 'required'],
            ['name','unique','message' =>  'This username has already been taken'],
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
            'description' => 'Description',
            'createdDate' => 'Created Date',
            'createdBy' => 'Created By',
            'updatedDate' => 'Updated Date',
            'updatedBy' => 'Updated By',
            'status' => 'Status',
        ];
    }
}
