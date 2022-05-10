<?php

/* @var $this yii\web\View */
/* @var $model ityakutia\gallery\models\GalleryVideo */

$this->title = 'Редакторовать: ' . $model->title;
?>
<div class="gallery-video-update">
	<div class="row">
        <div class="col s12">
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
        </div>
    </div>
</div>
