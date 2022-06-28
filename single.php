<?php
/**
 * Template Name: Single-portfolio Template
 */
get_header();
?>
    <section id="content">
        <div class="wrapper page_text">
            <div class="columns">
                <div class="column column75">
                    <?php
                    while (have_posts()) {
                        the_post(); ?>
                        <article class="article">
                            <?php get_template_part('template-parts/content/loop/content', 'single'); ?>
                        </article>
                        <?php
                        wp_reset_postdata();
                    }
                    ?>
                </div>
                <div class="column column25">
                    <?php
                    if(is_active_sidebar('true_side')){
                        dynamic_sidebar('true_side');
                    } else {
                        get_sidebar();
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();