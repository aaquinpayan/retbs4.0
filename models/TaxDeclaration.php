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


    public $taxdec_pdf;
    public $file;
    public $id;
    public $image;
     public $path;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            /*[['property_index_no', 'survey_no', 'classification', 'area', 'market_value', 'actual_use', 'assessment_level', 'effectivity_quarter', 'effectivity_year', 'mun_assessor', 'prov_assessor'], 'required'],*/
            [['survey_no', 'area', 'effectivity_quarter', 'effectivity_year', 'lot_no', 'blk_no'], 'integer'],
            [['market_value', 'assessment_level', 'assessed_value', 'php', 'total_php'], 'decimal'],
            //[['tel_no', 'user_tel_no', 'date'], 'string', 'max' => 15],
            [['classification', 'actual_use', 'tot_assessed_value', 'address', 'location', 'taxability', 'property_kind', 'beneficial_user', 'user_address', 'otc', 'oct', 'bound_north', 'bound_east', 'bound_west', 'bound_south', 'mun_assessor', 'prov_assessor', 'faas', 'tax_dec_pdf', 'tax_dec_filename', 'property_index_no', 'arp_no'], 'string', 'max' => 32],
            [['property_owner'], 'string', 'max' => 64],
            [['taxdec_pdf'], 'safe'],
            [['taxdec_pdf'], 'file', 'extensions'=>'pdf'],
            
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx,xls'],
        


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
            'faas' => 'Field Apraisal & Assessment Sheet',
            'tax_dec_filename' => 'Filename',
            'tax_dec_pdf' => 'Tax Dec PDF',

        ];
    }

    
    
    public function upload()
    {
        if ($this->validate()) {
            $this->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension);
            
            return true;
        } else {
            return false;
        }
    }

    public function gridFloorData($image)
        {
            $height = SystemConfig::getValue('venue_profile_height');
            $width = SystemConfig::getValue('venue_profile_width');
            $path='/upload/venue_profile/';
            $path1='/upload/venue_floor/';
            
            $image_path =  UtilityHtml::getAdminImage($image,$path1);
            
            $userfile_array = explode(".", strtolower($image_path));
            $userfile_extn = ($userfile_array[count($userfile_array) - 1] );
            
            if ($userfile_extn == 'jpg' || $userfile_extn == 'png' || $userfile_extn == 'jpeg' || $userfile_extn == 'gif' || $userfile_extn == 'bmp' || $userfile_extn == '') {
                echo $data = '<a class="fancybox1" href="'.$image_path.'"><img height='.$height.' width='.$width.' src="'.$image_path.'"></a>';
            }else{
             //if file is PDF........
                echo $data = '<a target="_blank" href="'.$image_path.'">'.$image.'</a>';
            }
        }

        public static function getAdminImage($image,$path) {

                if ($image != '' && file_exists(YiiBase::getPathOfAlias('webroot') . $path . $image)) {
                        return  Yii::app()->request->baseUrl . $path . $image;
                } else {
                        return  Yii::app()->request->baseUrl . $path.'images.jpg';
                }

        }
}
