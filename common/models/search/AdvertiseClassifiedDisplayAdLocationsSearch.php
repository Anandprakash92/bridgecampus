<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AdvertiseClassifiedDisplayAdLocations;

/**
 * AdvertiseClassifiedDisplayAdLocationsSearch represents the model behind the search form of `common\models\AdvertiseClassifiedDisplayAdLocations`.
 */
class AdvertiseClassifiedDisplayAdLocationsSearch extends AdvertiseClassifiedDisplayAdLocations
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'country', 'state', 'city', 'status', 'created_by', 'updated_by'], 'integer'],
            [['institute_name', 'short_name', 'bannerType', 'title_description', 'sub_title_description', 'image', 'date_from', 'to_date', 'url', 'created_at', 'updated_at'], 'safe'],
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
    public function search($params, $rid)
    {
        $query = AdvertiseClassifiedDisplayAdLocations::find();

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
            'date_from' => $this->date_from,
            'to_date' => $this->to_date,
            'country' => $this->country,
            'state' => $this->state,
            'city' => $this->city,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'institute_name', $this->institute_name])
            ->andFilterWhere(['like', 'short_name', $this->short_name])
            ->andFilterWhere(['like', 'bannerType', $this->bannerType])
            ->andFilterWhere(['like', 'title_description', $this->title_description])
            ->andFilterWhere(['like', 'sub_title_description', $this->sub_title_description])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'bannerType', $rid])
            ->andFilterWhere(['like', 'bannerType', $rid])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
