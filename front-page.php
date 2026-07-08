<?php get_header() ?>

    <main>
        <section class="hero-section">
            <div class="logo">
                <h2><?php bloginfo('name'); ?></h2>
            </div>
            <div class="learn-more">
                <span><?php echo get_theme_mod('tekst_span','tekst opisowy');?></span>
                <a href="<?php echo esc_url(get_theme_mod('tekst_url', 'https://docs.google.com/document/d/1AfUyAJkm1jm-uisPB6aj-pijKPDsOFuNQkj3OVCD-qs/edit?pli=1&tab=t.0#heading=h.yka2fqmw5hqs')); ?>">
                <?php echo esc_html(get_theme_mod('tekst_przycisku', 'Domyślny tekst linku')); ?>
                </a>
            </div>
        </section>

        <section class="main-content">

            <div class="projects">
                <img src="<?php echo esc_url(get_theme_mod('obrazek_box', '')); ?>" alt="<?php echo esc_attr(get_theme_mod('obrazek_box_alt', 'Domyślny alt dla obrazka')); ?>">  
                <h3><?php echo get_theme_mod('naglowek_box', 'Domyślny naglowek boxa'); ?></h3>
                <span><?php echo get_theme_mod('tekst_box', 'Domyślny opis boxa'); ?></span>
            </div>
            <div class="projects">
                <img src="<?php echo esc_url(get_theme_mod('obrazek_box2', '')); ?>" alt="<?php echo esc_attr(get_theme_mod('obrazek_box_alt2', 'Domyślny alt dla obrazka')); ?>">  
                <h3><?php echo get_theme_mod('naglowek_box2', 'Domyślny naglowek boxa'); ?></h3>
                <span><?php echo get_theme_mod('tekst_box2', 'Domyślny opis boxa'); ?></span>
            </div>
            <div class="projects">
                <img src="<?php echo esc_url(get_theme_mod('obrazek_box3', '')); ?>" alt="<?php echo esc_attr(get_theme_mod('obrazek_box_alt3', 'Domyślny alt dla obrazka')); ?>">  
                <h3><?php echo get_theme_mod('naglowek_box3', 'Domyślny naglowek boxa'); ?></h3>
                <span><?php echo get_theme_mod('tekst_box3', 'Domyślny opis boxa'); ?></span>
            </div>
        </section>
    </main>

<?php get_footer() ?>
