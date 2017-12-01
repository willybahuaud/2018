<section id="👾" class="full comments">
    <?php if ( have_comments() ) { ?>
        <div class="large entete-commentaires">
            <div class="titre-comment"><?php comments_number( 'Aucun Commentaire', '1 Commentaire', '% Commentaires' ); ?></div>
            <a href="#✉️" class="new-comment-link"><?php _e( 'Écrire un commentaire'); ?></a>
        </div>
        <ul>
    <?php
        wp_list_comments( array( 'avatar_size' => 60 ) );
        echo '</ul>';
    }
    ?>
    <div id="✉️" class="new-comment-section"><div class="large">
    <?php comment_form( array(
        'title_reply'  => __( 'Écrire un commentaire', 'dd8' ),
        'label_submit' => __( 'Envoyer', 'dd8' ),
    ) ); ?>
    </div></div>
</section>