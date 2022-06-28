<?php
/**
 * Template Name: Home Template
 */

get_header();
?>

    <section id="top">
        <div class="wrapper">

            <?php
            custom_show_slider();
            ?>

        </div>
    </section>

    <section id="content">
        <div class="wrapper page_text page_home">
            <div class="introduction">
                <h1><?php _e("Lorem ipsum amet "); ?><a href="#"><?php _e("libero et"); ?></a><?php _e(" est fermentum suscipit sed id nulla. Donec elementum
                    placerat tortort."); ?></h1>
                <p><?php _e("Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Vehicula. Vivamus urna vitae arcu elit,
                    consequat lorem velit sit amet metus. Phasellus purus. Aenean quis ante. Vestibulum aliquam iaculis
                    leo, pretium wisi. Vivamus posuere vehicula dolor nonummy porttitor auctor, sapien vitae wisi vel
                    odio."); ?></p>
                <a class="button button_big button_orange float_left"><span class="inside"><?php _e("read more"); ?></span></a>
            </div>
            <ul class="columns dropcap">
                <li class="column column33 first">
                    <div class="inside">
                        <h1><?php _e("Beauty Experts"); ?></h1>
                        <p><?php _e("Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Primis in faucibus lorem. Curabitur
                            ultrices interdum. Integer adipiscing dictum enim."); ?></p>
                        <p class="read_more"><a href="<?php echo home_url(); ?>/category/beauty-experts/"><?php _e("Read more"); ?></a></p>
                    </div>
                </li>
                <li class="column column33 second">
                    <div class="inside">
                        <h1><?php _e("Photograph"); ?></h1>
                        <p><?php _e("Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Primis in faucibus lorem. Curabitur
                            ultrices interdum. Integer adipiscing dictum enim."); ?></p>
                        <p class="read_more"><a href="<?php echo home_url(); ?>/category/photographs/"><?php _e("Read more"); ?></a></p>
                    </div>
                </li>
                <li class="column column33 third">
                    <div class="inside">
                        <h1><?php _e("Choose your look!"); ?></h1>
                        <p><?php _e("Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Primis in faucibus lorem. Curabitur
                            ultrices interdum. Integer adipiscing dictum enim."); ?></p>
                        <p class="read_more"><a href="<?php echo home_url(); ?>/gallery/"><?php _e("Read more"); ?></a></p>
                    </div>
                </li>
            </ul>
            <ul class="columns iconcap">
                <li class="column column33 inews">
                    <div class="inside">
                        <h1><?php _e("We are trusted"); ?></h1>
                        <p><?php _e("Do you want to be unforgettable and capture memories of holiday? Then you come to us, we have
                            thousands of satisfied customers."); ?></p>
                        <p class="read_more"><a href="<?php echo home_url(); ?>/gallery/"><?php _e("Read more"); ?></a></p>
                    </div>
                </li>
                <li class="column column33 italk">
                    <div class="inside">
                        <h1><?php _e("Advice"); ?></h1>
                        <p><?php _e("Professional consultation 0800 408 808. Our experts will help you with advice on how to make
                            yourself more attractive."); ?></p>
                        <p class="read_more"><a href="<?php echo home_url(); ?>/contact/"><?php _e("Read more"); ?></a></p>
                    </div>
                </li>
                <li class="column column33 icon">
                    <div class="inside">
                        <h1><?php _e("News"); ?></h1>
                        <p><?php _e("Follow the news. Our specialists improve their skills to be chosen by you. They are waiting
                            for new projects."); ?></p>
                        <p class="read_more"><a href="<?php echo home_url(); ?>/blog/"><?php _e("Read more"); ?></a></p>
                    </div>
                </li>
            </ul>

            <div class="underline"></div>

            <div class="portfolio">
                <p class="all_projects"><a href="<?php echo home_url(); ?>/portfolio-page/"><?php _e("View all projects"); ?></a></p>
                <h1><?php _e("Portfolio"); ?></h1>
                <?php
                get_recent_portfolio();
                ?>
            </div>
        </div>
    </section>
    </div>
    </div>

<?php
get_footer();