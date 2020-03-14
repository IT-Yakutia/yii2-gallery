<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\gallery\models\GalleryVideo */

$this->title = 'Новое видео';
// $this->params['breadcrumbs'][] = ['label' => 'Gallery Videos', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
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
