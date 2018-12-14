<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JournalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Journals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Journal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_timetable',
            [
                'attribute' => 'user', 'value' => function($model) {
                    return $model->user->email;
            }],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
