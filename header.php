<?php
/**
 * The header for our theme
 */
?>
<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo __(bloginfo('name')); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/light.css" title="light" type="text/css"/>
    <link rel="alternate stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/dark.css" title="dark" type="text/css"/>
    <meta name="viewport" charset="UTF-8">
    <?php
    wp_head();
    ?>
</head>
<body>
<div id="stylesheet_switcher">
    <a href="#" id="switcher"></a>
    <ul id="stylesheets">
        <li>
            <a href="#" class="sheet" id="light">
                <span class="image"><img src="<?php echo get_template_directory_uri(); ?>/gfx/stylesheet_light.jpg" alt=""/></span>
                <span class="mask"></span>
                <span class="name"><?php echo __('Light version'); ?></span>
            </a>
        </li>
        <li>
            <a href="#" class="sheet" id="dark">
                <span class="image"><img src="<?php echo get_template_directory_uri(); ?>/gfx/stylesheet_dark.jpg" alt=""/></span>
                <span class="mask"></span>
                <span class="name"><?php echo __('Dark version'); ?></span>
            </a>
        </li>
    </ul>
</div>
<!-- BEGIN PAGE -->
<div id="page">
    <div id="page_top">
        <div id="page_top_in">
            <!-- BEGIN TITLEBAR -->
            <header id="titlebar">
                <div class="wrapper">
                    <a id="logo" href="#"><span></span></a>
                    <div id="titlebar_right">
                        <ul id="social_icons">
                            <?php
                            if( have_rows('social_icons', 'option') ){ ?>
                                <li class="phone">
                                    <?php
                                    while( have_rows('social_icons', 'option') ) {
                                        the_row();
                                        $name = get_sub_field('name');
                                        $link = get_sub_field('link');
                                        ?>
                                        <li><a href="<?php echo esc_url($link); ?>" class="<?php echo esc_attr($name); ?>"></a></li>
                                        <?php
                                    }
                                    ?>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <div class="clear"></div>
                            <?php
                            $menu_name = 'main_menu';
                            $locations = get_nav_menu_locations();
                            $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                            $menu_items = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
                            ?>

                        <nav>
                            <ul id="top_menu">
                                <?php
                                $count = 0;
                                $submenu = false;

                                foreach( $menu_items as $item ):

                                    $link = $item->url;
                                    $title = $item->title;
                                    // item does not have a parent so menu_item_parent equals 0 (false)
                                    if ( !$item->menu_item_parent ):
                                        // save this id for later comparison with sub-menu items
                                        $parent_id = $item->ID;
                                        ?>
                                        <li>
                                        <a href="<?php echo $link; ?>"> <?php echo $title; ?></a>
                                    <?php endif; ?>
                                    <?php if ( $parent_id == $item->menu_item_parent ): ?>
                                    <?php if ( !$submenu ): $submenu = true; ?>
                                        <div class="submenu"><ul>
                                    <?php endif; ?>

                                    <li>
                                        <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
                                    </li>

                                    <?php if ( !isset($menu_items[ $count + 1 ]) || $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>

                                        </ul></div>
                                        <?php $submenu = false; endif; ?>

                                <?php endif; ?>

                                    <?php if ( !isset($menu_items[ $count + 1 ]) || $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
                                    </li>
                                    <?php $submenu = false; endif; ?>

                                    <?php $count++; endforeach; ?>

								<?php
                                if(is_active_sidebar('top_menu_sidebar')){
                                    dynamic_sidebar('top_menu_sidebar');
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="clear"></div>
                </div>
            </header>
            <!-- END TITLEBAR -->

