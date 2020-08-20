<?php


namespace ityakutia\gallery\models;

use uraankhayayaal\page\models\PageBlock;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
// use ityakutia\blog\models\Article;

/**
 * This is the model class for table "gallery_page_block".
 *
 * @property int $id
 * @property int $block_id
 * @property int $photo_id
 *
 * @property PageBlock $page_block
 * @property GalleryPhoto $photo
 */
class GalleryPageBlock extends ActiveRecord
{
    public const RELATION_NAME = "galleryPageBlocks";
    public const RELATION_ATTRIBUTE = "block_id";
    public const FOR_MODEL_NAME = PageBlock::class;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery_page_block';
    }

    public function rules()
    {
        return [
            [['block_id', 'photo_id'], 'required'],
            [['block_id', 'photo_id'], 'integer'],
            [['photo_id'], 'exist', 'skipOnError' => true, 'targetClass' => GalleryPhoto::class, 'targetAttribute' => ['photo_id' => 'id']],
            [['block_id'], 'exist', 'skipOnError' => true, 'targetClass' => PageBlock::class, 'targetAttribute' => ['block_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'block_id' => 'Блок страницы',
            'photo_id' => 'Фотографии',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getPageBlock()
    {
        return $this->hasOne(PageBlock::class, ['id' => 'block_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getPhoto()
    {
        return $this->hasOne(GalleryPhoto::class, ['id' => 'photo_id']);
    }
}
