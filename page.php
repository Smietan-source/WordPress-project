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
                <h3>About Us</h3>
                <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus soluta debitis deserunt praesentium? 
                    Iste quae cumque eveniet, repellendus adipisci vel odit minus voluptas praesentium veniam dolorum consectetur delectus accusantium saepe.</span>
            </div>

        </section>

        <section>

            <div class="content_place">
                <h4>Nagłowek na sekcje</h4>
                <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus architecto perspiciatis ipsum cupiditate
                     tempore ducimus pariatur non aut modi voluptatibus ut placeat nemo, asperiores saepe vel consequatur! Libero, est hic?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem quia earum ipsum porro tempo
                     re atque, sed quis culpa nobis inventore possimus voluptates quaerat placeat voluptate minima recusandae numquam, ducimus neque.</span>
            </div>

        </section>
    </main>

<?php get_footer() ?>