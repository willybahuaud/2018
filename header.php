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
            $img = '<img src="https://2018.wptech.fr/wp-content/uploads/2018/03/wp-tech-logo-with-title.png" alt="WP Tech 2018"/>';
            //WPTECH<span>[2018]</span>
                $logo = is_front_page() ?
                '<div class="logo">' . $img . '</div>' :
                '<a class="logo" href="' . home_url( '/' ) . '">' . $img . '</a>';
                echo $logo;
            ?>
            <div class="slogan">
                <?php _e( 'L’unique événement WordPress technique annuel', 'dd8' ); ?><br/>
                <strong><?php _e( 'L’embarcadère, Lyon – 28 Avril 2018', 'dd8' ); ?></strong>
            </div>

            <a href="<?php echo get_permalink( get_option( 'tickets-page' ) ); ?>" class="cta"><span><?php _e( 'Acheter Billets', 'dd8' ); ?></span></a>
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
    
