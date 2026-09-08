<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property int $id
 * @property string $name
 *
 * @property MemoTag[] $memoTags
 * @property Memo[] $memos
 */
class Tag extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[MemoTags]].
     *
     * @return \yii\db\ActiveQuery|MemoTagQuery
     */
    public function getMemoTags()
    {
        return $this->hasMany(MemoTag::class, ['tag_id' => 'id']);
    }

    /**
     * Gets query for [[Memos]].
     *
     * @return \yii\db\ActiveQuery|MemoQuery
     */
    public function getMemos()
    {
        return $this->hasMany(Memo::class, ['id' => 'memo_id'])->viaTable('memo_tag', ['tag_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TagQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TagQuery(get_called_class());
    }

}
