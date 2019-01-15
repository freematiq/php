<?php

use yii\db\Migration;

/**
 * Class m190114_094129_addDateToTimetable
 */
class m190114_094129_addDateToTimetable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('timetable', 'start_day', $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('timetable', 'start_day');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190114_094129_addDateToTimetable cannot be reverted.\n";

        return false;
    }
    */
}
