<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TaxDeclaration;

/**
 * TaxDeclarationSearch represents the model behind the search form of `app\models\TaxDeclaration`.
 */
class TaxDeclarationSearch extends TaxDeclaration
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['td_no', 'survey_no', 'area', 'market_value', 'assessment_level', 'assessed_value', 'php', 'total_php', 'effectivity_quarter', 'effectivity_year'], 'integer'],
            [['contact_no', 'classification', 'actual_use', 'tot_assessed_value', 'property_owner', 'address', 'location', 'faas', 'tax_dec_pdf', 'tax_dec_filename', 'property_index_no', 'arp_no'], 'safe'],

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
        $query = TaxDeclaration::find();

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
            'td_no' => $this->td_no,

            //'property_index_no' => $this->property_index_no,
            //'arp_no' => $this->arp_no,

            'survey_no' => $this->survey_no,
            'area' => $this->area,
            'market_value' => $this->market_value,
            'assessment_level' => $this->assessment_level,
            'assessed_value' => $this->assessed_value,
            'php' => $this->php,
            'total_php' => $this->total_php,
            'effectivity_quarter' => $this->effectivity_quarter,
            'effectivity_year' => $this->effectivity_year,
            'cancels_assessed_value' => $this->cancels_assessed_value,
            'lot_no' => $this->lot_no,
            'blk_no' => $this->blk_no,
        ]);

        $query->andFilterWhere(['like', 'tel_no', $this->tel_no])
            ->andFilterWhere(['like', 'property_owner', $this->property_owner])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'classification', $this->classification])
            ->andFilterWhere(['like', 'actual_use', $this->actual_use])
            ->andFilterWhere(['like', 'tot_assessed_value', $this->tot_assessed_value])
            ->andFilterWhere(['like', 'property_kind', $this->property_kind])
            ->andFilterWhere(['like', 'taxability', $this->taxability])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'cancels_arp_no', $this->cancels_arp_no])
            ->andFilterWhere(['like', 'beneficial_user', $this->beneficial_user])
            ->andFilterWhere(['like', 'user_tel_no', $this->user_tel_no])
            ->andFilterWhere(['like', 'user_address', $this->user_address])
            ->andFilterWhere(['like', 'otc', $this->otc])
            ->andFilterWhere(['like', 'oct', $this->oct])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'bound_north', $this->bound_north])
            ->andFilterWhere(['like', 'bound_south', $this->bound_south])
            ->andFilterWhere(['like', 'bound_east', $this->bound_east])
            ->andFilterWhere(['like', 'bound_west', $this->bound_west])
            ->andFilterWhere(['like', 'mun_assessor', $this->mun_assessor])
            ->andFilterWhere(['like', 'prov_assessor', $this->prov_assessor])
            ->andFilterWhere(['like', 'faas', $this->faas])
            ->andFilterWhere(['like', 'tax_dec_pdf', $this->tax_dec_pdf])
            ->andFilterWhere(['like', 'tax_dec_filename', $this->tax_dec_filename])
            ->andFilterWhere(['like', 'property_index_no', $this->property_index_no])
            ->andFilterWhere(['like', 'arp_no', $this->arp_no]);


        return $dataProvider;
    }
}
