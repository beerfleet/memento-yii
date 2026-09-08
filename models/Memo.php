<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "memo".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $type_id
 *
 * @property MemoTag[] $memoTags
 * @property Tag[] $tags
 * @property Type $type
 */
class Memo extends \yii\db\ActiveRecord
{
    /**
     * Holds the submitted tag names for the form.
     * This is not a database field; it is just used to send many-to-many values to the relation sync.
     *
     * @var array
     */
    public $tagNames = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'memo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'type_id'], 'required'],
            [['description'], 'string'],
            [['type_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'unique'],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::class, 'targetAttribute' => ['type_id' => 'id']],
            [['tagNames'], 'safe'],
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
            'description' => 'Description',
            'type_id' => 'Type',
            'tagNames' => 'Tags',
        ];
    }

    /**
     * Gets query for [[MemoTags]].
     *
     * @return \yii\db\ActiveQuery|MemoTagQuery
     */
    public function getMemoTags()
    {
        return $this->hasMany(MemoTag::class, ['memo_id' => 'id']);
    }

    /**
     * Gets query for [[Tags]].
     *
     * @return \yii\db\ActiveQuery|TagQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->viaTable('memo_tag', ['memo_id' => 'id']);
    }

    /**
     * @return array
     */
    public function getTagNames()
    {
        return $this->getTags()->select('name')->column();
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery|TypeQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::class, ['id' => 'type_id']);
    }

    /**
     * {@inheritdoc}
     * @return MemoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MemoQuery(get_called_class());
    }

}
