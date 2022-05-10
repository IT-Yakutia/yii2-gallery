<?php

use yii\db\Migration;

/**
 * Class m200819_050112_add_page_block_gallery
 */
class m200819_050112_add_page_block_gallery extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('gallery_page_block', [
            'id' => $this->primaryKey(),
            'block_id' => $this->integer()->notNull(),
            'photo_id' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('gallery_page_block');
    }
}
