<?php

/* @var $this yii\web\View */
/* @var $model gallery\models\GalleryAlbum */

$this->title = 'Редакторовать: ' . $model->title;
?>
<div class="gallery-album-update">
    <div class="row">
        <div class="col s12">
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
        </div>
    </div>
</div>
