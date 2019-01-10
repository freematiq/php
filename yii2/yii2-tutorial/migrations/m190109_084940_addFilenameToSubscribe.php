<?php

use yii\db\Migration;

/**
 * Class m190109_084940_addFilenameToSubscribe
 */
class m190109_084940_addFilenameToSubscribe extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('subscribes', 'filename', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('subscribes', 'filename');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190109_084940_addFilenameToSubscribe cannot be reverted.\n";

        return false;
    }
    */
}
