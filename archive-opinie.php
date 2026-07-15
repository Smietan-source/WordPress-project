<?php get_header(); ?>

<main class="site-main-archive-opinions">

  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      
      <?php if ( have_rows('pictures_to_thing') ) : ?>
        <?php while ( have_rows('pictures_to_thing') ) : the_row(); ?>
        
          <?php 
          $num_stars = get_sub_field('num_stars'); 
          $picture_description = get_sub_field('opinion_description'); 
          ?>

          <article class="opinions-archive-posts">
            <div class="opinions-archive-posts-box1">
                <h2><?php the_title(); ?></h2>
                
                <?php if ( $picture_description ) : ?>
                    <div class="opinions-archive-posts-box2"><?php echo wp_kses_post($picture_description); ?></div>
                <?php endif; ?>
            </div>

            <?php if ( $num_stars ) : ?>
                <div class="post-archive-opinions-image">
                  <?php 
                  if ( is_array($num_stars) ) {
                      echo '<img src="' . esc_url($num_stars['sizes']['thumbnail']) . '" alt="' . esc_attr($num_stars['alt']) . '" />';
                  } 
                  elseif ( is_numeric($num_stars) ) {
                      echo wp_get_attachment_image($num_stars, 'thumbnail');
                  } 
                  else {
                      echo '<img src="' . esc_url($num_stars) . '" alt="Opinia obrazek" />';
                  }
                  ?>
                </div>
            <?php endif; ?>
          </article>

        <?php endwhile; ?>
      <?php endif; ?>

    <?php endwhile; ?>
  <?php else : ?>
    <p>Brak wpisów.</p>
  <?php endif; ?>

</main>

<?php get_footer(); ?>