<?php

namespace gallery\controllers;

use Yii;
use gallery\models\GalleryAlbum;
use gallery\models\GalleryAlbumSearch;
use gallery\models\GalleryAlbumPhoto;
use gallery\models\GalleryVideo;
use gallery\models\GalleryVideoSearch;
use yii\web\NotFoundHttpException;


class FrontController extends \frontend\components\Controller
{
    public function beforeAction($action)
    {
        Yii::$app->view->params['module_name'] = 'Фотогалереи';
        return parent::beforeAction($action);
    }

    public function actionIndex($filter_category_id = null)
    {
        $searchModel = new GalleryAlbumSearch();
        $dataProvider = $searchModel->searchFront(Yii::$app->request->queryParams);

        $videos = GalleryVideo::find()->where(['is_publish' => true])->orderBy(['created_at' => SORT_DESC])->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'videos' => $videos,
        ]);
    }

    public function actionView($id)
    {
    	$model = $this->findModel($id);
        
        return $this->render('view', [
        	'model' => $model,
    	]);
    }


    protected function findModel($id)
    {
        if (($model = GalleryAlbum::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
