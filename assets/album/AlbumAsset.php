<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AlbumAsset extends AssetBundle
{
    public $sourcePath = '@uraankhayayaal/gallery/assets/album/src/';

    public $css = [
        'css/progressive-image.min.css',
    ];
    public $js = [
        'js/progressive-image.min.js',
    ];
    public $depends = [
        '\frontend\assets\AppAsset',
    ];
}
