<?php

namespace app\controllers;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Course;
use app\models\Subscribe;
use yii\web\UploadedFile;

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
                'only' => ['subscribe', 'index'],
                'rules' => [
                    [
                        'actions' => ['subscribe'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['manager'],
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

    public function actionIndex()
    {
        $subs = Subscribe::find()->all();
        return $this->render('index', [
            'subs' => $subs,
        ]);
    }

    public function actionSubscribe()
    {
        $form = new \app\forms\SubscribeForm();
        $form->load(\Yii::$app->request->post());

        $form->file = UploadedFile::getInstance($form, 'file');

        if ($form->validate()) {
            $course = Course::findOne(['id' => $form->course_id]);

            $subscription = new Subscribe();
            $subscription->id_course = $course->id;
            $subscription->id_user = \Yii::$app->user->id;
            $subscription->comment = $form->message;
            if ($form->file) {
                $subscription->filename = \Yii::$app->security->generateRandomString() . '.' . $form->file->extension;
            }

            $result = $subscription->save();
            if ($result) {
                \Yii::$app->session->setFlash('subscribe_done', "Вы подписаны на {$course->title}!");
                if ($form->file) {
                    $form->file->saveAs("uploads/{$subscription->filename}");
                }
            } else {
                \Yii::$app->session->setFlash('subscribe_error', 'Form: ' . print_r($subscription->errors, true));
            }

            return $this->redirect(['course/view', 'id' => $course->id]);
        } else {
            \Yii::$app->session->setFlash('subscribe_error', 'Validate: ' . print_r($form->errors, true));
        }
    }
}
