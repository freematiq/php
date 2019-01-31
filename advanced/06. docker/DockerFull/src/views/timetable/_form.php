<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Timetable */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="timetable-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php echo $form->field($model, 'start_day')->widget(DatePicker::classname(), [
        'options' => [
            'placeholder' => 'Выберите день',
        ],
        'pluginOptions' => [
            'format' => 'dd-M-yyyy',
            'todayHighlight' => true,
            'autoclose' => true,
        ]
    ]) ?>

    <?php echo $form->field($model, 'start_time')->widget(DateTimePicker::classname(), [
        'type' => DateTimePicker::TYPE_INPUT,
        'options' => [
            'placeholder' => 'Выберите время',
        ],
        'pluginOptions' => [
            'format' => 'dd-M-yyyy hh:ii',
            'autoclose' => true,

        ]
    ]) ?>

    <?= $form->field($model, 'id_lesson')->dropDownList($lessons) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
