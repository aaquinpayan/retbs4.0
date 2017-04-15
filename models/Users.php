<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $name
 * @property int $user_id
 * @property string $username
 * @property string $password
 * @property int $user_type
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'username', 'password', 'user_type'], 'required'],
            [['name'], 'string'],
            [['user_type'], 'integer'],
            [['username', 'password'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'user_id' => 'User ID',
            'username' => 'Username',
            'password' => 'Password',
            'user_type' => 'User Type',
        ];
    }
}
