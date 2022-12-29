<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master_file_upload".
 *
 * @property int $id
 * @property string $name
 * @property int $urlImage
 * @property string $created_at
 * @property int $created_by
 */
class MasterFileUpload extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_file_upload';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_by'], 'integer'],
            [['created_at','urlImage'], 'safe'],
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
            'urlImage' => 'Url Image',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->created_by = \Yii::$app->user->identity->id;
                $this->created_at = date('Y-m-d H:i:s');
            }
            return true;
        }
        return false;
    }
}
