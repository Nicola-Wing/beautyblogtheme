<?php
/**
 * Template Name: Search Result Template
 */
get_header();
?>

    <!-- BEGIN CONTENT -->
    <section id="content">
        <div class="wrapper page_text">
            <h1 class="page_title"><?php _e("Search Result"); ?></h1>
            <?php
            if(function_exists('breadcrumbs')){
                breadcrumbs();
            }
            ?>
            <div class="columns">
                <div class="column column75">
                    <?php
                    if(function_exists(get_custom_search_results())){
                        get_custom_search_results();
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
    <!-- END CONTENT -->
    </div>
    </div>

<?php
get_footer();

