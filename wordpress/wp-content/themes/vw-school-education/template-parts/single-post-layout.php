<?php
/**
 * The template part for displaying post
 *
 * @package VW School Education
 * @subpackage vw-school-education
 * @since VW School Education 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="content-vw">
        <div class="metabox">
            <?php if(get_theme_mod('vw_school_education_toggle_postdate',true)==1){ ?>
                <span><i class="fas fa-calendar-alt"></i><?php echo get_the_date(); ?></span>
            <?php } ?>

            <?php if(get_theme_mod('vw_school_education_toggle_author',true)==1){ ?>
                <span><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
            <?php } ?>

            <?php if(get_theme_mod('vw_school_education_toggle_comments',true)==1){ ?>
                <span><i class="fas fa-comments"></i> <?php comments_number( '0 Comments', '0 Comments', '% Comments' ); ?> </span>
            <?php } ?>
        </div>
    </div>
    <?php if(has_post_thumbnail()) { ?>
        <div class="feature-box">   
            <?php the_post_thumbnail(); ?>
        </div>
    <?php } ?>
    <h3><?php the_title();?></h3>
    <?php the_content(); ?>
    <?php the_tags(); ?>
        <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
        comments_template();

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'vw-school-education' ),
            ) );
        } elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'vw-school-education' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'vw-school-education' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'vw-school-education' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-school-education' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );
        }
    ?>
</article>