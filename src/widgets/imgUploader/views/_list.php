<?php

use \yii\helpers\Html;
use \yii\helpers\Url;

?>

<?php if(count($model->{$modelRelationName}) > 0) { ?>
	<?php foreach ($model->{$modelRelationName} as $key => $gallery) { ?>

          <div class="card">
            <div class="card-image">
              <a href="<?= $gallery->photo->original; ?>" class="progressive replace">
                <?= Html::img($gallery->photo->src, ['alt' => $gallery->photo->name, 'class' => 'preview', 'width' => 650]); ?>
              </a>
              <span class="card-title"><?= $gallery->photo->name; ?></span>
            </div>
            <div class="card-content">
                <p><?= $gallery->photo->description ? $gallery->photo->description : '<span class="chip">Добавьте описание</span>'; ?></p>
            </div>
            <div class="card-action">
              <span class="card-title activator grey-text"><i class="material-icons">edit</i></span>
              <?= Html::a('<i class="material-icons">delete</i>', ['/gallery/back/delete-photo', 'id' => $gallery->photo->id, 'subject_id' => $model->id], ['title' => Yii::t('app', 'Удалить'), 'class' => 'kindergartenPhotos-delete-button right']); ?>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Редактировать<i class="material-icons right">close</i></span>
                
                  <div class="input-field">
                      <input placeholder="Название" id="KP-<?= $gallery->photo->id; ?>" type="text" class="validate kindergartenPhotos-edit-title" value="<?= $gallery->photo->name; ?>" name="kindergartenPhotoTitle" length="255">
                  </div>

                  <div class="input-field">
                      <textarea placeholder="Краткое описание" id="KPD-<?= $gallery->photo->id; ?>" type="text" class="validate kindergartenPhotos-edit-title materialize-textarea" name="kindergartenPhotoDescription" length="1000"><?= $gallery->photo->description; ?></textarea> 
                  </div>

                  <div class="row"></div>
                  <div class="input-field">
                    <a data-id="KP-<?= $gallery->photo->id; ?>" data-description="KPD-<?= $gallery->photo->id; ?>" href="<?= Url::toRoute(['/gallery/back/edit-caption', 'id' => $gallery->photo->id])?>" class="btn kindergartenPhotos-edit-button">Сохранить</a>
                  </div>
            </div>
          </div>
		
	<?php } ?>
<?php }else{ ?>
        <div class="card-panel">В фотоальбоме <?= $model->title ?> нет фотографий</div>
<?php } ?>
