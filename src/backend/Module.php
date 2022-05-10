<?php

namespace ityakutia\gallery\backend;

/**
 * gallery module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'ityakutia\gallery\backend\controllers';
    public $defaultRoute = 'back';
}
