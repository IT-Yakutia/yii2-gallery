<?php

namespace ityakutia\gallery\tests\fixtures;

use ityakutia\gallery\models\GalleryPhoto;
use yii\test\ActiveFixture;

class GalleryPhotoFixture extends ActiveFixture
{
    public $modelClass = GalleryPhoto::class;
    public $dataFile = '@ityakutia/gallery/tests/_data/gallery-photo.php';
}
