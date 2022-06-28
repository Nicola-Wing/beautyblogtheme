<?php
get_header();
?>
    <!-- BEGIN CONTENT -->
    <section id="content">
        <div class="wrapper page_text">
            <h1 class="page_title"><?php _e(single_cat_title()); ?></h1>
            <?php
            if(function_exists('breadcrumbs')){
                breadcrumbs();
            }
            ?>
            <div class="columns">
                <div class="column column75">
                    <?php
                    show_posts_by_cat();
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
<?php
get_footer();