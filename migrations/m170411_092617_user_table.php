<?php

use yii\db\Migration;
use yii\db\Schema;

class m170411_092617_user_table extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable("users", [
            "user_id" => Schema::TYPE_PK,
            "username" => Schema::TYPE_STRING,
            "password" => Schema::TYPE_STRING,
            "user_type" => Schema::TYPE_STRING,
         ]);
    }

    public function down()
    {
        $this->dropTable('users');
    }
   
    /*
     public function safeUp()
    {
        
    }

    public function safeDown()
    {
        echo "m170411_092617_user_table cannot be reverted.\n";

        return false;

    */
}
