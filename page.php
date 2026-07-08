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
            <div class="about-us_content">
                <h3><?php echo esc_html( get_theme_mod( 'naglowek_about_us_content', 'About Us' ) ); ?></h3>
                <span><?php echo esc_html( get_theme_mod( 'tekst_about_us_content', 'Przykładowy tekst o nas' ) ); ?></span>
            </div>
        </section>

        <section class="page-content-section">
            <div class="content_place">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <h1 class="page-title"><?php the_title(); ?></h1>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </section>

    </main>

<?php get_footer(); ?>