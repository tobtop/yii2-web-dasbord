<?php

use yii\db\Migration;

/**
 * Class m230623_132827_invorice
 */
class m230623_132827_invorice extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%invoice}}', [
            'id' => $this->primaryKey(),
            'product' => $this->string(200)->notNull(),
            'Serial' => $this->string(200)->notNull(),
            'Description' => $this->string(200)->notNull(),
            'price' => $this->float()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230623_132827_invorice cannot be reverted.\n";

        return false;
    }
}