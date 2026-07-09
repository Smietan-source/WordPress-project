<?php get_header() ?>

    <main>
        <section class="hero-section">
            <div class="company-name">
                <h2><?php bloginfo('name'); ?></h2>
            </div>
            <div class="learn-more">
                <span><?php echo get_theme_mod('tekst_span','tekst opisowy');?></span>
                <a href="<?php echo esc_url(get_theme_mod('tekst_url', 'https://docs.google.com/document/d/1AfUyAJkm1jm-uisPB6aj-pijKPDsOFuNQkj3OVCD-qs/edit?pli=1&tab=t.0#heading=h.yka2fqmw5hqs')); ?>">
                <?php echo esc_html(get_theme_mod('tekst_przycisku', 'Domyślny tekst linku')); ?>
                </a>
            </div>
        </section>

        <section class="posts-listing">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>

                        <h2 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <div class="post-meta">
                            <span class="post-author">Autor: <?php the_author(); ?></span> | 
                            <span class="post-date">Data: <?php echo get_the_date(); ?></span> | 
                            <span class="post-category">Kategorie: <?php the_category(', '); ?></span>
                        </div>

                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="read-more">
                            Czytaj więcej;
                        </a>

                    </article>

                <?php endwhile; ?>
            <?php else : ?>
                <p>Brak wpisów do wyświetlenia.</p>
            <?php endif; ?>
        </section>
    </main>

<?php get_footer() ?>