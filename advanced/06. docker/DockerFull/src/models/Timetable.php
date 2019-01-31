<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timetable".
 *
 * @property int $id Первичный ключ
 * @property \DateTime $start_time
 * @property string $start_day
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
            [['start_day'], 'safe'],
            [['start_time', 'start_day'], 'required'],
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

    /**
     * Reformates date to show in form
     * @return bool
     */
    public function afterFind()
    {
        parent::afterFind();
        $a = $this->start_time;
        $date = new \DateTime($this->start_time, new \DateTimeZone("Europe/Moscow"));
        $this->start_time = $date->format("Y-m-d H:i:s");
    }

    /**
     * Reformates date before save
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $date = new \DateTime($this->start_time);
            if ($date != null) {
                $this->start_time = $date->format(\DateTime::W3C);
            }
            /*$date = \DateTime::createFromFormat('dd-M-yyyy', $this->start_day);
            $this->start_day = $date->format('Y-m-d');*/
            return true;
        } else {
            return false;
        }
    }
}
