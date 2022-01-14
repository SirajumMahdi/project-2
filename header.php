<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TukiTwo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!--====== Header part start ======-->
    <header class="sticky-header">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between">
                <div class="site-logo">
                    <?php 
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );?>

                    <a href="<?php echo site_url();?>">
                        <?php 
                            if ( has_custom_logo() ) {
                                echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . esc_html( get_bloginfo('name') ) . '">';
                            } else {
                                echo '<h1>' . esc_html__( get_bloginfo('name') ) . '</h1>', 'tukitwo';
                            }
                        ?>
                    </a>
                </div>
                <div class="header-right">
                    <div class="search-area">
                        <a href="javascript:void(0)" class="search-btn"><i class="fas fa-search"></i></a>
                        <div class="search-form">
                            <a href="#" class="search-close"><i class="fal fa-times"></i></a>
                            <form action="#">
                                <input type="text" placeholder="Type here to search" aria-label="Search" name="s">
                            </form>
                            <div class="search-overly"></div>
                        </div>
                    </div>

                    <div class="offcanvas-panel">
                        <a href="javascript:void(0)" class="panel-btn">
                            <span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </a>
                        <div class="panel-overly"></div>
                        <div class="offcanvas-items">
                            <!-- Navbar Toggler -->
                            <a href="javascript:void(0)" class="panel-close">
                                <?php echo esc_html__('Back', 'tukitwo');?> <i class="fa fa-angle-right"
                                    aria-hidden="true"></i>
                            </a>
                            <?php 
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'primary-menu',
                                    'menu_class'        => 'offcanvas-menu',
                                )
                            );
                            ?>
                            <div class="social-icons">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--====== Header part end ======-->