<?php
/**
 * Template Name: Sliders Template
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
                    <div class="swiper slides_cube">
                        <div class="swiper-wrapper">
                            <?php
                                $rows = get_field('gallery_cube');
                                if( $rows ) {
                                    foreach( $rows as $row ) {
                                        $image = $row['gallery_cube_img'];
                                        ?>
                                        <div class="swiper-slide slide_cube" style="background-image:url(<?php echo $image ?>)"></div>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                        <div class="swiper-pagination slide_cube-pagination"></div>
                    </div>
                    <div class="swiper slides_coverflow">
                        <div class="swiper-wrapper">
                                <?php
                                    $rows = get_field('gallery_coverflow');
                                    if( $rows ) {
                                        foreach( $rows as $row ) {
                                            $image = $row['gallery_coverflow_img'];
                                            ?>
                                            <div class="swiper-slide slide_coverflow" style="background-image:url(<?php echo $image ?>)"></div>
                                            <?php
                                        }
                                    }
                                ?>
                        </div>
                        <div class="swiper-pagination slides_coverflow-pagination"></div>
                    </div>
                    <div class="swiper slides_flip">
                        <div class="swiper-wrapper">
                            <?php
                                    $rows = get_field('gallery_flip');
                                    if( $rows ) {
                                        foreach( $rows as $row ) {
                                            $image = $row['gallery_flip_img'];
                                            ?>
                                            <div class="swiper-slide slide_flip" style="background-image:url(<?php echo $image ?>)"></div>
                                            <?php
                                        }
                                    }
                                ?>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="swiper slides_cards">
                        <div class="swiper-wrapper">
                            <?php
                                    $rows = get_field('gallery_cards');
                                    if( $rows ) {
                                        foreach( $rows as $row ) {
                                            $image = $row['gallery_cards_img'];
                                            ?>
                                            <div class="swiper-slide slide_cards" style="background-image:url(<?php echo $image ?>)"></div>
                                            <?php
                                        }
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="swiper slides_fade">
                        <div class="swiper-wrapper">
                            <?php
                                    $rows = get_field('gallery_fade');
                                    if( $rows ) {
                                        foreach( $rows as $row ) {
                                            $image = $row['gallery_fade_img'];
                                            ?>
                                            <div class="swiper-slide slide_fade" style="background-image:url(<?php echo $image ?>)"></div>
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