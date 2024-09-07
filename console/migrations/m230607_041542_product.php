<?php

use yii\db\Migration;

/**
 * Class m230607_041542_product
 */
class m230607_041542_product extends Migration
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

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->notNull(),
            'detail' => $this->text()->notNull(),
            'price' => $this->float()->notNull(),
            'type' => "ENUM('food','book','player','other')",
            'img_path' => $this->string(200)->notNull()->defaultValue('images/pic1.png'), 
            
        
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230607_041542_product cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230607_041542_product cannot be reverted.\n";

        return false;
    }
    */
}
