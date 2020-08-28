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

```json
"it-yakutia/yii2-gallery": "*"
```

to the require section of your `composer.json` file.

Usage
-----
Once the extension is installed, simply add in your console config:

```php
'controllerMap' => [
    ...
    'migrate' => [
        ...
        'migrationPath' => [
            ...
            '@it-yakutia/gallery/src/migrations',
            ...
        ],
    ],
],
```

And just run the command:
```sh
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

```php
'custom_view_for_modules' => [
    'gallery_front' => [
        'view' => '@frontend/views/front_page/view',
    ],
],
```

Add fixtures:
```sh
php yii fixture GalleryPhoto --namespace='ityakutia\gallery\tests\fixtures' 
```
Add fixtures in docker:
```sh
php yii fixture GalleryPhoto --namespace='ityakutia\gallery\tests\fixtures' --interactive=0
```