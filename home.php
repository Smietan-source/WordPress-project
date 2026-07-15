<?php get_header(); ?>

<section class="blog_categories">

    <form method="GET" action="<?php echo esc_url( get_post_type_archive_link( 'blog' ) ); ?>" class="blog-filter-form">
        
        <?php
        wp_dropdown_categories( array(
            'show_option_all' => 'Kategorie postów',
            'taxonomy'        => 'category',
            'name'            => 'category',
            'value_field'     => 'slug',
            'selected'        => isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '',
        ) );
        ?>

        <button type="submit">Filtruj</button>
    </form>

</section>

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
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div><?php the_excerpt(); ?></div>
      </article>

    <?php endwhile; ?>

    <?php the_posts_navigation(); ?>

  <?php else : ?>
    <p>Brak wpisów w tym archiwum.</p>
  <?php endif; ?>

</main>

<?php get_footer(); ?>