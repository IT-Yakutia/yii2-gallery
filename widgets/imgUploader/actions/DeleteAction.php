<?php

namespace uraankhayayaal\gallery\widgets\imgUploader\actions;

use yii\base\Action;
use yii\web\BadRequestHttpException;
use yii\web\ServerErrorHttpException;
use Yii;

class DeleteAction extends Action
{
    public $model_class;
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if($this->model_class === null) 
            throw new BadRequestHttpException(Yii::t('Delete Photo Action', 'model_class required'));
    }

    /**
     * @inheritdoc
     */
    public function run($id)
    {
        $_class = $this->model_class;
        $model = $_class::findOne($id);
        $message = "";
        $nameOfDeletedModel = $model->name;

        if ($model->delete() === false) {
            $message = 'Ой, ошибка в введенных данных, попробуйте перезагрузить страницу';
            throw new ServerErrorHttpException('Failed to delete the object for unknown reason.');
        }else{
            $message = 'Запись успешно удален: ' . $nameOfDeletedModel;
        }

        if (Yii::$app->request->isAjax){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['success' =>true, 'toast' => $message];
        }
        else
            return $this->refresh();//return $this->controller->redirect(['update', 'id' => $kindergarten_id]);
    }
}
