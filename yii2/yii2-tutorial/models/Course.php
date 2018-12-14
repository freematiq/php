<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property int $id Первичный ключ
 * @property string $title
 * @property string $slug
 * @property string $about
 * @property string $description
 *
 * @property Lessons[] $lessons
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 10248],
            [['slug'], 'unique'],
            [['title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'title' => 'Title',
            'slug' => 'Slug',
            'about' => 'About',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLessons()
    {
        return $this->hasMany(Lessons::className(), ['id_course' => 'id']);
    }
}
