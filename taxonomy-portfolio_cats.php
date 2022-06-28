<?php
get_header();
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
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
            <?php if ( have_posts() ){
                ?>
            <div class="portfolio_items_container">
                <ul class="portfolio_items columns">
        <?php
                while ( have_posts() ){
                    the_post();
                    get_template_part('template-parts/content/loop/content', 'archive-portfolio');
                }
        echo '</ul>
                    </div>';
            } else {
                echo '<br><p>'. __("Portfolio not found.") .'</p><br>';
            }
            wp_reset_query();
            ?>
        </div>
    </section>
    <!-- END CONTENT -->
<?php
get_footer();