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
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    // public $id;
    // public $username;
    // public $password;
    // public $authKey;
    public $accessToken;

    // private static $users = [
    //     '100' => [
    //         'id' => '100',
    //         'username' => 'admin',
    //         'password' => 'admin',
    //         'authKey' => 'test100key',
    //         'accessToken' => '100-token',
    //     ],
    //     '101' => [
    //         'id' => '101',
    //         'username' => 'demo',
    //         'password' => 'demo',
    //         'authKey' => 'test101key',
    //         'accessToken' => '101-token',
    //     ],
    // ];

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
            [['username', 'password', 'user_type','first_name','middle_name','last_name'], 'required'],
            [['full_name'], 'string'],
            [['first_name','middle_name','last_name'], 'string', 'max' => 20],
            [['user_type'], 'string', 'max' => 10],
            [['authKey'], 'string', 'max' => 32],
            [['username', 'password'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'full_name' => 'Name',
            'user_id' => 'User ID',
            'username' => 'Username',
            'password' => 'Password',
            'user_type' => 'User Type',
        ];
    }



    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // return $this->access_token;
        throw new NotSupportedException();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {

       return self::findOne(['username'=>trim($username, " ")]);

    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return trim($this->password, " ") === $password;
    }

    
}
