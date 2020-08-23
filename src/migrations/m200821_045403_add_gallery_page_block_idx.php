<?php

use yii\db\Migration;

/**
 * Class m200821_045403_add_gallery_page_block_idx
 */
class m200821_045403_add_gallery_page_block_idx extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('gallery_page_block-gallery_photo-fkey','gallery_page_block','photo_id','gallery_photo','id','CASCADE','CASCADE');
        $this->createIndex('gallery_page_block-gallery_photo-idx','gallery_page_block','photo_id');

        $this->addForeignKey('gallery_page_block-page_block-fkey','gallery_page_block','block_id','page_block','id','CASCADE','CASCADE');
        $this->createIndex('gallery_page_block-page_block-idx','gallery_page_block','block_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('gallery_page_block-page_block-fkey','gallery_page_block');
        $this->dropIndex('gallery_page_block-page_block-idx','gallery_page_block');

        $this->dropForeignKey('gallery_page_block-gallery_photo-fkey','gallery_page_block');
        $this->dropIndex('gallery_page_block-gallery_photo-idx','gallery_page_block');
    }
}
