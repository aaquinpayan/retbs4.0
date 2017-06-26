<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AccountStatement;

/**
 * AccountStatementSearch represents the model behind the search form of `app\models\AccountStatement`.
 */
class AccountStatementSearch extends AccountStatement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['soa_id', 'year_unpaid', 'percentage'], 'integer'],
            [['basic', 'penalty_basic', 'sef', 'penalty_sef', 'total_amount', 'grand_total', 'assessed_value'], 'number'],
            [['barangay', 'arp_no', 'property_owner', 'address'], 'safe'],
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
        $query = AccountStatement::find();

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
            'soa_id' => $this->soa_id,
            'property_owner' => $this->property_owner,
            'address' => $this->address,
            'arp_no' => $this->arp_no,
            'year_unpaid' => $this->year_unpaid,
            'percentage' => $this->percentage,
            'basic' => $this->basic,
            'penalty_basic' => $this->penalty_basic,
            'sef' => $this->sef,
            'penalty_sef' => $this->penalty_sef,
            'total_amount' => $this->total_amount,
            'grand_total' => $this->grand_total,
            'assessed_value' => $this->assessed_value,
        ]);

        $query->andFilterWhere(['like', 'barangay', $this->barangay]);

        return $dataProvider;
    }
}

