<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="GalleryPhoto-form">

    <?php $form = ActiveForm::begin([
        'action' => ['/gallery/back/upload', 'subject_id' => $model->subject_id],
        'options' => ['data-pjax' => true, 'enctype' => 'multipart/form-data'],
        'id' => 'galleryphoto-photo-form',
    ]); ?>

    <?= $form->field($model, 'subject_id')->hiddenInput(['value'=> $model->subject_id])->label(false); ?>
    <?= $form->field($model, 'subject_name')->hiddenInput(['value'=> $model->subject_name])->label(false); ?>

    <div class="file-field input-field">
        <div class="btn">
            <span>Выбрать фотографии</span>
            <input type="hidden" name="GalleryPhoto[files][]" value="">
            <input id="galleryphoto-files" name="GalleryPhoto[files][]" type="file" multiple accept="image/*">
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Выберите фотографии с форматами: .jpg, .jpeg, .png и .gif. Не более 2-х Мб каждая.">
        </div>
    </div>

    <?php $form->field($model, 'files')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['id' => 'galleryphoto-photo-form-submit', 'class' => 'btn btn-primary', 'style' => 'display:none;', 'form' => 'galleryphoto-photo-form']) ?>
    </div>

    <script type="text/javascript">
        var inputElement = document.getElementById("galleryphoto-files");
        inputElement.addEventListener("change", handleFiles, false);
        function handleFiles() {
            document.getElementById("galleryphoto-photo-form-submit").click();
        }
    </script>

    <?php ActiveForm::end(); ?>

</div>
