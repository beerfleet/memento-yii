<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%memo}}`.
 */
class m260907_130934_create_memo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%memo}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()->unique(),
            'description' => $this->text()->notNull(),
            'type_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'FK_memo_type',
            '{{%memo}}',
            'type_id',
            '{{%type}}',
            'id',
            'NO ACTION',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%memo}}');
    }
}
