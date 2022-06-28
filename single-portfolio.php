<?php
/**
 * Template Name: Single-portfolio Template
 */
get_header();

while (have_posts()) :
    the_post();
    $post_id = get_the_ID();
    $image_ids = array();
    ?>
    <!-- BEGIN CONTENT -->
    <section id="content">
        <div class="wrapper page_text">
            <?php if (get_field('name')): ?>
                <h1 class="page_title"><?php esc_html_e(the_field('name')); ?></h1>
            <?php endif; ?>
            <?php if(function_exists(breadcrumbs())){
                breadcrumbs();
            }
            get_template_part('template-parts/content/loop/content', 'single-portfolio');
            ?>
        </div>
    </section>
    <!-- END CONTENT -->
    </div>
    </div>
<?php
endwhile;
get_footer();