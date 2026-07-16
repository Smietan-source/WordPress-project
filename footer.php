<footer class="site-footer">
<?php
$logoSrc = get_field('footer_image', 'options');
echo "<img src='" . $logoSrc . "' alt='logo' >";
the_field('footer_text', 'options');
?>
<div class="social-media-footer">
<?php
if ( have_rows('social_media', 'options') ) :
    while ( have_rows('social_media', 'options') ) : the_row();    
?>
        <div class="item-social">
            <ul>
                <?php
                $social_media_image = get_sub_field('social_media_image');
                $social_media_url = get_sub_field('social_media_url');
                 if(isset($social_media_image) && isset($social_media_url)){
                    echo "<li> <a href='". esc_url($social_media_url) ."'> <img src='" . esc_url($social_media_image) . "' alt='social media image' > </a> </li>";
                 } 
                ?>
            </ul>
        </div>
<?php
    endwhile;
else :
    echo "No content found";
endif;
?>
 </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>