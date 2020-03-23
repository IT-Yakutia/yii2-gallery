<?php

namespace ityakutia\gallery\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;


class GalleryAlbum extends ActiveRecord
{
    public static function tableName()
    {
        return 'gallery_album';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['is_publish', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'photo'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'photo' => 'Фото',
            'is_publish' => 'Опубликовать',
            'status' => 'Статус',
            'created_at' => 'Создан',
            'updated_at' => 'Изменен',
        ];
    }
    
    public function getGalleryAlbumPhotos()
    {
        return $this->hasMany(GalleryAlbumPhoto::class, ['Album_id' => 'id']);
    }
}
