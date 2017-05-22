<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Property;

/**
 * PropertySearch represents the model behind the search form of `app\models\Property`.
 */
class PropertySearch extends Property
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['property_id'], 'integer'],
            [['property_index_no', 'name_of_owner', 'kind', 'location', 'north_boundary', 'south_boundary', 'east_boundary', 'west_boundary'], 'safe'],
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
        $query = Property::find();

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
            'property_id' => $this->property_id,
        ]);

        $query->andFilterWhere(['like', 'property_index_no', $this->property_index_no])
            ->andFilterWhere(['like', 'name_of_owner', $this->name_of_owner])
            ->andFilterWhere(['like', 'kind', $this->kind])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'north_boundary', $this->north_boundary])
            ->andFilterWhere(['like', 'south_boundary', $this->south_boundary])
            ->andFilterWhere(['like', 'east_boundary', $this->east_boundary])
            ->andFilterWhere(['like', 'west_boundary', $this->west_boundary]);

        return $dataProvider;
    }
}
