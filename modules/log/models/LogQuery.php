<?php

namespace app\modules\log\models;

/**
 * This is the ActiveQuery class for [[Log]].
 *
 * @see Log
 */
class LogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Log[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Log|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
