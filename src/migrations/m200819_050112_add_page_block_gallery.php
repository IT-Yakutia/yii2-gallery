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

        $this->addForeignKey('gallery_page_block-gallery_photo-fkey','gallery_page_block','photo_id','gallery_photo','id','CASCADE','CASCADE');
        $this->createIndex('gallery_page_block-gallery_photo-idx','gallery_page_block','photo_id');

        $this->addForeignKey('gallery_page_block-page_block-fkey','gallery_page_block','block_id','page_block','id','CASCADE','CASCADE');
        $this->createIndex('gallery_page_block-page_block-idx','gallery_page_block','block_id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('gallery_page_block-page_block-fkey','gallery_page_block');
        $this->dropIndex('gallery_page_block-page_block-idx','gallery_page_block');

        $this->dropForeignKey('gallery_page_block-gallery_photo-fkey','gallery_page_block');
        $this->dropIndex('gallery_page_block-gallery_photo-idx','gallery_page_block');

        $this->dropTable('gallery_page_block');
    }
}
