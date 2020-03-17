<?php

/* @var $this yii\web\View */
/* @var $model gallery\models\GalleryVideo */

$this->title = 'Новое видео';
?>
<div class="gallery-video-create">
	<div class="row">
        <div class="col s12">
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
        </div>
    </div>
</div>
