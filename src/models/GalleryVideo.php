<?php

namespace ityakutia\gallery\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;


class GalleryVideo extends ActiveRecord
{
    public static function tableName()
    {
        return 'gallery_video';
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
            [['title', 'src'], 'required'],
            [['description'], 'string'],
            [['is_publish', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'src'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'src' => 'Код из youtube',
            'is_publish' => 'Опубликовать',
            'status' => 'Статус',
            'created_at' => 'Создан',
            'updated_at' => 'Изменен',
        ];
    }
}
