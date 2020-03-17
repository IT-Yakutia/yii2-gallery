<?php


namespace ityakutia\gallery;


use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        $app->setModule('blog', 'ityakutia\gallery\Module');
    }
}