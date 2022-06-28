<div class="columns">
    <div class="column column33">
        <h1>Let's get acquainted</h1>
        <p><?php echo esc_html_e(the_field('about')); ?></p>
        <p><?php echo esc_html_e(the_field('location')); ?></p>
        <div class="inside">
            <p>№
            <?php
            set_post_thumbnail(the_ID(), get_field('photo', false, false));
            echo '<br>';
            the_post_thumbnail('thumb276x230');
            ?></p>
            <div class="mask"></div>
        </div>
        <br>
        <p>Tel: <?php echo esc_html_e(get_field('phone')); ?></p>
        <p>Detailed portfolio:
            <a href="<?php echo esc_url(get_field('link')); ?>"><?php echo esc_html_e(get_field('link')); ?></a>
        </p>
        <p>Email: <a href="<?php echo esc_url(get_field('mail')); ?>"><?php echo esc_url(get_field('mail')); ?></a></p>
    </div>


    <div class="column column66">
        <div id="content_slide">
            <?php
            $images = get_field('gallery');
            if ($images): ?>
                <div class="flexslider">
                    <ul class="slides">
                        <?php foreach ($images as $image): ?>
                            <li>
                        <?php echo wp_get_attachment_image($image['id'], 'thumb604x478');?>
                            </li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
                <br><br>
            <?php
            endif;
            ?>
            <p><?php echo the_terms(get_the_ID(), 'events', 'Events: ', ' | '); ?></p>
            <p><?php echo the_terms(get_the_ID(), 'styles', 'Styles: ', ' | '); ?></p>
        </div>
    </div>
</div>