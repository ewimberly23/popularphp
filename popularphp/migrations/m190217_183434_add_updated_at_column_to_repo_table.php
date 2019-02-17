<?php

use yii\db\Migration;

/**
 * Handles adding updated_at to table `{{%repo}}`.
 */
class m190217_183434_add_updated_at_column_to_repo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            '{{%repo}}',
            'updated_at',
            $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%repo}}', 'updated_at');
    }
}
