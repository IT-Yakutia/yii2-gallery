<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>	

<div class="col-xl-3 col-md-6">
	<div class="doctor">
		<div class="doctor_image"><img src="<?= $model->photo ?>" alt="<?= $model->title ?>"></div>
		<div class="doctor_content">
			<div class="doctor_name"><a href="<?= Url::toRoute(['view', 'id' => $model->id]); ?>"><?= $model->title ?></a></div>
			<div class="doctor_title"><?= $model->description ?></div>
		</div>
	</div>
</div>