<?php
$url = home_url()."/contact/";
$page_ID = url_to_postid($url);
?>
<h3><?php echo __("Contact Us");?></h3>
<ul class="list_contact page_text">
    <?php
    if( have_rows('contact_phones_set', $page_ID) ){ ?>
        <li class="phone">
        <?php
        while( have_rows('contact_phones_set', $page_ID) ) {
            the_row();
            $sub_value = get_sub_field('number');
            echo esc_html($sub_value) . '<br>';
        }
        ?>
        </li>
    <?php
    }
    ?>
    <li class="email">
        <a href="#"><?php echo get_field('contact_email', $page_ID)?></a>
    </li>
    <li class="address">
        <?php echo esc_html__(get_field('contact_address',$page_ID)); ?>
        <br>
        <?php echo esc_html__(get_field('contact_city', $page_ID)); ?>
    </li>
</ul>