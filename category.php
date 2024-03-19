<!-- wants a page here that shows the groupungs of post with the same category, this is for the assignment, same thing for tags-->
<?php
get_header();
?>
<div class="container mt-3 mb-5 ps-5 pe-5">

<?php
    foreach((get_the_category()) as $category) {
    $category_name = $category->cat_name;
    }

    ?>
    <section class="dark">
	<div class="container py-4">
		<h1 class="h1 text-center" id="pageHeaderTitle"><?= $category_name?></h1>
    <?php
    
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        ?>
        <article class="postcard dark blue">
            <a class="postcard__img_link" href="<?=the_permalink();?>">
                <img class="postcard__img" src="<?=get_the_post_thumbnail_url($post,'large')?>" alt="Image Title" />
            </a>
            <div class="postcard__text">
                <h1 class="postcard__title blue"><a href="<?=the_permalink();?>"><?=the_title();?></a></h1>

                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt"><?=the_excerpt()?></div>
                <ul class="postcard__tagbox">
                    <li class="tag__item"><i class="fas fa-newspaper mr-2"></i> Post</li>
                    <li class="tag__item"><i class="fas fa-clock mr-2"></i> 5 mins</li>
                    <li class="tag__item play blue">
                        <a href="<?=$catergory_url?>"><i class="fas fa-tag mr-2"></i> <?= $category_name?></a>
                    </li>
                    <li class="tag__item play blue">
                        <a href="<?=the_permalink();?>"><i class="fas fa-play mr-2"></i> Read More</a>
                    </li>
                </ul>
            </div>
        </article>
        <?php
    endwhile;
endif;
?>
</section> 
</div>
<?php
get_footer();
?>