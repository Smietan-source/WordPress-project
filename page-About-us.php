<?php get_header(); ?>

    <main class="site-main">

        <section class="ad-section">
            <div class="ad">
                <img src="<?php echo esc_url( get_theme_mod( 'obrazek_ad_content', '' ) ); ?>" alt="<?php echo esc_attr( get_theme_mod( 'alt_obrazek_ad_content', 'Przykladowe alt obrazka' ) ); ?>">
                <div class="ad_content">
                    <h2><?php echo esc_html( get_theme_mod( 'naglowek_ad_content', 'Przykładowy nagłowek' ) ); ?></h2>
                    <span><?php echo esc_html( get_theme_mod( 'tekst_ad_content', 'Przykladowy tekst' ) ); ?></span>
                    <a href="<?php echo esc_url( get_theme_mod( 'tekst_url_przycisku_ad_content', '' ) ); ?>">
                        <?php echo esc_html( get_theme_mod( 'tekst_przycisku_ad_content', 'Przykladowy tekst przycisku' ) ); ?>
                    </a>
                </div>
            </div>
        </section>

        <section class="about-us-section">
            <?php if( have_posts() ) :  ?>
                <?php while ( have_posts() ): the_post(); ?>

                    <div class="about-us_content">
                        <h3><?php the_title(); ?></h3>
                        <span><?php the_content(); ?></span>
                    </div>

                <?php endwhile ?>
            <?php else : ?>
                <p>Brak tresci do wyswietlenia</p>
            <?php endif; ?>
        </section>
    </main>

<?php get_footer(); ?>