<?php

namespace uraankhayayaal\gallery\widgets\slider;

use yii\base\Model;
use uraankhayayaal\gallery\assets\SliderAsset;

class WSlider extends \yii\base\Widget
{
    public $model;

    public function init()
    {
        parent::init();
        $view = $this->getView();
        SliderAsset::register($view);
    }

    public function run()
    {
        return $this->render('index', [
            'model' => $this->model,
        ]);   
    }
}
