<?php

namespace uraankhayayaal\gallery\assets\about;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AboutAsset extends AssetBundle
{
    public $sourcePath = '@uraankhayayaal/gallery/assets/about/src/';
    
    public $css = [
        'css/about.css',
        'css/about_responsive.css',
    ];
    public $js = [
        'js/TweenMax.min.js',
        'js/TimelineMax.min.js',
        'js/animation.gsap.min.js',
        'js/ScrollToPlugin.min.js',
        'js/about.js',
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}
