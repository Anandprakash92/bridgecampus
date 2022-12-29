<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "advertise_classified_display_ad_locations".
 *
 * @property int $id
 * @property string $institute_name
 * @property string $short_name
 * @property string $bannerType
 * @property string $title_description
 * @property string $sub_title_description
 * @property string $image
 * @property string $date_from
 * @property string $to_date
 * @property int $country
 * @property int $state
 * @property int $city
 * @property string $url
 * @property int $status
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 */
class AdvertiseClassifiedDisplayAdLocations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advertise_classified_display_ad_locations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institute_name', 'bannerType'], 'required'],
            [['country', 'state', 'city', 'status', 'created_by', 'updated_by'], 'integer'],
            [['date_from', 'to_date', 'bannerType','created_at', 'updated_at'], 'safe'],
            [['institute_name', 'short_name', 'image', 'url'], 'string', 'max' => 45],
            [['title_description', 'sub_title_description'], 'string', 'max' => 250],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institute_name' => 'Institute Name',
            'short_name' => 'Short Name',
            'bannerType' => 'Banner Type',
            'title_description' => 'Title Description',
            'sub_title_description' => 'Sub Title Description',
            'image' => 'Image',
            'date_from' => 'Date From',
            'to_date' => 'To Date',
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'url' => 'Url',
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
                $this->created_at = date('Y-m-d H:i:s');
            } else {
                $this->updated_at = date('Y-m-d H:i:s');
                $this->updated_by = \Yii::$app->user->identity->id;
            }
            return true;
        }
        return false;
    }
}
