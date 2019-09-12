<?php
/**
 * The template part for displaying post
 *
 * @package VW School Education 
 * @subpackage vw_school_education
 * @since VW School Education 1.0
 */
?>

<?php
  $vw_school_education_toggle_postdate = get_theme_mod( 'vw_school_education_toggle_postdate' );
  if ( 'Disable' == $vw_school_education_toggle_postdate ) {
   $colmd = 'col-lg-12 col-md-12';
  } else { 
   $colmd = 'col-lg-10 col-md-10 pl-0';
  } 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="row m-0">
    <?php if ( 'Disable' != $vw_school_education_toggle_postdate ) {?>
      <div class="col-lg-2 col-md-2 pr-0">
        <div class="datebox">
          <div class="date-monthwrap">
             <span class="date-month"><?php echo esc_html( get_the_date( 'M' ) ); ?></span>
             <span class="date-day"><?php echo esc_html( get_the_date( 'd') ); ?></span>
          </div>
          <div class="yearwrap">
              <span class="date-year"><?php echo esc_html( get_the_date( 'Y' ) ); ?></span>
          </div>
        </div>
      </div>  
    <?php } ?>  
    <div class="<?php echo esc_html( $colmd ); ?>">
      <div class="post-main-box">
        <div class="box-image">
          <?php 
            if(has_post_thumbnail()) { 
              the_post_thumbnail(); 
            }
          ?>  
        </div>
        <h3 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>      
        <div class="new-text">
          <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_school_education_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_school_education_excerpt_number','30')))); ?></p>
        </div>
        <div class="content-bttn">
          <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right" title="<?php esc_attr_e( 'Read More', 'vw-school-education' ); ?>"><?php esc_html_e('Read More','vw-school-education'); ?><span class="screen-reader-text"><?php esc_html_e( 'Read More','vw-school-education' );?></span></a>
        </div>
      </div>
    </div>
  </div> 
</article>