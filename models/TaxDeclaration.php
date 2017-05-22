<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tax_declaration".
 *
 * @property int $td_no
 * @property int $property_index_no
 * @property int $owner_name
 * @property int $address
 * @property string $contact_no
 * @property int $survey_no
 * @property string $classification
 * @property int $area
 * @property int $market_value
 * @property string $actual_use
 * @property int $assessment_level
 * @property int $assessment_value
 * @property int $php
 * @property int $total_php
 * @property string $tot_assessed_value
 * @property int $effectivity_quarter
 * @property int $effectivity_year
 */
class TaxDeclaration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tax_declaration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['property_index_no', 'survey_no', 'classification', 'area', 'market_value', 'actual_use', 'assessment_level', 'effectivity_quarter', 'effectivity_year', 'mun_assessor', 'prov_assessor'], 'required'],
            [['property_index_no', 'survey_no', 'area', 'market_value', 'assessment_level', 'assessed_value', 'php', 'total_php', 'effectivity_quarter', 'effectivity_year', 'arp_no', 'lot_no', 'blk_no'], 'integer'],
            [['tel_no', 'user_tel_no', 'date'], 'string', 'max' => 15],
            [['classification', 'actual_use', 'tot_assessed_value', 'property_owner', 'address', 'location', 'taxability', 'property_kind', 'beneficial_user', 'user_address', 'otc', 'oct', 'bound_north', 'bound_east', 'bound_west', 'bound_south', 'mun_assessor', 'prov_assessor' ], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'td_no' => 'TD No',
            'property_index_no' => 'Property Index No',
            'property_owner' => 'Property Owner',
            'address' => 'Address',
            'tel_no' => 'Telephone No',
            'beneficial_user' => 'Administrator/Beneficial User',
            'user_tel_no' => 'Beneficial User Telephone No',
            'user_address' => 'Beneficial User Address',
            'otc' => 'OTC/TCT',
            'oct' => 'OCT/CLOA No',
            'date' => 'Dated',
            'lot_no' => 'Lot No',
            'blk_no' => 'Block No',
            'bound_south' => 'South',
            'bound_north' => 'North',
            'bound_east' => 'East',
            'bound_west' => 'West',
            'survey_no' => 'Survey No',
            'classification' => 'Classification',
            'area' => 'Area',
            'market_value' => 'Market Value',
            'actual_use' => 'Actual Use',
            'assessment_level' => 'Assessment Level',
            'assessed_value' => 'Assessed Value',
            'php' => 'PHP',
            'total_php' => 'Total PHP',
            'tot_assessed_value' => 'Total Assessed Value',
            'effectivity_quarter' => 'Effectivity Quarter',
            'effectivity_year' => 'Effectivity Year',
            'location' => 'Location of Property',
            'property_kind' => 'Kind',
            'taxability' => 'Taxability',
            'mun_assessor' => 'OIC-Municipal Assessor',
            'prov_assessor' => 'Provincial Municipal Assessor',
        ];
    }
}
