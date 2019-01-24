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
        $subs = \Yii::$app->cache->get('subscrs');
        $subs2 = $subs;
        if (empty($subs)) {
            $subs = Subscribe::find()->all();
            \Yii::$app->cache->set('subscrs', $subs);
        }

        $start = microtime(true);
        $subs = Subscribe::find()->all();
        $total_db = microtime(true) - $start;

        $start = microtime(true);
        $subs = \Yii::$app->cache->get('subscrs');
        $total_mem = microtime(true) - $start;

        $start = microtime(true);
        $subs2 = $subs;
        $total_var = microtime(true) - $start;

        return $this->render('index', [
            'subs' => $subs,
            'total_db' => $total_db,
            'total_mem' => $total_mem,
            'total_var' => $total_var,
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

            \Yii::$app->cache->delete('subscrs');

            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                \Yii::$app->session->removeFlash('subscribe_done');
                \Yii::$app->session->removeFlash('subscribe_error');
                $data = [
                    'demo' => 'answer',
                    'message' => 'Вы подписаны! ' . (new \DateTime($subscription->created_at))->format(\DateTime::W3C),
                ];
                return $data;
            }

            return $this->redirect(['course/view', 'id' => $course->id]);
        } else {
            \Yii::$app->session->setFlash('subscribe_error', 'Validate: ' . print_r($form->errors, true));
        }
    }
}
