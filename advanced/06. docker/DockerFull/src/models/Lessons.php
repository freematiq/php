<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lessons".
 *
 * @property int $id Первичный ключ
 * @property string $title
 * @property string $about
 * @property string $description
 * @property int $id_course
 *
 * @property Course $course
 */
class Lessons extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lessons';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'id_course'], 'required'],
            [['id_course'], 'default', 'value' => null],
            [['id_course'], 'integer'],
            [['title', 'about'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 10248],
            [['id_course'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['id_course' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'about' => 'About',
            'description' => 'Description',
            'id_course' => 'Id Course',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'id_course']);
    }

    /**
     * @inheritdoc
     * @return LessonsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LessonsQuery(get_called_class());
    }
}
