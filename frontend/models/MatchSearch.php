<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Match;

/**
 * MatchSearch represents the model behind the search form of `frontend\models\Match`.
 */
class MatchSearch extends Match
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'no_of_moves'], 'integer'],
            [['team_1', 'team_2', 'winner', 'datetime', 'winner_team_color'], 'safe'],
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
        $query = Match::find();

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
            'datetime' => $this->datetime,
            'no_of_moves' => $this->no_of_moves
        ]);

        $query->andFilterWhere(['like', 'team_1', $this->team_1])
            ->andFilterWhere(['like', 'team_2', $this->team_2])
            ->andFilterWhere(['like', 'winner', $this->winner])
            ->andFilterWhere(['like', 'winner_team_color', $this->winner_team_color]);

        return $dataProvider;
    }
   
    
}
