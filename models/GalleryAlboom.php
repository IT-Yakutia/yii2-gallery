<?php

namespace uraankhayayaal\gallery\models;

use Yii;
use yii\behaviors\TimestampBehavior;

class GalleryAlboom extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'gallery_alboom';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
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
    
    public function getGalleryAlboomPhotos()
    {
        return $this->hasMany(GalleryAlboomPhoto::className(), ['alboom_id' => 'id']);
    }
}
