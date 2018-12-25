<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Ubuntu:700&amp;amp;subset=cyrillic"
          type="text/css" rel="stylesheet"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Digitalspace',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'Уроки', 'url' => ['/lesson']],
            Yii::$app->user->can('admin') ? (
            ['label' => 'Пользователи', 'url' => ['/user']]
            ) : '',
            ['label' => 'Курсы', 'url' => ['/course']],

            ['label' => 'Расписание', 'url' => ['/timetable']],
            Yii::$app->user->can('admin') ? (
            ['label' => 'Журнал', 'url' => ['/journal']]
            ) : '',
            Yii::$app->user->isGuest ? (
            ['label' => 'Регистрация', 'url' => ['/register']]
            ) : '',
            Yii::$app->user->isGuest ? (
            ['label' => 'Вход', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">Digitalspace — образовательно-событийный центр, &copy; <?= date('Y') ?></p>
        <p class="pull-right">Мы в социальных сетях:
            <a href="https://vk.com/dspacepro"><i class="icon-vk-logo">vk.com</i></a>
            <a href="https://facebook.com/dspacepro"><i class="icon-facebook-logo">facebook.com</i></a>
        </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
