<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <!--<link id="theme-style" rel="stylesheet" href="pillar-1.css">
    <script defer src="assets/fontawesome/js/all.min.js"></script> -->
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
 
<body <?php body_class(); ?>>
<nav class="navbar fixed-top navbar-expand-lg navbar-light">
  <div class="container">
    <a class="navbar-brand" href="<?= get_home_url() ?>"><?=get_bloginfo( "name" )?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php 

            wp_nav_menu(array( 'container_class' => 'main-nav', 'theme_location' => 'primary' ));

        ?>
      </ul>
    </div>
  </div>
</nav>

