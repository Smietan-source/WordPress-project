<?php get_header(); ?>

<main class="site-main-archive">

  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      
      <article class="team-archive-posts">

        <div class="team-archive-posts-box1">
          <h2><?php echo esc_html( the_title() ); ?></h2>
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-archive-team-image">
              <?php the_post_thumbnail('small'); ?>
            </div>
          <?php endif; ?>
        </div>
        
        <div class="team-archive-posts-box2"><?php the_content(); ?></div>
        
      </article>

    <?php endwhile; ?>

  <?php else : ?>
    <p>Brak wpisów w tym archiwum.</p>
  <?php endif; ?>

</main>

<?php get_footer(); ?>