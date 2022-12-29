<?php

namespace frontend\models;

use Yii;
use frontend\models\Match;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string $team_name
 * @property string $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['team_name', 'status'], 'required'],
            [['status'], 'string'],
            [['team_name'], 'unique'],
            [['created_at', 'updated_at'], 'safe'],
            [['team_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'team_name' => 'Team Name',
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
    
     public function getWinmatches() {
        return $this->hasMany(Match::className(), ['winner' => 'id']);
    }
    
    public function getParticipantOne() {
        return $this->hasMany(Match::className(), ['team_1' => 'id']);
    }

    public function getParticipantTwo() {
        return $this->hasMany(Match::className(), ['team_2' => 'id']);
    }

    public function getTotalParticipant() {
        return array_merge($this->participantOne, $this->participantTwo);
    }
}
