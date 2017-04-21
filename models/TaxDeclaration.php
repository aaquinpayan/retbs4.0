<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tax_declaration".
 *
 * @property int $td_no
 * @property int $property_index_no
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
            [['property_index_no', 'contact_no', 'survey_no', 'classification', 'area', 'market_value', 'actual_use', 'assessment_level', 'assessment_value', 'php', 'total_php', 'tot_assessed_value', 'effectivity_quarter', 'effectivity_year'], 'required'],
            [['property_index_no', 'survey_no', 'area', 'market_value', 'assessment_level', 'assessment_value', 'php', 'total_php', 'effectivity_quarter', 'effectivity_year'], 'integer'],
            [['contact_no'], 'string', 'max' => 15],
            [['classification', 'actual_use', 'tot_assessed_value'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'td_no' => 'Td No',
            'property_index_no' => 'Property Index No',
            'contact_no' => 'Contact No',
            'survey_no' => 'Survey No',
            'classification' => 'Classification',
            'area' => 'Area',
            'market_value' => 'Market Value',
            'actual_use' => 'Actual Use',
            'assessment_level' => 'Assessment Level',
            'assessment_value' => 'Assessment Value',
            'php' => 'Php',
            'total_php' => 'Total Php',
            'tot_assessed_value' => 'Tot Assessed Value',
            'effectivity_quarter' => 'Effectivity Quarter',
            'effectivity_year' => 'Effectivity Year',
        ];
    }
}
