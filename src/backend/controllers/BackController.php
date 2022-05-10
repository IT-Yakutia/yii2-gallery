<?php

namespace ityakutia\gallery\backend\controllers;


use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use ityakutia\gallery\models\GalleryPhoto;
use uraankhayayaal\materializecomponents\imgcropper\actions\UploadAction;
use ityakutia\gallery\widgets\imgUploader\actions\UploadAction as WidgetUploadAction;
use ityakutia\gallery\widgets\imgUploader\actions\DeleteAction;
use ityakutia\gallery\widgets\imgUploader\actions\EditAction;


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
                        'permissions' => ['gallery']
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
                'class' => WidgetUploadAction::class,
            ],
            'delete-photo' => [
                'class' => DeleteAction::class,
                'model_class' => GalleryPhoto::class,
            ],
            'edit-caption' => [
                'class' => EditAction::class,
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
