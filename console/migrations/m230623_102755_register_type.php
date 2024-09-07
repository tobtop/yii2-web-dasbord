<?php

use yii\db\Migration;

/**
 * Class m230623_102755_register_type
 */
class m230623_102755_register_type extends Migration
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

        $this->createTable('{{%register_type}}', [
            'id' => $this->primaryKey(),
            'Name' => $this->string(200)->notNull(),
            'Email' => $this->string(200)->notNull(),
            'Contact' => $this->string(200)->notNull(),
            'Membership_Type' => "ENUM('General', 'Pro', 'Pro+')",
            
        ], $tableOptions);
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230623_102755_register_type cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230623_102755_register_type cannot be reverted.\n";

        return false;
    }
    */
}