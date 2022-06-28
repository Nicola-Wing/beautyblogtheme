<article class="article">
    <div class="article_image nomargin">
        <div class="inside">
            <img src="<?php echo esc_url(get_field('preview_photo')['url']); ?>"
                 alt="<?php echo esc_attr__(get_field('preview_photo')['alt']); ?>"/><br><br>
        </div>
    </div>
    <div class="article_details">
        <ul class="article_author_date">
            <li><em>Add:</em> <?php echo the_date('d/m/Y'); ?></li>
            <li><em>Author: </em> <a href="#"><?php the_author_link(); ?></a></li>
        </ul>
        <p class="article_comments"><em>Comment:</em> <?php echo get_comments_number(); ?></p>
    </div>

    <h1><?php _e(the_title()); ?></h1>
    <p><?php
        if (is_single()) {
            _e(get_the_content());
        } else {
            _e(mb_strimwidth(get_the_content(), 0, 500, "..."));
        }
        ?>
    </p>
    <q><?php _e(sanitize_text_field(the_field('quote'))); ?></q>
    <p><?php _e(sanitize_text_field(get_field('info'))); ?></p>
    <?php
    if (!is_single()) { ?>
        <a class="button button_small button_orange float_left" href="<?php the_permalink(); ?>"><span class="inside">read more</span></a>
    <?php }
    ?>
</article>
