<?php
get_header();
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        //the_post_thumbnail();
        the_title();
        the_author();
        the_content();
    endwhile;
endif;
get_footer();
?>