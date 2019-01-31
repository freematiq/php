<?php

use yii\db\Migration;

/**
 * Class m181224_103554_AddSubscribe
 */
class m181224_103554_AddSubscribe extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('subscribes', [
            'id' => $this->primaryKey()->comment('Первичный ключ'),
            'id_user' => $this->integer()->notNull(),
            'id_course' => $this->integer()->notNull(),
            'approved' => $this->boolean(),
            'comment' => $this->string(1024),
            'created_at' => 'timestamp with time zone NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp with time zone NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ]);

        $this->addForeignKey('FK_subscribe_user', 'subscribes', 'id_user', 'user', 'id');
        $this->addForeignKey('FK_subscribe_course', 'subscribes', 'id_course', 'courses', 'id');
        $this->createIndex('subscribe_one_user_unique_idx', 'subscribes', ['id_user', 'id_course'], true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('subscribes');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181224_103554_AddSubscribe cannot be reverted.\n";

        return false;
    }
    */
}
