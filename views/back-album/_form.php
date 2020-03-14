<?php

use gallery\models\GalleryAlbumPhoto;
use uraankhayayaal\gallery\widgets\imgUploader\WGalleryImgUploader;
use uraankhayayaal\materializecomponents\checkbox\WCheckbox;
use uraankhayayaal\materializecomponents\imgcropper\Cropper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model gallery\models\GalleryAlbum */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-album-form">

    <p></p>
    <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#article_tab_main">Основное</a></li>
        <li class="tab col s3 <?= $model->isNewRecord ? 'disabled' : ''; ?>"><a href="#article_tab_gallery" class="<?= $model->isNewRecord ? 'tooltipped' : ''; ?>" data-position="bottom" data-tooltip="Вкладка будет доступна после сохранения Новости">Фотогалерея</a></li>
    </ul>

    <div id="article_tab_main">
    <?php $form = ActiveForm::begin([
            'errorCssClass' => 'red-text',
        ]); ?>

    <?= WCheckbox::widget(['model' => $model, 'attribute' => 'is_publish']); ?>
            
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6, 'class' => 'materialize-textarea']) ?>

    <?= $form->field($model, 'photo')->widget(Cropper::class, [
        'aspectRatio' => 754/754,
        'maxSize' => [754, 754, 'px'],
        'minSize' => [150, 150, 'px'],
        'startSize' => [100, 100, '%'],
        'uploadUrl' => Url::to(['/gallery/back/uploadImg']),
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <div class="fixed-action-btn">
        <?= Html::submitButton('<i class="material-icons">save</i>', [
            'class' => 'btn-floating btn-large waves-effect waves-light tooltipped',
            'title' => 'Сохранить',
            'data-position' => 'left',
            'data-tooltip' => 'Сохранить',
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>

    <div id="article_tab_gallery">
        <?= WGalleryImgUploader::widget([
            'model' => $model,
            'galleryClass' => GalleryAlbumPhoto::class,
        ]) ?>
    </div>

</div>
