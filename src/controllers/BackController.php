<?php

namespace ityakutia\gallery\controllers;


use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use ityakutia\gallery\models\GalleryPhoto;


class BackController extends Controller
{
    public function behaviors(): array
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
                'class' => 'backend\widgets\imgcropper\actions\UploadAction',
                'url' => '/images/uploads/gallery/',
                'path' => '@frontend/web/images/uploads/gallery/',
                'maxSize' => 10485760,
            ],
        ];
    }
}
