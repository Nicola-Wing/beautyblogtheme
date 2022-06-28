<li>
    <img src="<?php echo esc_url(get_field('photo')['url']); ?>" alt="<?php esc_attr_e(get_field('photo')['alt']);?>"/>
    <p class="flex-caption">
        <strong><?php _e(the_title()); ?></strong>
        <span><?php _e(get_the_excerpt()); ?></span>
    </p>
</li>