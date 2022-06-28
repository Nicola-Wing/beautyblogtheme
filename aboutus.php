<?php
/**
 * Template Name: About Us Template
 */

get_header();
?>
    <section id="content">
        <div class="wrapper page_text">
            <h1 class="page_title"><?php _e('About Us'); ?></h1>
            <?php
            if(function_exists('breadcrumbs')){
                breadcrumbs();
            }
            ?>
            <div class="columns">
                <div class="column column75">
                    <?php
                    get_template_part('template-parts/content/content', 'about-us');
                    ?>
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
