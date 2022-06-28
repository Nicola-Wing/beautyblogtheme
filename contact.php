<?php
/**
 * Template Name: Contact Template
 */

get_header();
?>
    <section id="content">
        <div id="map"></div>
        <div class="wrapper page_text">
            <h1 class="page_title"><?php _e('Contact'); ?></h1>
            <?php
            if(function_exists('breadcrumbs')){
                breadcrumbs();
            }
            ?>
            <div class="columns">
                <div class="column column75">
                    <?php
                    get_template_part('template-parts/content/content', 'contact');
                    echo "<br><br>";
                    if(is_active_sidebar('contact_sidebar')){
                        dynamic_sidebar('contact_sidebar');
                    }
                    ?>
                </div>
                <div class="column column25">
                    <?php
                    get_sidebar();
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();
?>