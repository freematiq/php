<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subscribes".
 *
 * @property int $id Первичный ключ
 * @property int $id_user
 * @property int $id_course
 * @property bool $approved
 * @property string $comment
 * @property string $created_at
 * @property string $updated_at
 * @property string filename
 *
 * @property Course $course
 * @property User $user
 */
class Subscribe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscribes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_course'], 'required'],
            [['id_user', 'id_course'], 'default', 'value' => null],
            [['id_user', 'id_course'], 'integer'],
            [['approved'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['comment'], 'string', 'max' => 1024],
            [['id_course'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['id_course' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_course' => 'Id Course',
            'approved' => 'Approved',
            'comment' => 'Comment',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::class, ['id' => 'id_course']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }

    public function getUploadPath()
    {
        return empty($this->filename) ? null : '/uploads/' . $this->filename;
    }

    public static function getUnresolvedCount()
    {
        return self::find()->count();
    }
}
