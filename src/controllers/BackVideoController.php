<?php


namespace ityakutia\gallery\controllers;


use Yii;
use ityakutia\gallery\models\GalleryVideo;
use ityakutia\gallery\models\GalleryVideoSearch;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class BackVideoController extends Controller
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

    /**
     * Lists all GalleryVideo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GalleryVideoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GalleryVideo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GalleryVideo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GalleryVideo();
        return $this->saveModel($model, 'create', 'Запись успешно создана!');
    }

    /**
     * Updates an existing GalleryVideo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        return $this->saveModel($model, 'update', 'Запись успешно изменена!');
    }

    private function saveModel($model, $view, $message)
    {
        $post = Yii::$app->request->post();
        $load = $model->load($post);

        if ($load && $model->save()) {
            Yii::$app->session->setFlash('success', $message);
            return $this->redirect(['index']);
        }

        return $this->render($view, [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GalleryVideo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id)
    {
        if($this->findModel($id)->delete() !== false)
            Yii::$app->session->setFlash('success', 'Запись успешно удалена!');

        return $this->redirect(['index']);
    }

    /**
     * Finds the GalleryVideo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GalleryVideo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): GalleryVideo
    {
        if (($model = GalleryVideo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
