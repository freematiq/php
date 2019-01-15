<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Course */
/* @var $subscription app\models\Subscribe */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('subscribe_done')): ?>
        <div class="alert alert-success">
            <?= Html::encode(Yii::$app->session->getFlash('subscribe_done')) ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::$app->session->hasFlash('subscribe_error')): ?>
        <div class="alert alert-danger">
            <?= Html::encode(Yii::$app->session->getFlash('subscribe_error')) ?>
        </div>
    <?php endif; ?>

    <?php if (\Yii::$app->user->can('manager')): ?>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif; ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'slug',
            'about',
            'description',
        ],
    ]) ?>

    <p>
        <?php if ($subscription): ?>
            Вы подписаны! <?= $subscription->created_at ?>
            Ваш комментарий: <?= Html::encode($subscription->comment) ?>
            <?php if ($subscription->filename): ?>
                Документ: <a href="/uploads/<?= $subscription->filename ?>">Скачать</a>
            <?php endif; ?>
        <?php else: ?>
            <?= $this->render('/subscribe/_form', [
                'model' => $subscribeForm,
            ]) ?>
        <?php endif; ?>
    </p>

</div>
