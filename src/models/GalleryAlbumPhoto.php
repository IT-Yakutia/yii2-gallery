<?php

namespace ityakutia\gallery\models;


use yii\db\ActiveQuery;
use yii\db\ActiveRecord;


class GalleryAlbumPhoto extends ActiveRecord
{
    const RELATION_NAME = "galleryAlbumPhotos";
    const RELATION_ATTRIBUTE = "album_id";
    const FOR_MODEL_NAME = GalleryAlbum::class;

    public static function tableName()
    {
        return 'gallery_album_photo';
    }

    public function rules()
    {
        return [
            [['album_id', 'photo_id'], 'required'],
            [['album_id', 'photo_id'], 'integer'],
            [['album_id'], 'exist', 'skipOnError' => true, 'targetClass' => GalleryAlbum::class, 'targetAttribute' => ['album_id' => 'id']],
            [['photo_id'], 'exist', 'skipOnError' => true, 'targetClass' => GalleryPhoto::class, 'targetAttribute' => ['photo_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'album_id' => 'Фотоальбом',
            'photo_id' => 'Фотография',
        ];
    }

    public function getAlbum(): ActiveQuery
    {
        return $this->hasOne(GalleryAlbum::class, ['id' => 'album_id']);
    }

    public function getPhoto(): ActiveQuery
    {
        return $this->hasOne(GalleryPhoto::class, ['id' => 'photo_id']);
    }
}
