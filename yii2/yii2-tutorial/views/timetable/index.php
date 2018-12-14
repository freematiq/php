<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TimetableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Timetables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Timetable', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'start_time',
            'id_lesson',
            [
                'attribute' => 'Lesson', 'value' => function($timetable) {
                    return $timetable->lesson->title;
            }],
            [
                'attribute' => 'Users', 'value' => function($timetable) {
                    $strUser = '';
                    foreach ($timetable->users as $user) {
                        $strUser .= $user->email . ' ';
                    }
                    return $strUser;
            }],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
