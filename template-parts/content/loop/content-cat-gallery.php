<div class="column column50">
    <div class="image">
        <img src="<?php echo esc_url(get_field('photo')['url']); ?>" alt="<?php echo esc_attr__(get_field('photo')['alt']); ?>"/>
        <p class="caption">
            <strong><?php echo get_the_title(); ?></strong>
            <span><?php echo get_the_content(); ?></span>
            <a href="<?php echo esc_url(get_field('big_photo')['url']); ?>" data-rel="prettyPhoto[gallery]"
               class="button button_small button_orange float_right lightbox">
                <span class="inside">zoom</span>
            </a>
        </p>
    </div>
</div>