<?php

namespace uraankhayayaal\gallery\models;

use Yii;

class GalleryAlboomPhoto extends \yii\db\ActiveRecord
{
    const RELATION_NAME = "galleryAlboomPhotos";
    const RELATION_ATTRIBUTE = "alboom_id";
    const FOR_MODEL_NAME = "\uraankhayayaal\gallery\models\GalleryAlboom";

    public static function tableName()
    {
        return 'gallery_alboom_photo';
    }

    public function rules()
    {
        return [
            [['alboom_id', 'photo_id'], 'required'],
            [['alboom_id', 'photo_id'], 'integer'],
            [['alboom_id'], 'exist', 'skipOnError' => true, 'targetClass' => GalleryAlboom::className(), 'targetAttribute' => ['alboom_id' => 'id']],
            [['photo_id'], 'exist', 'skipOnError' => true, 'targetClass' => GalleryPhoto::className(), 'targetAttribute' => ['photo_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alboom_id' => 'Фотоальбом',
            'photo_id' => 'Фотография',
        ];
    }

    public function getAlboom()
    {
        return $this->hasOne(GalleryAlboom::className(), ['id' => 'alboom_id']);
    }

    public function getPhoto()
    {
        return $this->hasOne(GalleryPhoto::className(), ['id' => 'photo_id']);
    }
}
