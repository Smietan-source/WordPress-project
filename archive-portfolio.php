<?php get_header(); ?>

<section class="archive_categories">

    <form method="GET" action="<?php echo esc_url( get_post_type_archive_link( 'portfolio' ) ); ?>" class="portfolio-filter-form">
        
        <?php
        wp_dropdown_categories( array(
            'show_option_all' => 'Wszystkie lokalizacje',
            'taxonomy'        => 'lokalizacja',
            'name'            => 'f_lokalizacja',
            'value_field'     => 'slug',
            'selected'        => isset($_GET['lokalizacja']) ? sanitize_text_field($_GET['lokalizacja']) : '',
        ) );
        ?>

        <?php
        wp_dropdown_categories( array(
            'show_option_all' => 'Wszystkie kategorie usług',
            'taxonomy'        => 'kategorie-produktow',
            'name'            => 'f_kategorie_produktow',
            'value_field'     => 'slug',
            'selected'        => isset($_GET['kategoria_uslug']) ? sanitize_text_field($_GET['kategoria_uslug']) : '',
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