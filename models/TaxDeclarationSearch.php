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
            [['td_no', 'property_index_no', 'survey_no', 'area', 'market_value', 'assessment_level', 'assessment_value', 'php', 'total_php', 'effectivity_quarter', 'effectivity_year'], 'integer'],
            [['contact_no', 'classification', 'actual_use', 'tot_assessed_value'], 'safe'],
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
            'property_index_no' => $this->property_index_no,
            'survey_no' => $this->survey_no,
            'area' => $this->area,
            'market_value' => $this->market_value,
            'assessment_level' => $this->assessment_level,
            'assessment_value' => $this->assessment_value,
            'php' => $this->php,
            'total_php' => $this->total_php,
            'effectivity_quarter' => $this->effectivity_quarter,
            'effectivity_year' => $this->effectivity_year,
        ]);

        $query->andFilterWhere(['like', 'contact_no', $this->contact_no])
            ->andFilterWhere(['like', 'classification', $this->classification])
            ->andFilterWhere(['like', 'actual_use', $this->actual_use])
            ->andFilterWhere(['like', 'tot_assessed_value', $this->tot_assessed_value]);

        return $dataProvider;
    }
}
