<?php
/**
 * Template Name: One Slider Template
 */

get_header();
?>
    <section id="content">
        <div class="wrapper page_text">
            <h1 class="page_title"><?php _e('Sliders'); ?></h1>
            <?php
            if(function_exists('breadcrumbs')){
                breadcrumbs();
            }
            ?>
            <div class="columns">
                <div class="column column75">
                    <div class="swiper slides_one_slider">
                        <div class="swiper-wrapper">
                            <?php
                                    $rows = get_field('gallery_one_slider');
                                    if( $rows ) {
                                        foreach( $rows as $row ) {
                                            $image = $row['gallery_one_slider_img'];
                                            ?>
                                            <div class="swiper-slide slide_one_slider">
                                                <img src="<?php echo $image ?>" alt="<?php echo $image ?>">
                                            </div>
                                            <?php
                                        }
                                    }
                                ?>
                        </div>
                        <div class="swiper-pagination swiper-pagination-white"></div>
                        <div class="swiper-button-next swiper-button-white"></div>
                        <div class="swiper-button-prev swiper-button-white"></div>
                    </div>
                    <div class="swiper slides_one_sliderZoom">
                        <div class="swiper-wrapper">
                            <?php
                                    $rows = get_field('gallery_one_slider');
                                    if( $rows ) {
                                        foreach( $rows as $row ) {
                                            $image = $row['gallery_one_slider_img'];
                                            ?>
                                            <div class="swiper-slide slide_one_sliderZoom">
                                                <div class="swiper-zoom-container">
                                                    <img src="<?php echo $image ?>" alt="<?php echo $image ?>">
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                ?>
                        </div>
                        <div class="swiper-pagination swiper-pagination-white"></div>
                        <div class="swiper-button-next swiper-button-white"></div>
                        <div class="swiper-button-prev swiper-button-white"></div>
                    </div>
                </div>
                <div class="column column25">
                    <?php
                    get_sidebar();
                    ?>
            </div>
        </div>
    </section>
<?php
get_footer();