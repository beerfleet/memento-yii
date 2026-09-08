<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%type}}`.
 */
class m260907_130216_create_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()->unique(),
        ]);

        $this->addCommentOnTable('{{%type}}','Memo type. It\'s a category. A memo belongs to one category.');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%type}}');
    }
}
