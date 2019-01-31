<?php

use yii\db\Migration;

/**
 * Class m180402_084749_addBaseTables
 */
class m180402_084749_addBaseTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%courses}}', [
            'id' => $this->primaryKey()->comment('Первичный ключ'),
            'title' => $this->string()->notNull()->unique(),
            'slug' => $this->string()->notNull()->unique(),
            'about' => $this->string(),
            'description' => $this->string(10248),
        ]);

        $this->createTable('{{%lessons}}', [
            'id' => $this->primaryKey()->comment('Первичный ключ'),
            'title' => $this->string()->notNull(),
            'about' => $this->string(),
            'description' => $this->string(10248),
            'id_course' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('FK_lesson_course', 'lessons', 'id_course', 'courses', 'id');

        $this->createTable('{{%timetable}}', [
            'id' => $this->primaryKey()->comment('Первичный ключ'),
            'start_time' => 'timestamp with time zone',
            'id_lesson' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('FK_timetable_lesson', '{{%timetable}}', 'id_lesson', 'lessons', 'id');

        $this->createTable('{{%journal}}', [
            'id' => $this->primaryKey()->comment('Первичный ключ'),
            'id_timetable' => $this->integer(),
            'id_user' => $this->integer(),
        ]);

        $this->addForeignKey('FK_journal_timetable', 'journal', 'id_timetable', 'timetable', 'id');
        $this->addForeignKey('FK_journal_users', 'journal', 'id_user', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%journal}}');
        $this->dropTable('{{%timetable}}');
        $this->dropTable('{{%lessons}}');
        $this->dropTable('{{%courses}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180402_084749_addBaseTables cannot be reverted.\n";

        return false;
    }
    */
}
