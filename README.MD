Gallery module for Yii2
====================
Gallery module for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run
```sh
php composer.phar require --prefer-dist it-yakutia/yii2-gallery "*"
```
or add
```json lines
"it-yakutia/yii2-gallery": "*"
```
to the require section of your `composer.json` file.

Add Module in backend config `main.php`:
```php
return [
    ...
    'modules' => [
        ...
        'gallery' => \ityakutia\gallery\backend\Module::class,
        ...
    ],
    ...
];
```

Add Module in frontend config `main.php`:
```php
return [
    ...
    'modules' => [
        ...
        'gallery' => \ityakutia\gallery\frontend\Module::class,
        ...
    ],
    ...
];
```

In console config `main.php` add `migrationPath` value in `controllerMap` `migration` section:
```php
return [
    ...
    'controllerMap' => [
        ...
	    'migrate' => [
		    'class' => \yii\console\controllers\MigrateController::class,
		    'migrationPath' => [
				'@console/migrations',
				...
			    '@ityakutia/gallery/migrations',
			    ...
		    ],
	    ],
    ],
```
And just run the command:
```sh
php yii migrate
```

Add in common `main.php`:
```php
return [
    ...
    'domain' => 'https://yourdomain.example',
    ...
];
```

Add urls in your backend project:
```php
Url::toRoute('/gallery/back/index');
```

Usage
-----

For customizing front view add to frontend `params.php`:
```php
return [
    ...
    'custom_view_for_modules' => [
        'gallery' => [
            'index' => '@frontend/views/gallery/index', 
            'view' => '@frontend/views/gallery/view',
        ],
    ],
    ...
];
```

Fixtures
--------

Add fixtures:
```sh
php yii fixture GalleryPhoto --namespace='ityakutia\gallery\tests\fixtures' 
```
Add fixtures in docker:
```sh
php yii fixture GalleryPhoto --namespace='ityakutia\gallery\tests\fixtures' --interactive=0
```