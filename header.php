<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
 
<body <?php body_class(); ?>>
<nav class="navbar navbar-expand-lg navbar-light mb-3">
  <div class="container">
    <a class="navbar-brand" href="<?= get_home_url() ?>"><?=get_bloginfo( "name" )?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php
            $menu_items = get_categories();

            foreach($menu_items as $menu_item)
            {
                if($menu_item->name != "Uncategorized")
                echo '<li><a class="nav-link" href="'.get_category_link( $menu_item ).'">'.$menu_item->name.'</a></li>';
            }
        ?>
      </ul>
    </div>
  </div>
</nav>
<div class="container mb-5">