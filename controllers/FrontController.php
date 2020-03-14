<?php

namespace uraankhayayaal\gallery\controllers;

use Yii;
use uraankhayayaal\gallery\models\GalleryAlboom;
use uraankhayayaal\gallery\models\GalleryAlboomSearch;
use uraankhayayaal\gallery\models\GalleryAlboomPhoto;
use uraankhayayaal\gallery\models\GalleryVideo;
use uraankhayayaal\gallery\models\GalleryVideoSearch;
// use yii\filters\VerbFilter;
// use yii\filters\AccessControl;

/**
 * Back controller
 */
class FrontController extends \frontend\components\Controller
{
    public function beforeAction($action)
    {
        Yii::$app->view->params['module_name'] = 'Фотогалереи';
        return parent::beforeAction($action);
    }

    public function actionIndex($filter_category_id = null)
    {
        $searchModel = new GalleryAlboomSearch();
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
        if (($model = GalleryAlboom::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
