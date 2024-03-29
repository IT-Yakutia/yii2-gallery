<?php

namespace ityakutia\gallery\widgets\imgUploader\actions;

use yii\base\Action;
use yii\web\BadRequestHttpException;
use yii\web\UploadedFile;
use Yii;
use ityakutia\gallery\widgets\imgUploader\forms\GalleryPhoto;

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
            $model = new GalleryPhoto();
            $photoalbum = null;

            $model->files = UploadedFile::getInstances($model, 'files');
            $model->subject_id = Yii::$app->request->post('GalleryPhoto')['subject_id'];
            $model->subject_name = Yii::$app->request->post('GalleryPhoto')['subject_name'];

            $className = 'ityakutia\gallery\models\\'.$model->subject_name;
            $galleryClass = $className::RELATION_NAME;
            $galleryAttribute = $className::RELATION_ATTRIBUTE;
            $galleryforModelName = $className::FOR_MODEL_NAME;
            $model->subject_attribute = $galleryAttribute;

            if($model->upload()){
                $photoalbum = $galleryforModelName::findOne($model->subject_id);
                $model = new GalleryPhoto();
                $model->subject_id = $photoalbum->id;
                $model->subject_name = \yii\helpers\StringHelper::basename($className);
                $model->subject_attribute = $className::RELATION_ATTRIBUTE;
            }

            return $this->controller->render('@ityakutia/gallery/widgets/imgUploader/views/index', [
                'model' => $model,
                'modelRelationName' => $galleryClass,
                'gallerySubject' => $photoalbum,
            ]);

        } else {
            throw new BadRequestHttpException(Yii::t('cropper', 'ONLY_POST_REQUEST'));
        }
    }
}
