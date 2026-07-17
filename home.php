<?php get_header(); ?>

<section class="blog_categories">

    <form method="GET" action="<?php echo esc_url( home_url( '/' . $wp->request ) ); ?>" class="blog-filter-form">
        
        <?php
        wp_dropdown_categories( array(
            'show_option_all' => 'Wszystkie posty',
            'taxonomy'        => 'category',
            'name'            => 'category_name', 
            'id'              => 'blog-category-dropdown',
            'value_field'     => 'slug',
            'selected'        => isset($_GET['category_name']) ? sanitize_text_field($_GET['category_name']) : '',
        ) );
        ?>

        <button type="submit">Filtruj</button>
    </form>

</section>

<main class="site-main">

  <?php 
  $selected_category = isset($_GET['category_name']) ? sanitize_text_field($_GET['category_name']) : '';

  $args = array(
      'post_type'      => 'post',
      'posts_per_page' => 99,
      'paged'          => max( 1, get_query_var( 'paged' ), get_query_var( 'page' ) ),
  );

  if ( ! empty( $selected_category ) && $selected_category !== '0' ) {
      $args['category_name'] = $selected_category;
  }

  $blog_query = new WP_Query( $args );
  ?>

  <?php if ( $blog_query->have_posts() ) : ?>

    <header class="page-header">
      <h1 class="page-title">
        <?php 
        if ( ! empty( $selected_category ) && $selected_category !== '0' ) {
            $category = get_term_by( 'slug', $selected_category, 'category' );
            echo 'Kategoria: ' . esc_html( $category->name );
        } else {
            echo 'Blog';
        }
        ?>
      </h1>
    </header>

    <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>

      <article id="post-<?php the_ID(); ?>">
        <h2><a href="<?php echo esc_url( the_permalink() ); ?>"><?php esc_html( the_title() ); ?></a></h2>
        <div><?php the_excerpt(); ?></div>
      </article>

    <?php endwhile; ?>

  <?php else : ?>
    <p>Brak wpisów w wybranej kategorii.</p>
  <?php endif; ?>

</main>

<?php get_footer(); ?>