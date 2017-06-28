<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_statement".
 *
 * @property int $soa_id
 * @property int $td_no
 * @property string $barangay
 * @property int $year_unpaid
 * @property int $percentage
 * @property int $basic
 * @property int $penalty_basic
 * @property int $sef
 * @property int $penalty_sef
 * @property int $total_amount
 * @property int $grand_total
 * @property string $validity
 */
class AccountStatement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account_statement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['td_no', 'barangay', 'year_unpaid', 'percentage', 'basic', 'penalty_basic', 'sef', 'penalty_sef', 'total_amount', 'grand_total', 'validity'], 'required'],
            [[ 'year_unpaid', 'percentage'], 'integer'],
            [['basic', 'penalty_basic', 'sef', 'penalty_sef', 'total_amount', 'grand_total', 'assessed_value'], 'number'],
            //[['validity'], 'safe'],
            [['arp_no'], 'string', 'max' => 128],
             [['property_owner', 'barangay'], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'soa_id' => 'SOA ID',
            'arp_no' => 'TD/ARP No',
            'barangay' => 'Barangay',
            'property_owner' => 'Property Owner',
            'address' => 'Address',
            'year_unpaid' => 'Taon na di Bayad',
            'percentage' => 'Porsyento ng Rekano (%)',
            'basic' => 'Basic',
            'penalty_basic' => 'Penalty (Basic)',
            'sef' => 'SEF',
            'penalty_sef' => 'Penalty (SEF)',
            'total_amount' => 'Total Amount',
            'grand_total' => 'Kabuuang Bayarin',
            'assessed_value' => 'Kabuuang Halaga',
        ];
    }
}
