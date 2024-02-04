<!-- wants a page here that shows the groupungs of post with the same category, this is for the assignment, same thing for tags-->
<?php
get_header();

    foreach((get_the_category()) as $category) {
    $category_name = $category->cat_name;
    }

    ?>
    <div class="mb-5">
        <div class="display-6 text-black fw-normal"> <?= $category_name?></div>
    </div>
    <?php
    
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        ?>
        <div class="mb-5">
            <div class="card" style="">
                <div class="row no-gutters">
                    <div class="col-sm-5">
                        <img class="card-img" src="<?=get_the_post_thumbnail_url($post,'large')?>">
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title"><?=the_title();?></h5>
                            <p class="card-text"><?=the_excerpt();?></p>
                            <a href="<?=the_permalink();?>" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endwhile;
endif;

get_footer();
?>