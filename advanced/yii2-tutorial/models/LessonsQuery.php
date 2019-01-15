<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Lessons]].
 *
 * @see Lessons
 */
class LessonsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Lessons[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Lessons|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
