<?php

/* @var $this yii\web\View */
/* @var $model ityakutia\gallery\models\GalleryAlbum */

$this->title = 'Новая фотогалерея';
?>
<div class="gallery-album-create">
    <div class="row">
        <div class="col s12">
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
        </div>
    </div>
</div>
