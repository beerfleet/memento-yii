<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tag}}`.
 */
class m260907_125746_create_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tag}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()->unique(),
        ]);

        $this->addCommentOnTable('{{%tag}}','Memo tag. a memo can have multiple tags. A tag can be shared by several memos.');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tag}}');
    }
}
