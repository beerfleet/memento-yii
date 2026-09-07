<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%memo_tag}}`.
 */
class m260907_132047_create_memo_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%memo_tag}}', [
            'id' => $this->primaryKey(),
            'memo_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'FK_memo_tag_memo',
            '{{%memo_tag}}',
            'memo_id',
            '{{%memo}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'FK_memo_tag_tag',
            '{{%memo_tag}}',
            'tag_id',
            '{{%tag}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(
            'memo_id_tag_id',
            '{{%memo_tag}}',
            ['memo_id', 'tag_id'],
            true,
        );
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%memo_tag}}');
    }
}
