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
            [['td_no', 'year_unpaid', 'percentage', 'basic', 'penalty_basic', 'sef', 'penalty_sef', 'total_amount', 'grand_total'], 'integer'],
            //[['validity'], 'safe'],
            [['barangay'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'soa_id' => 'SOA ID',
            'td_no' => 'TD No',
            'barangay' => 'Barangay',
            'year_unpaid' => 'Year Unpaid',
            'percentage' => 'Percentage',
            'basic' => 'Basic',
            'penalty_basic' => 'Penalty (Basic)',
            'sef' => 'SEF',
            'penalty_sef' => 'Penalty (SEF)',
            'total_amount' => 'Total Amount',
            'grand_total' => 'Grand Total',
            //'validity' => 'Validity',
        ];
    }
}
