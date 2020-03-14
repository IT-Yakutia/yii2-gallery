<?php

namespace uraankhayayaal\gallery\widgets\imgUploader\actions;

use yii\base\Action;
use yii\web\BadRequestHttpException;
use yii\web\ServerErrorHttpException;
use Yii;

class EditAction extends Action
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
        $message = '';

        if (Yii::$app->request->post('kindergartenPhotoTitle') !== null) {
            $model->name = Yii::$app->request->post('kindergartenPhotoTitle');
            $model->description = Yii::$app->request->post('kindergartenPhotoDescription');
            if($success = $model->save())
                $message = 'Запись успешно изменена!';
            else
                $message = 'Ой, ошибка в введенных данных, может текст слишком длинный';
        }

        if (Yii::$app->request->isAjax){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['success' => $success, 'toast' => $message];
        }
        else
            return $this->refresh();
    }
}
