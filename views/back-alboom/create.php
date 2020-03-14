<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\gallery\models\GalleryAlboom */

$this->title = 'Новая фотогалерея';
// $this->params['breadcrumbs'][] = ['label' => 'Gallery Albooms', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-alboom-create">
    <div class="row">
        <div class="col s12">
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
        </div>
    </div>
</div>
