<?php

use yii\db\Migration;

/**
 * Class m230616_162855_courses
 */
class m230616_162855_courses extends Migration
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

        $this->createTable('{{%course}}', [
            'id' => $this->primaryKey(),
            'Course_Name' => $this->string(200)->notNull(),
            'Description' => $this->string(200)->notNull(),
            'price' => $this->float()->notNull(),
            'Duration' => $this->string()->notNull(),
            'img_path' => $this->string(200)->notNull()->defaultValue('images/OIP.jpg'),
            'Contact' => $this->string(200)->notNull(),
            'Lessons' => $this->integer()->notNull(),
            'Course_Type' => "ENUM('Online','Self-paced','In-person','other')",
            'comment' => $this->string(200)->notNull(),
            'Professor' => $this->string(100)->notNull(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%course}}');
    }
}
