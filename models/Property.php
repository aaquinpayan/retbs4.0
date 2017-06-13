<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "property".
 *
 * @property int $property_index_no
 * @property string $full_name
 * @property string $address
 * @property string $kind
 * @property string $loc_num_street
 * @property string $loc_brgy_district
 * @property string $loc_mun_prov
 * @property string $loc_full
 * @property string $north_boundary
 * @property string $south_boundary
 * @property string $east_boundary
 * @property string $west_boundary
 */
class Property extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['property_index_no', 'name_of_owner', 'kind', 'location', 'north_boundary', 'south_boundary', 'east_boundary', 'west_boundary'], 'required'],
            [['property_index_no', 'name_of_owner', 'kind', 'location', 'north_boundary', 'south_boundary', 'east_boundary', 'west_boundary'], 'string', 'max' => 32],
        ];
       /**
     * @inheritdoc
     */
    }
    public function attributeLabels()
    {
        return [

        	'property_id' => "Property ID",
            'property_index_no' => 'Property Index No',
            'name_of_owner' => 'Owner',
            'kind' => 'Kind',
            'location' => 'Location',
            'north_boundary' => 'North Boundary',
            'south_boundary' => 'South Boundary',
            'east_boundary' => 'East Boundary',
            'west_boundary' => 'West Boundary',
        ];

        /* 'Location,  (Number/Street, Barangay/District, Municipal/Province)', */
    }

}