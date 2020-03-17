<?php


namespace ityakutia\gallery\models;


use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use ityakutia\blog\models\Article;

/**
 * This is the model class for table "gallery_article".
 *
 * @property int $id
 * @property int $article_id
 * @property int $photo_id
 *
 * @property Article $article
 * @property GalleryPhoto $photo
 */
class GalleryArticle extends ActiveRecord
{
    public const RELATION_NAME = "galleryArticles";
    public const RELATION_ATTRIBUTE = "article_id";
    public const FOR_MODEL_NAME = Article::class;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery_article';
    }

    public function rules()
    {
        return [
            [['article_id', 'photo_id'], 'required'],
            [['article_id', 'photo_id'], 'integer'],
            [['photo_id'], 'exist', 'skipOnError' => true, 'targetClass' => GalleryPhoto::class, 'targetAttribute' => ['photo_id' => 'id']],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::class, 'targetAttribute' => ['article_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Новость',
            'photo_id' => 'Фотографии',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getArticle(): ActiveQuery
    {
        return $this->hasOne(Article::class, ['id' => 'article_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getPhoto(): ActiveQuery
    {
        return $this->hasOne(GalleryPhoto::class, ['id' => 'photo_id']);
    }
}
