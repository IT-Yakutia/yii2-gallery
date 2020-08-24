Gallery module for Yii2
====================
Gallery module for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist it-yakutia/yii2-gallery "*"
```

or add

```
"it-yakutia/yii2-gallery": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply add in your console config:

```php
'controllerMap' => [
    /* ... */
    'migrate' => [
            // 'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => [
                // '@console/migrations', // yii migrate/create app_init
                // '@yii/rbac/migrations',
                /* ... */
                '@it-yakutia/gallery/migrations', // yii migrate/create add_some_table --migrationPath=@it-yakutia/gallery/migrations
            ],
    ],
],
```

And just run the command:
```
php yii migrate
```

Set in common config params:

```php
return [
    /* ... */
    'domain' => 'https://yourdomain.example',
];
```

Add urls in your backend project:

```php
Url::toRoute('/gallery/back/index');
```

Add RBAC roles:

```
blog
```

Custom view file:

```
'custom_view_for_modules' => [
    'gallery_front' => [
        'view' => '@frontend/views/front_page/view',
    ],
],
```

RUN Fixtures
```
php yii fixture GalleryPhoto --namespace='ityakutia\gallery\tests\fixtures' 
```
Docker version:
```
php yii fixture GalleryPhoto --namespace='ityakutia\gallery\tests\fixtures' --interactive=0
```