<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use uraankhayayaal\gallery\assets\about\AboutAsset;
use yii\widgets\ListView;

AboutAsset::register($this);
$this->title = "Фотогалереи";
// $this->params['breadcrumbs'][] = $this->title;
?>	

	<div class="doctors">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">Фото и видео галерея</div>
					<!-- <div class="section_subtitle">Фотографии</div> -->
				</div>
			</div>
			<div class="row doctors_row">

				<?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemOptions' => ['class' => 'item'],
                    'itemView' => '_item',
                    'options' => ['tag' => false, 'class' => false, 'id' => false],
                    'itemOptions' => [
                        'tag' => false,
                        'class' => 'news-item',
                    ],
                    'layout' => '{items}{pager}',
                    'summaryOptions' => ['class' => 'summary grey-text'],
                    'emptyTextOptions' => ['class' => 'empty grey-text'],
                    'pager' => [
                        'registerLinkTags' => true,
                        'options' => ['class' => 'pagination'],
                        'prevPageCssClass' => 'page-item',
                        'nextPageCssClass' => 'page-item',
                        'pageCssClass' => 'page-item',
                        'nextPageLabel' => '>',
                        'prevPageLabel' => '<',
                        'linkOptions' => ['class' => 'page-link'],
                        'disabledPageCssClass' => 'd-none',
                    ]
                ]) ?>

			</div>
		</div>
	</div>


    <?= $this->render('_video', ['videos' => $videos]); ?>
