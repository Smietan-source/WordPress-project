<?php get_header(); ?>

<main class="site-main-archive-opinions">

  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      
      <article class="opinions-archive-posts">

        <div class="opinions-archive-posts-box1">
            <h2><?php the_title(); ?></h2>
            <div class="opinions-archive-posts-box2"><?php the_content(); ?></div>
        </div>
        
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-archive-opinions-image">
              <?php the_post_thumbnail('small'); ?>
            </div>
          <?php endif; ?>
      </article>

    <?php endwhile; ?>

  <?php else : ?>
    <p>Brak wpisów w tym archiwum.</p>
  <?php endif; ?>

</main>

<?php get_footer(); ?>