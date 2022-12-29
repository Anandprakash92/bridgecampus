<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "match".
 *
 * @property int $id
 * @property string $team_1
 * @property string $team_2
 * @property string $winner
 * @property string $match_name
 * @property string $datetime
 * @property int $no_of_moves
 * @property string $winner_team_color
 */
class Match extends \yii\db\ActiveRecord
{
//    public $team_1;
//    public $team_2;
//    public $winner;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'match';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['team_1', 'team_2','match_name', 'winner', 'no_of_moves', 'winner_team_color', 'winner'], 'required'],
            [['datetime'], 'safe'],
            [['no_of_moves'], 'integer'],
            [['team_1', 'team_2', 'winner'], 'string', 'max' => 10],
            [['winner_team_color'], 'string', 'max' => 7],
            ['team_1', 'compare', 'compareAttribute' => 'team_2', 'operator' => '!=', 'message' => 'Please choose a different teams'],
            ['team_2', 'compare', 'compareAttribute' => 'team_1', 'operator' => '!=', 'message' => 'Please choose a different teams'],
            [['match_name'], 'unique'],
            [['team_1','winner'], 'my_required'],
            [[ 'team_2','winner'], 'my_required'],
//            ['match_name, team_2', 'my_required'],
//            ['match_name', 'compare', 'compareAttribute' => ['team_1', 'team_2'], 'operator' => '==', 'message' => 'Please choose a different teams'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'team_1' => 'Team 1',
            'team_2' => 'Team 2',
            'winner' => 'Winner',
            'match_name'=>'Match Name',
            'datetime' => 'Datetime',
            'no_of_moves' => 'No Of Moves',
            'winner_team_color' => 'Winner Team Color',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamOne()
    {
       return $this->hasOne(Player::className(), ['team_1' => 'name']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamtwo()
    {
       return $this->hasOne(Player::className(), ['team_2' => 'name']);
    }

    //custom function 
    public function my_required($attribute_name,$params)
    {
        if (($this->winner === $this->team_2)  || ($this->winner === $this->team_1)){
//            $this->addError($attribute_name, 'Please select winner team from Team_1 and Team_2');
            return true;
        } else {
            $this->addError($attribute_name, 'Please select winner team from Team_1 and Team_2');
            return false;
        }
//        return true;
    }

}
