<?php

use yii\db\Migration;

/**
 * Class m180402_084728_AddAuthKeyToUser
 */
class m180402_084728_AddAuthKeyToUser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'auth_key', $this->string(32));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'auth_key');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180402_084728_AddAuthKeyToUser cannot be reverted.\n";

        return false;
    }
    */
}
