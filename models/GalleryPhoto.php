<?php

namespace gallery\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;


class GalleryPhoto extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'gallery_photo';
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules(): array
    {
        return [
            [['src'], 'required'],
            [['description'], 'string'],
            [['w', 'h', 'is_publish', 'status', 'created_at', 'updated_at'], 'integer'],
            [['src', 'original', 'name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'src' => 'Фото preview',
            'original' => 'Фото original',
            'name' => 'Название',
            'description' => 'Описание',
            'w' => 'Ширина',
            'h' => 'Высота',
            'is_publish' => 'Опубликовать',
            'status' => 'Статус',
            'created_at' => 'Создан',
            'updated_at' => 'Изменен',
        ];
    }

    public function getGalleryAlbumPhotos(): ActiveQuery
    {
        return $this->hasMany(GalleryAlbumPhoto::class, ['photo_id' => 'id']);
    }
}
