<?php

function console_log($data){ // сама функция
    if(is_array($data) || is_object($data)){
		echo("<script>console.log('php_array: ".json_encode($data)."');</script>");
	} else {
		echo("<script>console.log('php_string: ".$data."');</script>");
	}
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts_method');
function enqueue_custom_scripts_method(){
    $path_css = get_stylesheet_directory_uri() . '/css/';
    wp_enqueue_style('reset-css', $path_css . 'reset.css', array());
    wp_enqueue_style('style-css', $path_css . 'style.css', array());
    wp_enqueue_style('flexslider-css', $path_css . 'flexslider.css', array());
    wp_enqueue_style('prettyPhoto-css', $path_css . 'prettyPhoto.css', array());

    $path_js = get_template_directory_uri() . '/js/';
    wp_enqueue_script('jq-min-js', $path_js . 'jquery.min.js', array());
    wp_enqueue_script('jq-ui-min-js', $path_js . 'jquery.ui.min.js', array());
    wp_enqueue_script('jq-flexslider-min-js', $path_js . 'jquery.flexslider.min.js', array());
    wp_enqueue_script('jq-prettyphoto-min-js', $path_js . 'jquery.prettyphoto.min.js', array());
    wp_enqueue_script('jq-stylesheettoggle-js', $path_js . 'jquery.stylesheettoggle.js', array());
    wp_enqueue_script('onload-js', $path_js . 'onload.js', array());
}

add_action('wp_enqueue_scripts', 'enqueue_custom_one_slider');
function enqueue_custom_one_slider(){
        if(is_page_template('one-slider.php')){
            wp_enqueue_style( 'swiper_css',get_stylesheet_directory_uri() . '/css/swiper/swiper-bundle.min.css' );
            wp_enqueue_style( 'one_slider_css',get_stylesheet_directory_uri() . '/css/swiper/one_slider.css' );

            wp_enqueue_script('swiper_js',get_stylesheet_directory_uri() . '/js/swiper/swiper-bundle.min.js',array('jquery'), null , 'footer');
            wp_enqueue_script('one_slider_js',get_stylesheet_directory_uri() . '/js/swiper/one_slider.js',array('swiper_js'), null , 'footer');
        }
}

add_action('wp_enqueue_scripts', 'enqueue_custom_sliders');
function enqueue_custom_sliders(){
        if(is_page_template('sliders.php')){
            wp_enqueue_style( 'swiper_css',get_stylesheet_directory_uri() . '/css/swiper/swiper-bundle.min.css' );
            wp_enqueue_style( 'sliders_css',get_stylesheet_directory_uri() . '/css/swiper/sliders.css' );

            wp_enqueue_script('swiper_js',get_stylesheet_directory_uri() . '/js/swiper/swiper-bundle.min.js',array('jquery'), null , 'footer');
            wp_enqueue_script('sliders_js',get_stylesheet_directory_uri() . '/js/swiper/sliders.js',array('swiper_js'), null , 'footer');
        }
}

add_action('wp_enqueue_scripts', 'enqueue_custom_map');
function enqueue_custom_map(){
        if(is_page_template('contact.php')){
            wp_enqueue_style('map-css', get_stylesheet_directory_uri() . '/css/map/map.css', array());

            wp_enqueue_script('map-js', get_stylesheet_directory_uri() . '/js/map/map.js', array(),null , 'footer');
            wp_enqueue_script('map-google',  "https://maps.googleapis.com/maps/api/js?key=AIzaSyCrA0B7A2xVRRKXCex0PWITOeRHM_-JY2g&callback=initMap", array(),null , 'footer');
        }
}


function set_cats_for_menu()
{
    $terms = get_terms(
        array(
            'taxonomy' => 'portfolio_cats',
            'hide_empty' => false,
            'hierarchy' => 1,
            'pad_counts' => true,
            'orderby' => 'count',
            'order' => 'DESC',
        )
    );

    if (!empty($terms) && is_array($terms)) {
        echo '<ul>';
        foreach ($terms as $term) { ?>
            <li>
                <a href="<?php echo esc_url(get_term_link($term)) ?>">
                    <?php echo $term->name; ?>
                </a>
            </li>
            <?php
        }
        echo '</ul>';
    }
}

function get_recent_portfolio()
{
    $recent_ports = new WP_Query(array(
        'post_type' => 'post',
        'category_name' => 'gallery',
        'posts_per_page' => 4,
        'orderby' => 'date',
        'order' => 'DESC',
    ));
    if ($recent_ports->have_posts()) {
        echo '<div class="columns">';
        while ($recent_ports->have_posts()) {
            $recent_ports->the_post(); ?>
            <div class="column column25">
                <a href="<?php echo esc_url(get_field('big_photo')['url']); ?>" class="image lightbox"
                   data-rel="prettyPhoto[gallery]">
                    <span class="inside">
                        <?php
                        echo wp_get_attachment_image(get_field('photo')['id'], 'thumb197x140');
                        ?>
                        <span class="caption"><?php _e(get_the_title()); ?></span>
                    </span>
                    <span class="image_shadow"></span>
                </a>
            </div>
            <?php

        }
        wp_reset_postdata();
        echo '</div';
    } else {
        echo '<p>' . _e("Portfolio is not found.") . '</p>';
    }
    ?>
    <?php
}

function custom_show_slider()
{
    $slider = new WP_Query(array(
        'post_type' => 'slider',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
    ));
    if ($slider->have_posts()) {
        echo '<div id="top_slide" class="flexslider">
                <ul class="slides">';
        while ($slider->have_posts()) {
            $slider->the_post();
            get_template_part('template-parts/content/loop/content', 'slider');
        }
        wp_reset_postdata();
        echo '</ul>
            </div>';
    } else {
        echo '<p>' . _e("Slides are not found.") . '</p>';
    }
    ?>
    <?php
}


//  Custom pagination function.
function cq_pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged)) $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
        echo "<ul class='pagenav'>";
        if ($paged > 2 && $paged > $range + 1 && $showitems > $pages)
            echo "<a href='" . get_pagenum_link(1) . "'></a>";
        if ($paged > 1 && $showitems > $pages)
            echo "<li class='arrow arrow_left'><a href='" . get_pagenum_link($paged - 1) . "'><span></span></a>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? "<li class='active'><a><span>" . $i . "</span></a></li>" : "<li> <a href='" . get_pagenum_link($i) . "'><span>" . $i . "</span></a></li>";
            }
        }
        if ($paged < $pages && $showitems > $pages)
            echo " <li class='arrow arrow_right'><a href='" . get_pagenum_link($paged + 1) . "'><span></span></a></li>";
        echo "</ul>";
    }
}

add_action('widgets_init', 'true_register_wp_sidebars');
// creating sidebar with block in admin page
function true_register_wp_sidebars()
{

    register_sidebar(
        array(
            'id' => 'true_side',
            'name' => 'Sidebar',
            'description' => 'Drag and drop widgets here to add them to the sidebar.',
            'before_widget' => '<div class="padd16bot">',
            'after_widget' => '</div>',
            'before_title' => '<h1>',
            'after_title' => '</h1>'
        )
    );

    register_sidebar(
        array(
            'id' => 'true_foot',
            'name' => 'Footer',
            'description' => 'Drag and drop widgets here to add them to the footer.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h1>',
            'after_title' => '</h1>'
        )
    );

    register_sidebar(
        array(
            'id' => 'portfolio_about_bottom_sidebar',
            'name' => 'Portfolio Sidebar',
            'description' => 'Drag and drop widgets here to add them to the portfolio sidebar in the bottom.',
            'before_widget' => '<p>',
            'after_widget' => '</p>',
        )
    );
	register_sidebar(
        array(
            'id' => 'contact_sidebar',
            'name' => 'Contact Sidebar',
            'description' => 'Drag and drop widgets here to add them to the contact block of page Contact.',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        )
    );
	register_sidebar(
        array(
            'id' => 'top_menu_sidebar',
            'name' => 'Top Menu Sidebar',
            'description' => 'Drag and drop widgets here to add them to the top menu.',
            'before_widget' => '<li>',
            'after_widget' => '</li>',
        )
    );
}

add_action('init', 'create_taxonomy');
function create_taxonomy()
{
    register_taxonomy('portfolio_cats', 'portfolio', array('hierarchical' => true, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true));
}

function show_posts_by_cat()
{
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $res = new WP_Query(array(
        'post_type' => array('post'),
        'cat' => get_query_var('cat'),
        'posts_per_page' => 2,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'DESC',
    ));
    if ($res->have_posts()) {
        while ($res->have_posts()) {
            $res->the_post();
            if (get_post_type() == 'post') {
                get_template_part('template-parts/content/loop/content', 'single');
            }
        }
        cq_pagination($res->max_num_pages);
        wp_reset_postdata();
    } else {
        echo '<p>' . __("Post not found.") . '</p>';
    }
}

// Start: AJAX FILTER

add_action('wp_enqueue_scripts', 'assets_for_tax_filter');

function assets_for_tax_filter()
{
    wp_register_script('show-portfolios', get_template_directory_uri() . '/js/filter-portfolio.js', array('jquery'));
    wp_localize_script('show-portfolios', 'ajaxurl', array(
        'url' => admin_url('/admin-ajax.php')
    ));
}

add_action('wp_ajax_portfolio_tax_filter', 'portfolio_tax_filter');
add_action('wp_ajax_nopriv_portfolio_tax_filter', 'portfolio_tax_filter');

function portfolio_tax_filter()
{
    wp_enqueue_script('show-portfolios');

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'portfolio',
        'orderby' => 'date',
        'posts_per_page' => 6,
        'paged' => $paged,
    );

    if (isset($_POST['id'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'portfolio_cats',
                'field' => 'id',
                'terms' => $_POST['id'],
            )
        );
    }

    $portfolio = new WP_Query($args);

    if ($portfolio->have_posts()) {

        while ($portfolio->have_posts()):
            $portfolio->the_post();
            get_template_part('template-parts/content/loop/content', 'archive-portfolio');
        endwhile;

        cq_pagination($portfolio->max_num_pages);
        wp_reset_postdata();
    } else {
        echo '<li class="column column33"><p>' . __("Portfolio not found.") . '</p></li>';
    }

    if (isset($_POST['id'])) {
        wp_die();
    }
}

// End: AJAX FILTER

// Changing size for photo on portfolio-single page.
if (function_exists('add_image_size')) {
    add_image_size('thumb276x230', 276, 230, true);
    add_image_size('thumb604x478', 604, 478, true);
    add_image_size('thumb197x140', 197, 140, true);
}
add_filter('image_size_thumb276x230', 'new_custom_sizes');
function new_custom_sizes($sizes)
{
    return array_merge($sizes, array(
        'thumb-276x230' => 'Size 276x230',
        'thumb-604x478' => 'Size 604x478',
        'thumb-197x140' => 'Size 197x140',
    ));
}

// Setting default photo
add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field');
function add_default_value_to_image_field($field)
{
    acf_render_field_setting($field, array(
        'label' => 'Default Image',
        'instructions' => 'Appears when creating a new post',
        'type' => 'image',
        'name' => 'default_value',
    ));
}

add_filter('acf/load_value/type=image', 'reset_default_image', 10, 3);
function reset_default_image($value, $post_id, $field)
{
    if (!$value) {
        $value = $field['default_value'];
    }
    return $value;
}

// Header ACF settings.
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));
}

// Registering "Manage Locations" for menus.
add_action('init', 'register_custom_nav_menus');

function register_custom_nav_menus()
{
    register_nav_menus(
        array(
            'main_menu' => 'Main menu'
        )
    );
}


