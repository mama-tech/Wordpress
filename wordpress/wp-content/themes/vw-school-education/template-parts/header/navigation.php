<?php
  $vw_school_education_search_hide_show = get_theme_mod( 'vw_school_education_search_hide_show' );
  if ( 'Disable' == $vw_school_education_search_hide_show ) {
   $colmd = 'col-lg-9 col-md-9';
  } else { 
   $colmd = 'col-lg-8 col-md-8';
  } 
?>

<button class="toggleMenu toggle"><?php esc_html_e('Menu','vw-school-education'); ?></button>
<div id="header" class="menubar">
  <div class="container">
    <div class="row bg-home">
      <div class="<?php echo esc_html( $colmd ); ?>">
        <nav class="nav">
          <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
        </nav>
      </div>
      <div class="col-lg-3 col-md-3">
        <div class="socialbox">
          <?php dynamic_sidebar('social-icon') ?>
        </div>
      </div>
      <?php if ( 'Disable' != $vw_school_education_search_hide_show ) {?>
        <div class="search-box col-lg-1 col-md-1">
          <span><i class="fas fa-search"></i></span>
        </div>
      <?php } ?>
    </div>
    <div class="serach_outer">
      <div class="closepop"><i class="far fa-window-close"></i></div>
      <div class="serach_inner">
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</div>