<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%undertopic}}`.
 */
class m250818_075536_create_undertopic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%undertopic}}', [
            'id' => $this->primaryKey(),
            'topic_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'content' => $this->string()->notNull(),
        ]);
        $this->createIndex(
            'idx-undertopic-topic_id',
            'undertopic',
            'topic_id'
           );
        $this->addForeignKey(
            'fk-undertopic-topic_id',
            'undertopic',
            'topic_id',
            'topic',
            'id',
            'CASCADE'
        );
        $this->insert('{{%undertopic}}', [
            'topic_id' => 1,
            'title' => 'Подтема 1.1',
            'content' => 'Некий текст, привязанный к Подтеме 1.1',
        ]);
        $this->insert('{{%undertopic}}', [
            'topic_id' => 1,
            'title' => 'Подтема 1.2',
            'content' => 'Некий текст, привязанный к Подтеме 1.2',
        ]);
        $this->insert('{{%undertopic}}', [
            'topic_id' => 1,
            'title' => 'Подтема 1.3',
            'content' => 'Некий текст, привязанный к Подтеме 1.3',
        ]);
        $this->insert('{{%undertopic}}', [
            'topic_id' => 2,
            'title' => 'Подтема 2.1',
            'content' => 'Некий текст, привязанный к Подтеме 2.1',
        ]);
        $this->insert('{{%undertopic}}', [
            'topic_id' => 2,
            'title' => 'Подтема 2.2',
            'content' => 'Некий текст, привязанный к Подтеме 2.2',
        ]);
        $this->insert('{{%undertopic}}', [
            'topic_id' => 2,
            'title' => 'Подтема 2.3',
            'content' => 'Некий текст, привязанный к Подтеме 2.3',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%undertopic}}');
    }
}
