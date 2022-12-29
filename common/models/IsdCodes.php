<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "isd_codes".
 *
 * @property int $id
 * @property string $code
 */
class IsdCodes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'isd_codes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['code'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
        ];
    }

    public static function getIsdCode(){

        $isdData= IsdCodes::find()->orderBy([ 'code' => SORT_ASC])->all();
        $listData= \yii\helpers\ArrayHelper::map($isdData,'id','code');
        return $listData;
    }


}
