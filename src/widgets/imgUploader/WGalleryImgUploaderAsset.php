<?php

namespace ityakutia\gallery\widgets\imgUploader;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class WGalleryImgUploaderAsset extends AssetBundle
{
    public $sourcePath = '@ityakutia/gallery/widgets/imgUploader/src/';

    public $css = [
        'progressive-image.css'
    ];
    public $js = [
        'run.js',
        'progressive-image.js'
    ];
    public $depends = [
        '\backend\assets\AppAsset',
    ];
}
