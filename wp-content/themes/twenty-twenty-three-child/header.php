<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <link rel="icon" type="image/png" href="img/fav-icon.png">
    <title><?php echo get_bloginfo('name');?></title>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header>
    <div class="top_headbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-5 col-lg-3 col-xl-3">
            <?php
              $header_logo = get_option("header_logo");
              $logo_alt = get_image_alt_by_url($header_logo);
            ?>
            <div class="main_logo_sec">
              <a class="navbar-brand" href="<?php echo site_url();?>">
                <img src="<?php echo $header_logo;?>" alt="<?php echo $logo_alt;?>"/>
              </a>
            </div>
          </div>
          <div class="col-sm-12 col-md-7 col-lg-9 col-xl-9">
            <?php dynamic_sidebar( 'top-header-bar-1' ); ?>
          </div>
        </div>
      </div>
    </div>
    
    <div class="header_mainsec">
      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <a style="display: none;" class="navbar-brand" href="index.html"><img src="img/main-logo.png" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
            <?php
              wp_nav_menu( array(
                'theme_location' => 'header_menu',
                'menu_class' => 'navbar-nav',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'navbarSupportedContent'
                )
              );
              ?>
        </nav>
      </div>
    </div>
  </header>