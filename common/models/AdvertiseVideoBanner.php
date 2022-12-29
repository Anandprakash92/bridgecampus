<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "advertise_video_banner".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property string $created_at
 * @property int $created_by
 * @property int $updated_by
 * @property string $updated_at
 */
class AdvertiseVideoBanner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advertise_video_banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
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
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

     public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->created_by = \Yii::$app->user->identity->id;
                $this->created_at = date('Y-m-d H:i:s');
            }
            else {
                $this->updated_at = \Yii::$app->user->identity->id;
                $this->updated_by = \Yii::$app->user->identity->id;
             
            }
              return true; 
            
        }
        return false;
    }
}
