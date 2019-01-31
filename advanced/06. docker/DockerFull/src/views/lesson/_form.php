<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


use kartik\widgets\Select2; // or kartik\select2\Select2
use yii\web\JsExpression;
use app\models\Course;

/* @var $this yii\web\View */
/* @var $model app\models\Lessons */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lessons-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'about')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_course')->dropDownList($clients) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>


    <?php

    $url = \yii\helpers\Url::to(['course/courselist']);

    $courseDesc = empty($model->course) ? '' : Course::findOne($model->course->id)->title;

    echo $form->field($model, 'course')->widget(Select2::classname(), [
        'initValueText' => $courseDesc, // set the initial display text
        'options' => ['placeholder' => 'Search for a course ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 1,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
            ],
            'ajax' => [
                'url' => $url,
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(course) { return course.text; }'),
            'templateSelection' => new JsExpression('function (course) { return course.text; }'),
        ],
    ]);
    ?>

    <?php ActiveForm::end(); ?>

</div>
