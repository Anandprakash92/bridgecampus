<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Player;

/**
 * PlayerSearch represents the model behind the search form of `frontend\models\Player`.
 */
class PlayerSearch extends Player
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['player_name', 'team_id', 'status', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Player::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'player_name', $this->player_name])
            ->andFilterWhere(['like', 'team_id', $this->team_id])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
    
     /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchLeader($params)
    {
//        $query->leftJoin('player', 'program.id=university_review.program');        
//        $query->leftJoin('courses', 'courses.id=university_review.course'); 

        $query = Player::find();
        $query->leftJoin('match', 'player.team_id=match.winner'); 

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'player_name', $this->player_name])
            ->andFilterWhere(['like', 'team_id', $this->team_id])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
