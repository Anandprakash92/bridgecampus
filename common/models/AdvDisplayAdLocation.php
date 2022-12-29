<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "adv_display_ad_location".
 *
 * @property int $id
 * @property string $name
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $created_by
 * @property string $updated_by
 */
class AdvDisplayAdLocation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'adv_display_ad_location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 5],
            [['created_by', 'updated_by'], 'string', 'max' => 10],
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
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->created_by = \Yii::$app->user->identity->id;
                $this->created_at = date('Y-m-d H:i:s');
            }
            $this->updated_by = \Yii::$app->user->identity->id;
            $this->updated_at = date('Y-m-d H:i:s');
            return true;
        }
        return false;
    }
}
