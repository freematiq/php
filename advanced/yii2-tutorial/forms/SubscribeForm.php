<?php

namespace app\forms;

use Yii;
use yii\base\Model;
use app\models\Course;
/**
 * SubscribeForm нужна для регистрации пользователя на курс
 *
 */
class SubscribeForm extends Model
{
    public $message = null;
    public $course_id = null;

    /* @var UploadedFile */
    public $file = null;

    public function __construct(Course $course = null) {
        if (null !== $course) {
            $this->course_id = $course->id;
        }
    }

    public function rules()
    {
        return [
            ['message', 'string', 'max' => 1024],
            ['course_id', 'integer'],
            ['file', 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'message' => 'Введите комментарий о курсе',
        ];
    }
}
