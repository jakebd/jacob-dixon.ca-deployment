<?php
//display header
get_header();

//On the home page show get all categories(and preview 1 post from each category)
//On the home page you can either click on the preview post to show the single page
//or you can click on the category name(js, laravel, webd, etc) and that will show a page with the post related to each category
//then when on the category page you can click on the post to take you to that individual post(single page)
//

//get posts(photos)
$photos = get_posts(array(
    'numberposts' => -1,
    'post_status' => 'publish',
    'oderby' => 'rand'
));
//function for dumping raw content of a variable
//var_dump($photos);
?>
<div class="pin-container">

<?php
//loop through the photos and display. 


foreach($photos as $photo){
    $id = $photo->ID;
    $author_id=$photo->post_author;

    $photo_src = get_the_post_thumbnail_url( $id, 'large' );//large
    $post_url = get_permalink( $id );
    $author_name = get_the_author_meta( 'display_name', $author_id );
    $avatar_src = get_avatar_url( $author_id );
    ?>
    <div class="pin-box">
        <a href="<?= $post_url ?>"></a>
        <img src="<?= $photo_src ?>">
        <div class="pin-caption">
            <img src="<?= $avatar_src ?>">
            <div><?= $author_name ?></div>
        </div>  
    </div>
    <?php
}
?>
<!-- Close the pin-container -->
</div>


<?php
//display the footer
get_footer();
?>