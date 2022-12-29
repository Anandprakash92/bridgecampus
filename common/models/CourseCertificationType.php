<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course_certification_type".
 *
 * @property int $id
 * @property string $certification_type
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class CourseCertificationType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course_certification_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['certification_type', 'status'], 'required'],
            [['status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['certification_type'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'certification_type' => 'Certification Type',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
