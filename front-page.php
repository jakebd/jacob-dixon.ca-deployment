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
?>

<?php
//loop through the photos and display. 
?>
<div class="grid-container">
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
                        <a class="display-6 text-black fw-normal" href="<?=$catergory_url?>"> <?= $category_name?></a>
                    </div>

                <div>
                    <?php
                        if($first_post->have_posts()){
                            while($first_post->have_posts()){
                                $first_post->the_post();
                                ?>


                                <div class="card" style="">
                                    <div class="row no-gutters">
                                        <div class="col-sm-5">
                                            <img class="card-img" src="<?=get_the_post_thumbnail_url($post,'large')?>">
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <h3 class="card-title"><?=the_title();?></h3>
                                                <h5 class="card-text"><?=the_excerpt();?></h5>
                                                <a href="<?=the_permalink();?>" class="stretched-link"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            wp_reset_postdata();
                        }
                    ?>
                </div>
            </div>
        <?php
        }
    }

    ?>
    
</div>


<?php
//display the footer
get_footer();
?>