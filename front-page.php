<?php
//display header
get_header();

//On the home page show get all categories(and preview 1 post from each category)
//On the home page you can either click on the preview post to show the single page
//or you can click on the category name(js, laravel, webd, etc) and that will show a page with the post related to each category
//then when on the category page you can click on the post to take you to that individual post(single page)
//

//get posts(photos)
$categories = get_categories();
//function for dumping raw content of a variable
//var_dump($categories);

/*
*******************************************************************************************************
Pin status bar to top of page when scrolling
intruduce a slightly transparent nav bar
improve color selections - jules says purple is too purple

improve opening dialog, like "im a front end developer"

bootstrap card are too boostrappy, maybe add some transparency and a bit of contrast

make resume less wordy

improve form css

add a photos section - photography
*******************************************************************************************************

*/
?>

<?php
//loop through the photos and display. 127
$background_img = wp_get_attachment_image_url(239, "full");
?>
<section id="hero" class="d-flex flex-column justify-content-center align-items-center" style="width: 100%; height: 100vh; background: url(<?=$background_img?>) top center; background-size: cover;">
    <div class="hero-container">
        <h1>Jacob Dixon</h1>
        <p>Please explore my latest projects as an upcoming Web Developer</p>
    </div>
</section><!--End Hero -->
<section class="dark">
	<div class="container py-4">
		<h1 class="h1 text-center" id="pageHeaderTitle">Most Recent Projects</h1>


    <?php
    foreach($categories as $category){
        $id = $category->term_id;
        $catergory_url = get_category_link( $id );
        $category_name = $category->name;
        

        if($category_name != "Uncategorized"){
            $args = array('posts_per_page' => 1,
		                  'cat' => $id,);
            $first_post = new WP_Query($args);
            
        ?>
            <div class="mb-5">

                    <div class="grow">
                        <a class="display-6 text-white fw-normal" href="<?=$catergory_url?>"> <?= $category_name?></a>
                        <div class="catcard__bar"></div>
                    </div>
                    
                <div>
                    <?php
                        if($first_post->have_posts()){
                            while($first_post->have_posts()){
                                $first_post->the_post();
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
                                                <a href="<?=$catergory_url?>" style="text-decoration:none"><i class="fas fa-tag mr-2"></i> <?= $category_name?></a>
                                            </li>
                                            <li class="tag__item play blue">
                                                <a href="<?=the_permalink();?>" style="text-decoration:none"><i class="fas fa-play mr-2"></i> Read More</a>
                                            </li>
                                        </ul>
                                    </div>
                                </article>
                                <?php
                            }
                            wp_reset_postdata();
                        }
                    ?>
        <?php
        }
    }

    ?>
   	</div>
</section> 
</div>

<?php
//display the footer
get_footer();
?>