<?php
<<<<<<< HEAD

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_statement".
 *
=======

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_statement".
 *
>>>>>>> origin/db_branch
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
<<<<<<< HEAD
 */
class StatementAccountSearch extends \yii\db\ActiveRecord
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
=======
 */
class StatementAccountSearch extends \yii\db\ActiveRecord
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
>>>>>>> origin/db_branch
        return [
            [['td_no', 'barangay', 'year_unpaid', 'percentage', 'basic', 'penalty_basic', 'sef', 'penalty_sef', 'total_amount', 'grand_total', 'validity'], 'required'],
            [['td_no', 'year_unpaid', 'percentage', 'basic', 'penalty_basic', 'sef', 'penalty_sef', 'total_amount', 'grand_total'], 'integer'],
            [['validity'], 'safe'],
            [['barangay'], 'string', 'max' => 32],
<<<<<<< HEAD
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
=======
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
>>>>>>> origin/db_branch
            'soa_id' => 'Soa ID',
            'td_no' => 'Td No',
            'barangay' => 'Barangay',
            'year_unpaid' => 'Year Unpaid',
            'percentage' => 'Percentage',
            'basic' => 'Basic',
            'penalty_basic' => 'Penalty Basic',
            'sef' => 'Sef',
            'penalty_sef' => 'Penalty Sef',
            'total_amount' => 'Total Amount',
            'grand_total' => 'Grand Total',
            'validity' => 'Validity',
<<<<<<< HEAD
        ];
    }
}
=======
        ];
    }
}
>>>>>>> origin/db_branch
