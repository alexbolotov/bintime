<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%address}}`.
 */
class m191015_123853_create_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%address}}', [
            'id' => $this->primaryKey(),
            'index' => $this->integer()->notNull(),
            'country' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'street' => $this->string()->notNull(),
            'house' => $this->string()->notNull(),
            'apartment' => $this->string(),
            'user_id' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%address}}');
    }
}
