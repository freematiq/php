<?php

use yii\db\Migration;

/**
 * Class m190116_074401_AddUserBalance
 */
class m190116_074401_AddUserBalance extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'balance', $this->integer()->notNull()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'balance');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190116_074401_AddUserBalance cannot be reverted.\n";

        return false;
    }
    */
}
