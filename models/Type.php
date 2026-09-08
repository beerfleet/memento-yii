<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type".
 *
 * @property int $id
 * @property string $name
 *
 * @property Memo[] $memos
 */
class Type extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type';
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
     * Gets query for [[Memos]].
     *
     * @return \yii\db\ActiveQuery|MemoQuery
     */
    public function getMemos()
    {
        return $this->hasMany(Memo::class, ['type_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TypeQuery(get_called_class());
    }

}
