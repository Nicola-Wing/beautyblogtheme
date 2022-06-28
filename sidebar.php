<?php
/**
 * The template for displaying the sidebar
 */
?>
<div class="column column25">
    <?php
    if(is_active_sidebar('true_side')){
        dynamic_sidebar('true_side');
    }
    get_template_part('template-parts/content/content', 'about-us');
    ?>
</div>