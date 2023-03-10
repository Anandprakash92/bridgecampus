<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\College;

/**
 * CollegeSearch represents the model behind the search form of `common\models\College`.
 */
class CollegeSearch extends College
{
    public $city_name;
    public $state_name;
    public $country_name;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cityID', 'stateID', 'countryID', 'status', 'createdBy', 'updatedBy'], 'integer'],
            [['name', 'code', 'address', 'taluka', 'district', 'pincode', 'contact', 'fax', 'email', 'websiteurl', 'establish_year', 'approved_by', 'accredited_by', 'affiliate_to', 'rating', 'about', 'vission', 'mission', 'logourl', 'createdDate', 'updatedDate', 'sortname', 'city_name', 'state_name', 'country_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = College::find()->joinWith(['city','state', 'country']);

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
            'cityID' => $this->cityID,
            'stateID' => $this->stateID,
            'countryID' => $this->countryID,
            'createdDate' => $this->createdDate,
            'updatedDate' => $this->updatedDate,
            'status' => $this->status,
            'createdBy' => $this->createdBy,
            'updatedBy' => $this->updatedBy,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'sortname', $this->sortname])
            ->andFilterWhere(['like', 'taluka', $this->taluka])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'pincode', $this->pincode])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'websiteurl', $this->websiteurl])
            ->andFilterWhere(['like', 'establish_year', $this->establish_year])
            ->andFilterWhere(['like', 'approved_by', $this->approved_by])
            ->andFilterWhere(['like', 'accredited_by', $this->accredited_by])
            ->andFilterWhere(['like', 'affiliate_to', $this->affiliate_to])
            ->andFilterWhere(['like', 'rating', $this->rating])
            ->andFilterWhere(['like', 'about', $this->about])
            ->andFilterWhere(['like', 'vission', $this->vission])
            ->andFilterWhere(['like', 'mission', $this->mission])
            ->andFilterWhere(['like', 'cities.name', $this->city_name])
            ->andFilterWhere(['like', 'states.name', $this->state_name])
            ->andFilterWhere(['like', 'countries.name', $this->country_name])
            ->andFilterWhere(['like', 'logourl', $this->logourl]);

            $dataProvider->sort->attributes['city_name'] = [
            'asc' => ['cityID' => SORT_ASC],
            'desc' => ['cityID' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['state_name'] = [
            'asc' => ['stateID' => SORT_ASC],
            'desc' => ['stateID' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['country_name'] = [
            'asc' => ['countryID' => SORT_ASC],
            'desc' => ['countryID' => SORT_DESC],
        ];

        return $dataProvider;
    }
}
