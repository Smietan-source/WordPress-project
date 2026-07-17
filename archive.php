<?php get_header(); ?>

<main class="site-main">
  <?php if ( have_posts() ) : ?>

    <header class="page-header">
      <?php
        the_archive_title( '<h1 class="page-title">', '</h1>' );
        the_archive_description( '<div class="archive-description">', '</div>' );
      ?>
    </header>

    <?php while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>">
        <h2><a href="<?php echo esc_url( the_permalink() ); ?>"><?php echo esc_html( the_title() ); ?></a></h2>
        <div><?php the_excerpt(); ?></div>
      </article>

    <?php endwhile; ?>

    <?php the_posts_navigation(); ?>

  <?php else : ?>
    <p>Brak wpisów w tym archiwum.</p>
  <?php endif; ?>

</main>

<?php get_footer(); ?>