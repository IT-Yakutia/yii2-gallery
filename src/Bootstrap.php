<?php


namespace ityakutia\gallery;


use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->setModule('gallery', 'ityakutia\gallery\Module');
    }
}