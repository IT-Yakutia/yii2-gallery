<?php

namespace uraankhayayaal\gallery\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * Default controller for the `gallery` module
 */
class BackController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['gallery']
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
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
                'class' => 'uraankhayayaal\gallery\widgets\imgUploader\actions\UploadAction',
            ],
            'delete-photo' => [
                'class' => 'uraankhayayaal\gallery\widgets\imgUploader\actions\DeleteAction',
                'model_class' => '\uraankhayayaal\gallery\models\GalleryPhoto',
            ],
            'edit-caption' => [
                'class' => 'uraankhayayaal\gallery\widgets\imgUploader\actions\EditAction',
                'model_class' => '\uraankhayayaal\gallery\models\GalleryPhoto',
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
