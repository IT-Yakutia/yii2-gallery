<?php


namespace ityakutia\gallery\assets\album;


use yii\web\AssetBundle;


class AlbumAsset extends AssetBundle
{
    public $sourcePath = '@ityakutia/gallery/assets/album/src/';

    public $css = [
        'css/progressive-image.min.css',
    ];
    public $js = [
        'js/progressive-image.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
