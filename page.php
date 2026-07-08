<?php get_header() ?>


<?php
    while(have_posts()){
        the_post(); ?>
        <div class="x">
            <p>This is a page, not a post</p>
            <h2>
                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>    
            </h2>
            <div class="content">
                <?php the_content() ?>
            </div>
        </div>
    <?php }
?>

<?php get_footer() ?>