<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="header-wrapper" class="header-wrapper">
    <div class="inner">
        <div class="headline large">
            <?php
                $logo = is_front_page() ?
                '<div class="logo">WPTECH<span>[2018]</span></div>' :
                '<a class="logo" href="' . home_url( '/' ) . '">WPTECH<span>[2018]</span></a>';
                echo $logo;
            ?>
            <div class="slogan">
                L’unique événement WordPress technique annuel<br/>
                <strong>L’embarcadère, Lyon – 28 Avril 2018</strong>
            </div>

            <a href="<?php echo get_permalink( get_option( 'tickets-page' ) ); ?>" class="cta"><span>Acheter Billets</span></a>
        </div>
        <hr>
        <?php
        wp_nav_menu( array(
			'theme_location'  => 'main-menu',
			'container'       => 'nav',
			'container_id'    => 'main-menu',
			'menu_class'      => 'menu large',
			'container_class' => '',
		) );
        ?>
    </div>
</header>
    
