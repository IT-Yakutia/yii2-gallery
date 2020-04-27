<?php


namespace ityakutia\gallery\assets\slider;


use yii\web\AssetBundle;


class SliderAsset extends AssetBundle
{
    public $sourcePath = '@ityakutia/gallery/assets/album/src/';

    public $js = [
        'owl.carousel.js',
        'app.js',
    ];

    public $css = [
        'owl.carousel.css',
        'owl.theme.default.css',
        'animate.css',
    ];
    public $depends = [
        'frontend\themes\basic\assets\BasicAsset',
    ];
}