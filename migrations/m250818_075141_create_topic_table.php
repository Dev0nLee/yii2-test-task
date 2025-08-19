<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%topic}}`.
 */
class m250818_075141_create_topic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%topic}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ]);
        $this->insert('{{%topic}}', [
            'title' => 'Тема 1',
        ]);
        $this->insert('{{%topic}}', [
            'title' => 'Тема 2',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%topic}}');
    }
}
