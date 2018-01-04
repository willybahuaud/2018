<?php
get_header();
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        vprintf( '<section class="image-article-wrapper">
            <div class="titre-single"><h1>%1$s</h1></div>
            %2$s
        </section>', array(
            the_title( '', '', false ),
            has_post_thumbnail() ? get_the_post_thumbnail( get_queried_object(), 'header-single' ) : '',
        ) );
        echo \DD8\share();
        echo '<div class="content-wrapper">';
        echo \DD8\get_metas( get_queried_object() );
        echo '<a class="link-to-comments" href="#👾">' . get_comments_number_text( '0<div>' . __( 'Commentaire', 'dd8' ) . '</div>', '1<div>' . __( 'Commentaire', 'dd8' ) . '</div>', '%<div>' . __( 'Commentaires', 'dd8' ) . '</div>' ) . '</a>';
        the_post_navigation( array(
            'prev_text'          => '<span>' . __( 'Précédent', 'dd8' ) . '</span><div>%title</div>',
            'next_text'          => '<span>' . __( 'Suivant', 'dd8' ) . '</span><div>%title</div>',
        ) );
        echo '<section class="text">';
        the_content();
        echo '</section>';
        echo '</div>';
        comments_template();

        echo \DD8\build_newsletter();
    }
}
get_footer();
