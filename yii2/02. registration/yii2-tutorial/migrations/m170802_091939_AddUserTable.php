<?php

use yii\db\Migration;

class m170802_091939_AddUserTable extends Migration
{
    public function safeUp()
    {
       
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey()->comment('Первичный ключ'),
            'username' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->integer()->notNull()->defaultValue(app\models\User::STATUS_ACTIVE),
        ]);
    }

    public function safeDown()
    {
        echo "m170802_091939_AddUserTable cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170802_091939_AddUserTable cannot be reverted.\n";

        return false;
    }
    */
}
