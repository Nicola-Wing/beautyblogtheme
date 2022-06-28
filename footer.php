<?php
/**
 * The template for displaying the footer
 */
?>

<div id="page_bottom">
    <!-- BEGIN ABOVE_FOOTER -->
    <section id="above_footer">
        <div class="wrapper above_footer_boxes page_text">
            <div class="box first">
                <?php get_template_part('template-parts/content/content', 'about-us'); ?>
            </div>
            <?php
            if (is_active_sidebar('true_foot')) {
                dynamic_sidebar('true_foot');
            }
            ?>
            <div class="box fourth">
                <?php get_template_part('template-parts/content/content', 'contact'); ?>
            </div>
        </div>
    </section>
    <!-- END ABOVE_FOOTER -->
    <!-- BEGIN FOOTER -->
    <footer id="footer">
        <div class="wrapper">
            <p class="copyrights"><?php _e("Copyright &copy; " . date('Y') . " by TheSame. All rights reserved."); ?></p>
            <a href="#page" class="up">
                <span class="arrow"></span>
                <span class="text"><?php _e("top"); ?></span>
            </a>
        </div>
    </footer>
    <!-- END FOOTER -->
</div>
</div>

<?php
wp_footer();
?>
</body>
</html>