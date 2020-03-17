<?php

use frontend\assets\AlbumAsset;
AlbumAsset::register($this);

?>

    <div class="departments">
        <div class="container">
<!--             <div class="row">
                <div class="col text-center">
                    <div class="section_title">Фотогалерея</div>
                    <div class="section_subtitle">фотоальбомы</div>
                </div>
            </div> -->
            <div class="row dept_row">
                <div class="col">
                    <div class="dept_slider_container_outer">
                        <div class="dept_slider_container">

                            <div class="owl-carousel owl-theme dept_slider">
                                
                                <?php foreach ($model->galleryArticles as $key => $galleryArticle) { ?>
                                    <div class="owl-item dept_item modaled">
                                        <a href="<?= $galleryArticle->photo->original; ?>" class="dept_image progressive replace">
                                            <img src="<?= $galleryArticle->photo->src; ?>" class="preview" alt="<?= $galleryArticle->photo->name ?>">
                                        </a>
                                        <!-- <div class="dept_image"><img src="<?= $galleryArticle->photo->original ?>" alt="<?= $galleryArticle->photo->name ?>"></div>
                                        <div class="dept_content">
                                            <div class="dept_title"><?= $galleryArticle->photo->name ?></div>
                                            <div class="dept_link"><a href="#">Read More</a></div>
                                        </div> -->
                                    </div>
                                <?php } ?>

                            </div>
                            
                        </div>

                        <?php
                        $photos = [];
                        foreach ($model->galleryArticles as $key => $photo) {
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

                        <div class="dept_slider_nav"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>

                    </div>
                        
                </div>
            </div>
        </div>
    </div>