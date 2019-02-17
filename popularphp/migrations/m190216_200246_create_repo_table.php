<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%repo}}`.
 */
class m190216_200246_create_repo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%repo}}', [
            'id' => $this->primaryKey(),
            'repo_id' => $this->integer()->notNull()->unique(),
            'name' => $this->string()->notNull(),
            'url' => $this->string()->notNull(),
            'created_date' => $this->dateTime()->notNull(),
            'last_push_date' => $this->dateTime()->notNull(),
            'description' => $this->text(),
            'star_count' => $this->integer()->notNull()->defaultValue(0)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%repo}}');
    }
}
