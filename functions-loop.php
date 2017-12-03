<?php

namespace DD8;

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

add_filter( 'the_content', '\DD8\content_filter' );
function content_filter( $content ) {
	if ( ( is_page() || is_single() ) && is_main_query() && $blocs = get_post_meta( get_queried_object_id(), 'blocs', true ) ) {
		remove_filter( 'the_content', '\DD8\content_filter' );
		if ( is_page() ) {
			$content = '';
		} else {
			$content .= '</div></div>';
		}
		foreach ( $blocs as $k => $bloc ) {
			$content .= call_user_func_array( "\DD8\build_{$bloc}", array(
				'i'  => $k,
				'id' => get_queried_object_id(),
			) );
		}
	} elseif ( ( is_home() || is_category() || is_archive() ) && is_main_query() ) {
		global $post;
		$excerpt_length = 40;
		$content = vsprintf( '<div class="actu">
			%1$s<a href="%3$s" class="link"><h3><span>%2$s</span></h3></a>
			%4$s
			<div class="texte">%5$s<div data-more="%6$s"></div></div>
		</div>', array(
			get_the_post_thumbnail( $post, 0 === $k ? 'post-0' : 'post-1' ),
			get_the_title( $post ),
			get_permalink( $post ),
			get_metas( $post ),
			( ! empty( $post->post_excerpt ) ?
				wp_trim_words( $post->post_excerpt, $excerpt_length, '&nbsp;[…]' ) :
				wp_trim_words( $post->post_content, $excerpt_length, '&nbsp;[…]' ) ),
			__( 'En savoir plus', 'dd8' ),
		) );
	}
	return $content;
}

add_action( 'loop_start', '\DD8\willy_loop_start' );
function willy_loop_start() {
	if ( is_page() && ! is_front_page() ) {
		vprintf( '<section class="image-article-wrapper">
            <div class="titre-single"><h1>%1$s</h1></div>
            %2$s
        </section>', array(
            the_title( '', '', false ),
            has_post_thumbnail() ? get_the_post_thumbnail( get_queried_object(), 'header-single' ) : '',
        ) );
	}
	$news_id = get_option( 'page_for_posts' );
	if ( is_home() ) {
		vprintf( '<section class="image-article-wrapper">
            <div class="titre-single"><h1>%1$s</h1></div>
            %2$s
        </section>', array(
            get_the_title( $news_id ),
            has_post_thumbnail() ? get_the_post_thumbnail( $news_id, 'header-single' ) : '',
        ) );
		echo '<section class="large block-sidebar-wrapper"><div class="actus with-sidebar">';	
	} elseif ( is_category() ) {
		vprintf( '<section class="image-article-wrapper">
            <div class="titre-single"><h1>%1$s</h1></div>
            %2$s
        </section>', array(
            single_cat_title( '', false ),
            has_post_thumbnail() ? get_the_post_thumbnail( $news_id, 'header-single' ) : '',
        ) );
		echo '<section class="large block-sidebar-wrapper"><div class="actus with-sidebar">';	
	}
}

add_action( 'loop_end', '\DD8\willy_loop_end' );
function willy_loop_end() {
	if ( is_home() || is_category() ) {
		echo '</div>';
		if ( is_active_sidebar( 'main-sidebar' ) ) {
			echo '<aside class="sidebar"><ul>';
			dynamic_sidebar( 'main-sidebar' );
			echo '</ul></aside>';
		}
		echo '</section>';
	}
}

function build_texte( $i, $id ) {
	$texte = get_post_meta( $id, "blocs_{$i}_texte", true );
	return vsprintf( '<div class="content-wrapper content-wrapper-page"><div class="text">%s</div></div>', array(
		apply_filters( 'the_content', wp_kses_post( $texte ) ),
	) );
}

function build_testimoniaux( $i, $id ) {
	$titre = get_post_meta( $id, "blocs_{$i}_titre", true );
	$count = get_post_meta( $id, "blocs_{$i}_temoignages", true );
	$temoignages = [];
	for ( $j = 0; $j < $count; $j++ ) {
		$nom   = get_post_meta( $id, "blocs_{$i}_temoignages_{$j}_nom", true );
		$role  = get_post_meta( $id, "blocs_{$i}_temoignages_{$j}_role", true );
		$photo = get_post_meta( $id, "blocs_{$i}_temoignages_{$j}_photo", true );
		$texte = get_post_meta( $id, "blocs_{$i}_temoignages_{$j}_texte", true );
		$temoignages[] = vsprintf( '<div class="temoignage">
		<div><h3 class="temoignage-nom">%1$s</h3>
		<div><span class="temoignage-role">%2$s</span></div>
		<div class="texte">%4$s</div></div>
		%3$s
		</div>', array(
			$nom,
			$role,
			( $photo ? wp_get_attachment_image( $photo, 'portrait-' . ( $j % 2 ), '', array( 'class' => 'portrait to-glitch' ) ) : '' ),
			wpautop( wp_kses_post( $texte ) ),
		) );
	}
	$out = vsprintf( '<section id="description" class="temoignages-wrapper large">%1$s<div class="temoignages">%2$s</div></section>', array(
		$titre ? '<h2 class="titre">' . wp_kses_post( nl2br( $titre ) ) . '</h2>' : '',
		implode( PHP_EOL, $temoignages ),
	) );
	return $out;
}

function build_appel_a_action( $i, $id ) {
	$lien = get_post_meta( $id, "blocs_{$i}_lien", true );
	$titre = get_post_meta( $id, "blocs_{$i}_titre", true );
	$out = vsprintf( '<section id="" class="impact inner"><div class="large">
		%1$s
		<div class="important"><p>%2$s</p><div><a class="cta" href="%4$s" target="%5$s">%3$s</a></div></div>
		</div></section>', array(
			$titre ? '<h2 class="titre">' . wp_kses_post( nl2br( $titre ) ) . '</h2>' : '',
			wp_kses_post( nl2br( get_post_meta( $id, "blocs_{$i}_phrase", true ) ) ),
			( $lien ? esc_html( $lien['title'] ) : '' ),
			( $lien ? esc_attr( $lien['url'] ) : '' ),
			( ! empty( $lien['target'] ) ? esc_attr( $lien['target'] ) : 'self' ),
		) );
	return $out;
}

function build_actualites( $i, $id ) {
	$titre = get_post_meta( $id, "blocs_{$i}_titre", true );
	$posts = get_posts( array(
		'post_type'        => 'post',
		'post_status'      => 'publish',
		'posts_per_page'   => 3,
		'suppress_filters' => false,
	) );
	$actus = [];
	if ( ! empty( $posts ) ) {
		foreach ( $posts as $k => $post ) {
			$excerpt_length = 0 === $k ? 60 : 15;
			$actus[] = vsprintf( '<div class="actu">
				%1$s<a href="%3$s" class="link"><h3><span>%2$s</span></h3></a>
				%4$s
				<div class="texte">%5$s<div data-more="%6$s"></div></div>
			</div>', array(
				get_the_post_thumbnail( $post, 0 === $k ? 'post-0' : 'post-1' ),
				get_the_title( $post ),
				get_permalink( $post ),
				( 0 === $k ? get_metas( $post ) : '' ),
				( ! empty( $post->post_excerpt ) ?
					wp_trim_words( $post->post_excerpt, $excerpt_length, '&nbsp;[…]' ) :
					wp_trim_words( $post->post_content, $excerpt_length, '&nbsp;[…]' ) ),
				__( 'En savoir plus', 'dd8' ),
			) );
		}
	}
	$out = vsprintf( '<section id="actualites" class="actus large">%1$s%2$s</section>', array(
		$titre ? '<h2 class="titre">' . wp_kses_post( nl2br( $titre ) ) . '</h2>' : '',
		implode( PHP_EOL, $actus ),
	) );
	return $out;
}

function build_newsletter( $i = null, $id = null ) {
	$titre = get_post_meta( $id, "blocs_{$i}_titre", true );
	$intro = get_post_meta( $id, "blocs_{$i}_intro", true );
	$out = vsprintf( '<section id="" class="social"><div class="large">
		%1$s
		<div class="newsletter-form">%2$s<p></p>
		<form class="form">
		<fieldset class="myset">
		<input type="text" name="email-newsletter" id="email-newsletter" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$">
		<label>%3$s</label>
		</fieldset>
		<button type="submit">%4$s</button>
		</form></div>
		</div></section>', array(
			$titre ? '<h2 class="titre">' . esc_html( $titre ) . '</h2>' : '',
			$intro ? '<p>' . wp_kses( $intro, array( 'br' => true, 'a' => true ) ) . '</p>' : '',
			esc_html__( 'Votre email', 'dd8' ),
			esc_html__( 'Je m’abonne', 'dd8' ),
		) );
	return $out;
}

function build_services( $i, $id ) {
	$count = get_post_meta( $id, "blocs_{$i}_services", true );
	$services = [];
	for ( $j = 0; $j < $count; $j++ ) {
		$icon = get_post_meta( $id, "blocs_{$i}_services_{$j}_icone", true );
		$services[] = vsprintf( '<div class="service"><h3 class="titre-secondaire">%2$s%1$s</h3>%3$s</div>', array(
			esc_html( get_post_meta( $id, "blocs_{$i}_services_{$j}_titre", true ) ),
			( $icon ? wp_get_attachment_image( $icon, 'full', '', array( 'class' => 'svg-picto' ) ) : ''),
			wpautop( wp_kses_post( get_post_meta( $id, "blocs_{$i}_services_{$j}_description", true ) ) ),
		) );
	}
	$out = vsprintf( '<section id="description" class="description large"><h2 class="titre">%1$s</h2>%2$s</section>', array(
		wp_kses_post( nl2br( get_post_meta( $id, "blocs_{$i}_titre", true ) ) ),
		implode( PHP_EOL, $services ),
	) );
	return $out;
}

function build_encart_accueil( $i, $id ) {
	$image = get_post_meta( $id, "blocs_{$i}_image", true );
	$titre = get_post_meta( $id, "blocs_{$i}_titre", true );
	$bline = get_post_meta( $id, "blocs_{$i}_baseline", true );
	$emphs = get_post_meta( $id, "blocs_{$i}_emphase", true );

	$out = vsprintf( '<section class="image-full-wrapper">%1$s
		<div class="hgroup">
			<h1>%2$s</h1>
			<div class="baseline">%3$s</div>
			<div class="emphase"><span>%4$s</span></div>
		</div>
		</section>', array(
			( $image ? wp_get_attachment_image( $image, 'header', '', array( 'class' => 'image-full' ) ) : '' ),
			esc_html( $titre ),
			( $bline ? wp_kses_post( nl2br( $bline ) ) : '' ),
			( $emphs ? wp_kses_post( nl2br( $emphs ) ) : '' ),
		) );
	

	$counters = [];
	$count = get_post_meta( $id, "blocs_{$i}_compteurs", true );
	for ( $j = 0; $j < $count; $j++ ) {
		$desc = get_post_meta( $id, "blocs_{$i}_compteurs_{$j}_description", true );
		$desc = array_map( 'esc_html', explode( PHP_EOL, $desc ) );
		$counters[] = vsprintf( '<div class="counter"><div data-amount="%1$d" class="amount">%1$d</div><span>%2$s</span></div>', array(
			esc_attr( get_post_meta( $id, "blocs_{$i}_compteurs_{$j}_nombre", true ) ),
			'<i>' . implode( '</i><i>', $desc ) . '</i>',
		) );
	}
	$out .= '<section class="loader inner"><div class="counters large">' . implode( $counters ) . '</div><hr></section>';
	return $out;
}

function get_metas( $post = null ) {
	$author = get_the_author_meta( 'display_name', $post->author );
	if ( $url = get_the_author_meta( 'url', $post->author ) ) {
		$author = sprintf( '<a href="%s">%s</a>', $url, $author );
	}
	return '<div class="metas">' . sprintf( __( 'par %s', 'dd8' ), $author ) .
	'<span class="pipe"></span>' . get_the_category_list( ',', '', $post->ID ) .
	'<span class="pipe"></span>' . date_i18n( 'M d, Y, H:i', strtotime( $post->post_date ) ) . '</div>';
}

function share() {
	return vsprintf( '<div class="share">
	<button type="button" data-url="https://facebook.com/sharer.php?u=%2$s"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48"><title>Facebook</title><g fill="none"><g fill="#4829A1"><path d="M25.6 48L2.6 48C1.2 48 0 46.8 0 45.4L0 2.6C0 1.2 1.2 0 2.6 0L45.4 0C46.8 0 48 1.2 48 2.6L48 45.4C48 46.8 46.8 48 45.4 48L33.1 48 33.1 29.4 39.4 29.4 40.3 22.2 33.1 22.2 33.1 17.5C33.1 15.4 33.7 14 36.7 14L40.5 14 40.5 7.5C39.9 7.4 37.6 7.2 35 7.2 29.4 7.2 25.6 10.6 25.6 16.8L25.6 22.2 19.4 22.2 19.4 29.4 25.6 29.4 25.6 48 25.6 48Z"/></g></g></svg></button>
	<button type="button" data-url="https://twitter.com/intent/tweet?url=%2$s"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 48 40"><title>Twitter</title><g fill="none"><g fill="#4829A1"><path d="M48 4.7C46.2 5.5 44.3 6.1 42.3 6.3 44.4 5.1 45.9 3.1 46.7 0.7 44.8 1.9 42.7 2.7 40.4 3.2 38.6 1.2 36.1 0 33.2 0 27.8 0 23.4 4.5 23.4 10.1 23.4 10.9 23.5 11.7 23.6 12.4 15.5 12 8.2 8 3.3 1.8 2.5 3.3 2 5.1 2 6.9 2 10.4 3.7 13.5 6.4 15.3 4.8 15.3 3.3 14.8 1.9 14.1L1.9 14.2C1.9 19.1 5.3 23.2 9.8 24.1 9 24.3 8.1 24.5 7.2 24.5 6.6 24.5 6 24.4 5.4 24.3 6.6 28.3 10.3 31.2 14.6 31.3 11.2 34 7 35.6 2.3 35.6 1.6 35.6 0.8 35.6 0 35.5 4.4 38.3 9.5 40 15.1 40 33.2 40 43.1 24.6 43.1 11.3 43.1 10.8 43.1 10.4 43.1 10 45 8.5 46.7 6.8 48 4.7"/></g></g></svg></button>
	<span>%1$s</span>
	</div>', array(
		__( 'Partager sur', 'dd8' ),
		urlencode( get_permalink( get_queried_object() ) ),
	) );
}
