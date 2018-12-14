<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timetable".
 *
 * @property int $id Первичный ключ
 * @property string $start_time
 * @property int $id_lesson
 *
 * @property Journal[] $journals
 * @property Lessons $lesson
 */
class Timetable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'timetable';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_time'], 'safe'],
            [['id_lesson'], 'required'],
            [['id_lesson'], 'default', 'value' => null],
            [['id_lesson'], 'integer'],
            [['id_lesson'], 'exist', 'skipOnError' => true, 'targetClass' => Lessons::className(), 'targetAttribute' => ['id_lesson' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_time' => 'Start Time',
            'id_lesson' => 'Id Lesson',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJournals()
    {
        return $this->hasMany(Journal::className(), ['id_timetable' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lessons::className(), ['id' => 'id_lesson']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'id_user'])
                ->viaTable('journal', ['id_timetable' => 'id']);
    }
}
