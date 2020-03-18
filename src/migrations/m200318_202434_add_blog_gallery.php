<?php

use yii\db\Migration;

/**
 * Class m200318_202434_add_blog_gallery
 */
class m200318_202434_add_blog_gallery extends Migration
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

        $this->createTable('gallery_article', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'photo_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('gallery_article-gallery_photo-fkey','gallery_article','photo_id','gallery_photo','id','CASCADE','CASCADE');
        $this->createIndex('gallery_article-gallery_photo-idx','gallery_article','photo_id');

        $this->addForeignKey('gallery_article-article-fkey','gallery_article','article_id','article','id','CASCADE','CASCADE');
        $this->createIndex('gallery_article-article-idx','gallery_article','article_id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('gallery_article-article-fkey','gallery_article');
        $this->dropIndex('gallery_article-article-idx','gallery_article');

        $this->dropForeignKey('gallery_article-gallery_photo-fkey','gallery_article');
        $this->dropIndex('gallery_article-gallery_photo-idx','gallery_article');

        $this->dropTable('gallery_article');

    }
}
