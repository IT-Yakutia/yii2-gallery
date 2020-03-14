<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

	<?php if(count($videos) > 0) { ?>
	<style>
		.video{
			position: relative;
		    width: 100%;
		    margin-bottom: 30px;
		    padding-bottom: 56%;
		    text-align: left;
		}
		.video iframe{
		    width: 100%;
		    position: absolute;
		    height: 100%;
		    overflow: hidden;
		}
		.doctor_name a.nolink{
			color: #404040;
		}
	</style>
    <div class="doctors">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title">Наши видео</div>
                </div>
            </div>
            <div class="row doctors_row">

				<?php foreach ($videos as $key => $video) { ?>
				<div class="col-xl-3 col-md-6">
					<div class="doctor">
						<div class="doctor_image video"><?= $video->src ?></div>
						<div class="doctor_content" style="padding-top: 0px;">
							<div class="doctor_name" title="<?= $video->description ?>"><a class="nolink"><?= $video->title ?></a></div>
						</div>
					</div>
				</div>
				<?php } ?>

            </div>
        </div>
    </div>
	<?php } ?>
