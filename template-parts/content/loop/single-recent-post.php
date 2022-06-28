<li class="item">
    <a class="thumbnail" href="#"><img alt="<?php echo esc_attr__(get_field('miniature')['alt']); ?>"
            src="<?php echo esc_url(get_field('miniature')['url']); ?>"></a>
    <div class="text">
        <h4 class="title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
        <p class="data">
            <span class="date"><?php the_date('d/m/Y'); ?></span>
        </p>
    </div>
</li>
