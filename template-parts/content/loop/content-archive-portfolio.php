<li data-type="webdesign" data-id="id" class="column column33">
    <a href="<?php echo esc_url(get_field('photo')['url']); ?>" data-rel="prettyPhoto[gallery]"
       class="portfolio_image lightbox">
        <div class="inside">
            <?php echo wp_get_attachment_image(get_field('photo')['id'], 'thumb276x230');?>
            <div class="mask"></div>
        </div>
    </a>
    <h1><?php echo get_the_title(); ?></h1>
    <p><?php echo mb_strimwidth(__(get_post_meta(get_the_ID(), 'about', true)), 0, 110, "..."); ?></p>
    <?php
    if (is_active_sidebar('portfolio_about_bottom_sidebar')) {
        dynamic_sidebar('portfolio_about_bottom_sidebar');
    }
    ?>
    <a class="button button_small button_orange" href="<?php echo get_the_permalink(); ?>">
        <span class="inside">read more</span>
    </a>
</li>