<?php
namespace uraankhayayaal\gallery\widgets\imgUploader;

use yii\base\Model;
use uraankhayayaal\gallery\widgets\imgUploader\forms\GalleryPhoto;

class WGalleryImgUploader extends \yii\base\Widget
{
    public $model;
    public $galleryClass;

    public function init()
    {
        parent::init();
        $view = $this->getView();
        WGalleryImgUploaderAsset::register($view);
    }

    public function run()
    {
        $className = $this->galleryClass;
        $relationName = $className::RELATION_NAME;

        $model = new GalleryPhoto();
        $model->subject_id = $this->model->id;
        $model->subject_name = \yii\helpers\StringHelper::basename($this->galleryClass);
        $model->subject_attribute = $className::RELATION_ATTRIBUTE;
           
        return $this->render('index', [
            'model' => $model,
            'modelRelationName' => $relationName,
            'gallerySubject' => $this->model,
        ]);   
    }
}
