<?php

namespace frontend\models;

use Yii;
use frontend\models\Team;

/**
 * This is the model class for table "player".
 *
 * @property int $id
 * @property string $player_name
 * @property string $team_id
 * @property string $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Player extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'player';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['player_name', 'team_id', 'status', 'contact_number'], 'required'],
            [['status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['player_name'], 'string', 'max' => 20],
            [['team_id'], 'string', 'max' => 10],
            [['contact_number'], 'number'],
            [['team_id'], 'unique']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'player_name' => 'Player Name',
            'contact_number' => 'Contact Number',
            'team_id' => 'Team ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->created_at = date('Y-m-d H:i:s');
            } else {
                $this->updated_at = date('Y-m-d H:i:s');
            }
            return true;
        }
        return false;
    }
    
    public function getTeam() {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }
    
   
   
}
