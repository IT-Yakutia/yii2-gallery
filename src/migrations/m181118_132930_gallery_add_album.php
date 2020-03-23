<?php

use yii\db\Migration;

/**
 * Class m181118_132930_gallery_add_album
 */
class m181118_132930_gallery_add_album extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('gallery_album', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'photo' => $this->string(),

            'is_publish' => $this->boolean(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('gallery_album_photo', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer()->notNull(),
            'photo_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('gallery_album_photo-gallery_photo-fkey','gallery_album_photo','photo_id','gallery_photo','id','CASCADE','CASCADE');
        $this->createIndex('gallery_album_photo-gallery_photo-idx','gallery_album_photo','photo_id');

        $this->addForeignKey('gallery_album_photo-gallery_album-fkey','gallery_album_photo','album_id','gallery_album','id','CASCADE','CASCADE');
        $this->createIndex('gallery_album_photo-gallery_album-idx','gallery_album_photo','album_id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('gallery_album_photo-gallery_album-fkey','gallery_album_photo');
        $this->dropIndex('gallery_album_photo-gallery_album-idx','gallery_album_photo');

        $this->dropForeignKey('gallery_album_photo-gallery_photo-fkey','gallery_album_photo');
        $this->dropIndex('gallery_album_photo-gallery_photo-idx','gallery_album_photo');

        $this->dropTable('gallery_album_photo');

        $this->dropTable('gallery_album');
    }
}
