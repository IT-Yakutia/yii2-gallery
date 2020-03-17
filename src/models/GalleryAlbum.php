<?php

namespace ityakutia\gallery\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;


class GalleryAlbum extends ActiveRecord
{
    public static function tableName(): string 
    {
        return 'gallery_Album';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules(): array 
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['is_publish', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'photo'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels(): array 
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
    
    public function getGalleryAlbumPhotos(): ActiveQuery
    {
        return $this->hasMany(GalleryAlbumPhoto::class, ['Album_id' => 'id']);
    }
}
