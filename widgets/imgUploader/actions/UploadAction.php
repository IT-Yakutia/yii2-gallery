<?php

namespace uraankhayayaalgallery\widgets\imgUploader\actions;

use yii\base\Action;
use yii\web\BadRequestHttpException;
use yii\web\UploadedFile;
use Yii;

class UploadAction extends Action
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        if (Yii::$app->request->isPost) {
            $model = new \uraankhayayaal\gallery\widgets\imgUploader\forms\GalleryPhoto();
            $photoalbum = null;

            $model->files = UploadedFile::getInstances($model, 'files');
            $model->subject_id = Yii::$app->request->post('GalleryPhoto')['subject_id'];
            $model->subject_name = Yii::$app->request->post('GalleryPhoto')['subject_name'];

            $className = '\uraankhayayaal\gallery\models\\'.$model->subject_name;
            $galleryClass = $className::RELATION_NAME;
            $galleryAttribute = $className::RELATION_ATTRIBUTE;
            $galleryforModelName = $className::FOR_MODEL_NAME;
            $model->subject_attribute = $galleryAttribute;

            if($model->upload()){
                $photoalbum = $galleryforModelName::findOne($model->subject_id);
                $model = new \uraankhayayaal\gallery\widgets\imgUploader\forms\GalleryPhoto();
                $model->subject_id = $photoalbum->id;
            }

            return $this->controller->render('@uraankhayayaal/gallery/widgets/imgUploader/views/index', [
                'model' => $model,
                'modelRelationName' => $galleryClass,
                'gallerySubject' => $photoalbum,
            ]);
        } else {
            throw new BadRequestHttpException(Yii::t('cropper', 'ONLY_POST_REQUEST'));
        }
    }
}
