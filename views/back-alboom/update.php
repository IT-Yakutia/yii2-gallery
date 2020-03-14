<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\gallery\models\GalleryAlboom */

$this->title = 'Редакторовать: ' . $model->title;
// $this->params['breadcrumbs'][] = ['label' => 'Gallery Albooms', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="gallery-alboom-update">
    <div class="row">
        <div class="col s12">
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
        </div>
    </div>
</div>
