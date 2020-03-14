<?php

use uraankhayayaal\gallery\assets\slider\SliderAsset;
use uraankhayayaal\gallery\assets\album\AlbumAsset;

SliderAsset::register($this);
AlbumAsset::register($this);

?>    

    <div class="doctors">
		<div class="container">
			<div class="row doctors_row">

                    <div class="departments">
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                    <div class="section_title"><?= $model->title ?></div>
                                    <div class="section_subtitle"><?= $model->description ?></div>
                                </div>
                            </div>
                            <div class="row dept_row">
                                <div class="col">
                                    <div class="dept_slider_container_outer">
                                        <div class="dept_slider_container">

                                            <div class="owl-carousel owl-theme dept_slider">
                                                
                                                <?php foreach ($model->galleryAlboomPhotos as $key => $alboomPhoto) { ?>
                                                    <div class="owl-item dept_item modaled">
                                                        <a href="<?= $alboomPhoto->photo->original; ?>" class="dept_image progressive replace">
                                                            <img src="<?= $alboomPhoto->photo->src; ?>" class="preview" alt="<?= $alboomPhoto->photo->name ?>">
                                                        </a>
                                                        <!-- <div class="dept_image"><img src="<?= $alboomPhoto->photo->original ?>" alt="<?= $alboomPhoto->photo->name ?>"></div>
                                                        <div class="dept_content"> -->
                                                            <!-- <div class="dept_title"><?= $alboomPhoto->photo->name ?></div>
                                                            <div class="dept_link"><a href="#">Read More</a></div>
                                                        </div> -->
                                                    </div>
                                                <?php } ?>

                                            </div>
                                                
                                            <?php
                                            $photos = [];
                                            foreach ($model->galleryAlboomPhotos as $key => $photo) {
                                                $photos[] = [
                                                    'src' => $photo->photo->original,
                                                    'title' => $photo->photo->name,
                                                    'caption' => $photo->photo->description,
                                                    'width' => $photo->photo->w,
                                                    'height' => $photo->photo->h,
                                                    //'size' => '1024x685',
                                                    //'thumb' => $photo->photo->src,
                                                ];
                                            }
                                            ?>
                                            <?=
                                            \powerkernel\photoswipe\Modal::widget([
                                                'selector' => '.modaled',
                                                'images' => $photos,
                                            ])
                                            ?>
                                            
                                        </div>

                                        <div class="dept_slider_nav"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>

                                    </div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>

			</div>
		</div>
	</div>