<?php

namespace app\commands;

use app\models\Course;
use app\models\User;
use yii\console\Controller;
use yii\db\Transaction;

/**
 * Класс, демонстрирующий работу с транзакциями в Yii2
 */
class TransactionController extends Controller
{
    /**
     * Добавить курс по имени
     * @param string $name Добавить курс в БД
     */
    public function actionAddCourse($name)
    {
        /* @var $transaction Transaction */
        $transaction = \Yii::$app->db->beginTransaction();
//        $transaction->setIsolationLevel(Transaction::SERIALIZABLE);
        try {
            $course = new Course();
            $course->title = $name;
            $course->slug = $name;
            if (!$course->validate()) {
                echo "- Error validation" . PHP_EOL;
                print_r($course->errors);
                return 1;
            }
            if (!$course->save()) {
                echo "- Error saving" . PHP_EOL;
                print_r($course->errors);
                return 1;
            }

            echo "Sleeping" . PHP_EOL;

            $transaction->commit();

            echo "+ Ok! Done" . PHP_EOL;
        } catch (\Exception $e) {
            $transaction->rollBack();
            throw new $e;
        }
    }

    /**
     * Вывести список курсов
     */
    public function actionListCourses()
    {
        $transaction = \Yii::$app->db->beginTransaction();
        $transaction->setIsolationLevel(Transaction::REPEATABLE_READ);
        //$transaction->setIsolationLevel(Transaction::SERIALIZABLE);

        $courses = Course::find()->all();
        foreach ($courses as $course) {
            echo "{$course->title}" . PHP_EOL;
        }

        echo "Will sleep 5s\n";
        sleep(5);

        $courses = Course::find()->all();
        foreach ($courses as $course) {
            echo "{$course->title}" . PHP_EOL;
        }
    }

    /**
     * Вывести число курсов
     */
    public function actionCountCourses()
    {
        $transaction = \Yii::$app->db->beginTransaction();
        $transaction->setIsolationLevel(Transaction::REPEATABLE_READ);

        $result = \Yii::$app->db->createCommand('SELECT sum(id) FROM courses')->queryAll()[0];
        print_r($result);

        echo "Will sleep 5s\n";
        sleep(5);

        $result = \Yii::$app->db->createCommand('SELECT sum(id) FROM courses')->queryAll()[0];
        print_r($result);
    }

    /**
     * Вывести баланс пользователя php
     */
    public function actionShowBalance()
    {
        $transaction = \Yii::$app->db->beginTransaction();
        $transaction->setIsolationLevel(Transaction::SERIALIZABLE);

        try {
            $user = User::findByUsername('php');
            echo "Balance = {$user->balance}\n";
            $transaction->commit();

        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Добавить баланс пользователю
     * @param string $username - имя ользователя
     * @param integer $num сумма
     */
    public function actionAddBalance($username, $num)
    {
        $num = (int)$num;
        $transaction = \Yii::$app->db->beginTransaction();
//        $transaction->setIsolationLevel(Transaction::SERIALIZABLE);

        try {

            \Yii::$app->db->createCommand('SELECT * FROM public.user WHERE username = :username FOR UPDATE')
                ->bindValues([
                    'username' => $username,
                ])->queryAll();

            $user = User::findByUsername($username);

            echo "Balance = {$user->balance}\n";


            \Yii::$app->db->createCommand('UPDATE public.user SET balance = balance + :add WHERE id = :id')
                ->bindValues([
                    'add' => $num,
                    'id' => $user->id,
                ])->queryAll();

            sleep(5);


            $user = User::findByUsername($username);
            echo "Balance after = {$user->balance}\n";

            $transaction->commit();

        } catch (\Exception $e) {
            throw $e;
        }
    }
}
