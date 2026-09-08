<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MemoTag]].
 *
 * @see MemoTag
 */
class MemoTagQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MemoTag[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MemoTag|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
