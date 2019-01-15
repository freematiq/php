<?php

use yii\db\Migration;

/**
 * Class m181219_093009_AddRoles
 */
class m181219_093009_AddRoles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $rbac = \Yii::$app->authManager;

        $guest = $rbac->createRole('guest');
        $guest->description = 'Посетитель';
        $rbac->add($guest);

        $student = $rbac->createRole('student');
        $student->description = 'Студент';
        $rbac->add($student);

        $manager = $rbac->createRole('manager');
        $manager->description = 'Управление курсами';
        $rbac->add($manager);

        $admin = $rbac->createRole('admin');
        $admin->description = 'Может всё';
        $rbac->add($admin);

        $rbac->addChild($admin, $manager);
        $rbac->addChild($manager, $student);
        $rbac->addChild($student, $guest);

        $rbac->assign(
            $admin,
            \app\models\User::findOne([
                'username' => 'php'])->id
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $manager = \Yii::$app->authManager;
        $manager->removeAll();

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181219_093009_AddRoles cannot be reverted.\n";

        return false;
    }
    */
}
