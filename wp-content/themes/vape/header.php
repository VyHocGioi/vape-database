<?php

/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage One Page
 * @since Lotus 999
 */
$gp_options = get_option('gp_options');
?>
<!DOCTYPE html>
<!--[if IE 8]>
<html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]>
<html <?php language_attributes(); ?>> <![endif]-->

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $gp_options['gp-icon-favicon']['url']; ?>">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
    global $vape;
    ?>
    <!-- get_field('notification')  -->
    <div class="overlay"></div>

    <header class="header p-0 m-0" id="header">
        <div class="bg-dark">
            <div class="header__top">
                <div class="text-center text-white p-1">
                    <?php
                    global $vape_options;
                    echo $vape_options['otp-textarea']; ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="header__main">
                <div class="row justify-content-between align-items-center py-md-4 py-1">
                    <div class="col-lg-3 col-4">
                        <div class="block-logo">
                            <?php $url_home = home_url(); ?>
                            <a href="<?php echo $url_home; ?>">
                                <?php $custom_logo_id = get_theme_mod('custom_logo');
                                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                                if (has_custom_logo()) {
                                    echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
                                } else {
                                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                                } ?>
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-6 column-navbar d-flex justify-content-center">
                        <div class="block-menu-header" id="block-menu-header">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'menu_main',
                                'container' => 'ul',
                                'menu_class'     => 'nav',
                                'menu_id'   => 'main-menu',
                                'add_li_class' => 'nav-item',
                                'add_a_class' => 'nav-link',

                            ));
                            ?>

                        </div>
                    </div>
                    <div class="col-lg-3 col-8">
                        <div class="block-button d-flex justify-content-end align-items-center">
                            <a href="#"><button class="btn button__signin" id="btnsignin">
                                    Sign in
                                </button></a>
                            <a href="#"><button class="btn text-white button__signup">
                                    Sign up
                                </button></a>
                            <button type="button" class="btn button-toggle" id="button-toggle">
                                <img src="<?php echo THEME; ?>/images/hamburger.svg" alt="" class="img-fluid" />
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>