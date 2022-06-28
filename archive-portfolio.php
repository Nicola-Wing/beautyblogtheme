<?php
/**
 * Template Name: Portfolio Template
 */
get_header();
?>
    <!-- BEGIN CONTENT -->
    <section id="content">
        <div class="wrapper page_text">
            <h1 class="page_title"><?php _e("Portfolio"); ?></h1>
            <?php if(function_exists('breadcrumbs')){
                breadcrumbs();
            }?>
            <?php
            $terms = get_terms(
                array(
                    'taxonomy' => 'portfolio_cats',
                    'hide_empty' => false,
                    'hierarchy' => 0,
                    'orderby' => 'name',
                    'order' => 'ASC',
                )
            );

            if (!empty($terms) && is_array($terms)) {
                echo '<ul id="portfolio_categories" class="portfolio_categories">
                        <li class="active segment-0 link-aj" data-id="all" class="all"><a href="#" >All Categories</a></li>';
                foreach ($terms as $term) { ?>
                    <li class="segment link-aj" data-id="<?php echo $term->term_id; ?>"
                        class="<?php echo $term->name; ?>">
                        <a href="#">
                            <?php echo $term->name; ?>
                        </a>
                    </li>
                    <?php
                }
                echo '</ul>';
            }
            ?>

            <div class="portfolio_items_container">
                <ul class="portfolio_items columns result">
                    <?php portfolio_tax_filter(); ?>
                </ul>
            </div>

        </div>
    </section>
    <!-- END CONTENT -->

<?php
get_footer();