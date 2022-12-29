<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "college_ownership".
 *
 * @property int $id
 * @property string $ownership_name
 * @property string $status
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 */
class CollegeOwnership extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'college_ownership';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ownership_name', 'status'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'string'],
            [['ownership_name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ownership_name' => 'Ownership Name',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

     public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->created_by = \Yii::$app->user->identity->id;
                $this->updated_by = date('Y-m-d H:i:s');
            }
            $this->updated_by = \Yii::$app->user->identity->id;
            $this->updated_at = date('Y-m-d H:i:s');
            return true;
        }
        return false;
    }

     public static function getCollegeOwnerShip(){
        $ownershipData= CollegeOwnership::find()->where(['status'=>1])->all();
        $listData= \yii\helpers\ArrayHelper::map($ownershipData,'id','ownership_name');
        return $listData;
    }
}
