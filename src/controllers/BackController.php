<?php

namespace ityakutia\gallery\controllers;


use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use ityakutia\gallery\models\GalleryPhoto;
use uraankhayayaal\materializecomponents\imgcropper\actions\UploadAction;


class BackController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['gallery']
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

	public function actions()
    {
        return [
            'upload' => [
                'class' => 'gallery\widgets\imgUploader\actions\UploadAction',
            ],
            'delete-photo' => [
                'class' => 'gallery\widgets\imgUploader\actions\DeleteAction',
                'model_class' => GalleryPhoto::class,
            ],
            'edit-caption' => [
                'class' => 'gallery\widgets\imgUploader\actions\EditAction',
                'model_class' => GalleryPhoto::class,
            ],
            'uploadImg' => [
                'class' => UploadAction::class,
                'url' => '/images/uploads/gallery/',
                'path' => '@frontend/web/images/uploads/gallery/',
                'maxSize' => 10485760,
            ],
        ];
    }
}
