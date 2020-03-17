<?php

use yii\db\Migration;

/**
 * Class m181022_002057_gallery_init
 */
class m181022_002057_gallery_init extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('gallery_photo', [
            'id' => $this->primaryKey(),
            'src' => $this->string()->notNull(),
            'original' => $this->string(),
            'name' => $this->string(),
            'description' => $this->text(),
            'w' => $this->integer(),
            'h' => $this->integer(),

            'is_publish' => $this->boolean(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {   
        $this->dropTable('gallery_photo');
    }
}
