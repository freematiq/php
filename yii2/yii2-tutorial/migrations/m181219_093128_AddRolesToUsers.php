<?php

use yii\db\Migration;

/**
 * Class m181219_093128_AddRolesToUsers
 */
class m181219_093128_AddRolesToUsers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new \app\models\User();
        $user->setPassword('student');
        $user->email = 'student@example.com';
        $user->username = 'student';
        $user->generateAuthKey();
        $user->save();

        $user = new \app\models\User();
        $user->setPassword('manager');
        $user->email = 'manager@example.com';
        $user->username = 'manager';
        $user->generateAuthKey();
        $user->save();

        $rbac = \Yii::$app->authManager;

        $admin = $rbac->getRole('admin');
        $rbac->assign(
            $admin,
            \app\models\User::findOne([
                'username' => 'admin'])->id
        );

        $admin = $rbac->getRole('manager');
        $rbac->assign(
            $admin,
            \app\models\User::findOne([
                'username' => 'manager'])->id
        );

        $admin = $rbac->getRole('student');
        $rbac->assign(
            $admin,
            \app\models\User::findOne([
                'username' => 'student'])->id
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181219_093128_AddRolesToUsers cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181219_093128_AddRolesToUsers cannot be reverted.\n";

        return false;
    }
    */
}
