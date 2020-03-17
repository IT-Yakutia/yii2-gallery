<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

?>

<div class="photoalbum-photo-create" id="image_uload_pjax_success_url" data-href="<?= Yii::$app->request->url; ?>">

	<?php Pjax::begin(['enablePushState' => false]); ?>

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

		<style>
			.gallery{
				display: grid;
			  	grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
			  	grid-gap: 20px;
			  	align-items: start;
			}
		</style>
		<div class="gallery">
		<?= $this->render('_list', [
	        'model' => $gallerySubject,
	        'modelRelationName' => $modelRelationName,
	    ]) ?>
	    </div>

    <?php Pjax::end(); ?>

</div>
