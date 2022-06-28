<?php
/**
 * Template Name: Gallery Template
 */
get_header();
?>
    <!-- BEGIN CONTENT -->
    <section id="content">
        <div class="wrapper page_text">
            <h1 class="page_title"><?php _e("Gallery"); ?></h1>
            <?php
            if(function_exists('breadcrumbs')){
                breadcrumbs();
            }
            ?>

            <ul class="page_gallery">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'post',
                    'category_name' => 'gallery',
                    'posts_per_page' => 4,
                    'paged' => $paged,
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                $the_query = new WP_Query($args);
                $i = 0;
                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        ++$i;
                        $the_query->the_post();
                        if ($i % 2 != 0) {
                            echo '<div class="columns">';
                            get_template_part('template-parts/content/loop/content', 'cat-gallery');
                        } else {
                            get_template_part('template-parts/content/loop/content', 'cat-gallery');
                            echo '</div>';
                        }
                    }
                    ?>
                    <?php
                    cq_pagination($the_query->max_num_pages);
                } else {
                    echo '<p>' . _e("Gallery not found.") . '</p>';
                }
                wp_reset_postdata()
                ?>
            </ul>
        </div>
    </section>
    <!-- END CONTENT -->
    </div>
    </div>

<?php
get_footer();