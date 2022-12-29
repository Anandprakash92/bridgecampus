<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "university_type_data".
 *
 * @property int $id
 * @property string $university_name
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class UniversityTypeData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'university_type_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['university_name', 'status'], 'required'],
            [['status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['university_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'university_name' => 'University Type',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
