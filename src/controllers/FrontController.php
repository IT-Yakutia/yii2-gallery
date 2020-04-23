<?php

namespace ityakutia\gallery\controllers;

use Yii;
use ityakutia\gallery\models\GalleryAlbum;
use ityakutia\gallery\models\GalleryAlbumSearch;
use ityakutia\gallery\models\GalleryVideo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class FrontController extends Controller
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
