<?php

namespace app\controllers;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Course;
use app\models\Subscribe;

class SubscribeController extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['subscribe'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['student'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'subscribe' => ['post'],
                ],
            ],
        ];
    }

    public function actionSubscribe()
    {
        $form = new \app\forms\SubscribeForm();
        $form->load(\Yii::$app->request->post());
        if ($form->validate()) {
            $course = Course::findOne(['id' => $form->course_id]);

            $subscription = new Subscribe();
            $subscription->id_course = $course->id;
            $subscription->id_user = \Yii::$app->user->id;
            $subscription->comment = $form->message;

            $result = $subscription->save();
            if ($result) {
                \Yii::$app->session->setFlash('subscribe_done', "Вы подписаны на {$course->title}!");
            } else {
                \Yii::$app->session->setFlash('subscribe_error', print_r($subscription->errors, true));
            }

            return $this->redirect(['course/view', 'id' => $course->id]);
        } else {
            \Yii::$app->session->setFlash('subscribe_error', print_r($form->errors, true));
        }
    }
}
