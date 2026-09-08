<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "memo_tag".
 *
 * @property int $id
 * @property int $memo_id
 * @property int $tag_id
 *
 * @property Memo $memo
 * @property Tag $tag
 */
class MemoTag extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'memo_tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['memo_id', 'tag_id'], 'required'],
            [['memo_id', 'tag_id'], 'integer'],
            [['memo_id', 'tag_id'], 'unique', 'targetAttribute' => ['memo_id', 'tag_id']],
            [['memo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Memo::class, 'targetAttribute' => ['memo_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::class, 'targetAttribute' => ['tag_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'memo_id' => 'Memo ID',
            'tag_id' => 'Tag ID',
        ];
    }

    /**
     * Gets query for [[Memo]].
     *
     * @return \yii\db\ActiveQuery|MemoQuery
     */
    public function getMemo()
    {
        return $this->hasOne(Memo::class, ['id' => 'memo_id']);
    }

    /**
     * Gets query for [[Tag]].
     *
     * @return \yii\db\ActiveQuery|TagQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::class, ['id' => 'tag_id']);
    }

    /**
     * {@inheritdoc}
     * @return MemoTagQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MemoTagQuery(get_called_class());
    }

}
