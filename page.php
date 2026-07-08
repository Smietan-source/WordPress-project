<?php get_header() ?>

    <main>

        <section>

            <div class="ad">
                <img src="<?php echo get_theme_mod('obrazek_ad_content','Wybierz obrazek'); ?>" alt="<?php echo get_theme_mod('alt_obrazek_ad_content', 'Przykladowe alt obrazka'); ?>">
                <div class="ad_content">
                    <h2><?php echo get_theme_mod('naglowek_ad_content', 'Przykładowy nagłowek'); ?></h2>
                    <span> <?php echo get_theme_mod('tekst_ad_content', 'Przykladowy tekst'); ?></span>
                    <a href="<?php echo esc_url(get_theme_mod('tekst_url_przycisku_ad_content', '')); ?>"><?php echo esc_html(get_theme_mod('tekst_przycisku_ad_content', 'Przykladowy tekst przycisku')); ?></a>
                </div>
            </div>

        </section>

        <section>

            <div class="about-us_content">
                <h3><?php echo get_theme_mod('naglowek_about_us_content', 'About Us'); ?></h3>
                <span><?php echo get_theme_mod('tekst_about_us_content', 'Przykładowy tekst o nas'); ?></span>
            </div>

        </section>

        <section>

            <div class="content_place">
                <h4><?php echo get_theme_mod('naglowek_content_place_content', 'Przykladowy naglowek'); ?></h4>
                <span><?php echo get_theme_mod('tekst_content_place_content', 'Przykładowy tekst'); ?></span>
            </div>

        </section>
    </main>

<?php get_footer() ?>