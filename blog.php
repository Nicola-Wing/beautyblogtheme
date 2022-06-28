<?php
/**
 * Template Name: Blog Template
 */
get_header();
?>

    <!-- BEGIN CONTENT -->
    <section id="content">
        <div class="wrapper page_text">
            <h1 class="page_title"><?php _e("Blog"); ?></h1>
            <?php
            if(function_exists('breadcrumbs')){
                breadcrumbs();
            }
            ?>

            <div class="columns">
                <div class="column column75">

                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $news = new WP_Query(array(
                        'category_name' => 'news',
                        'posts_per_page' => 2,
                        'paged' => $paged,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    ));

                    if ($news->have_posts()) {
                        while ($news->have_posts()) {
                            $news->the_post();
                            get_template_part('template-parts/content/loop/content', 'single');
                        }
                        cq_pagination($news->max_num_pages);
                        wp_reset_postdata();
                    } else {
                        echo '<p>'.__("Posts not found.").'</p>';
                    } ?>
                </div>
                <div class="column column25">
                    <?php
                    get_sidebar();
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTENT -->
    </div>
    </div>

<?php
get_footer();

