<?php get_header() ?>

    <main class="site-main">
        <div class="single-post-container">

            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class('full-post'); ?>>
                        
                        <header class="entry-header">
                            <h1 class="entry-title"><?php the_title(); ?></h1>

                            <div class="entry-meta">
                                <span class="author">Autor: <?php the_author(); ?></span> | 
                                <span class="date">Opublikowano: <?php echo get_the_date(); ?></span> | 
                                <span class="categories">Kategoria: <?php the_category(', '); ?></span>
                            </div>
                        </header>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-featured-image">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                        <footer class="entry-footer">
                            <?php the_tags('<div class="post-tags">Tagi: ', ', ', '</div>'); ?>
                        </footer>

                    </article>
                    
                    <div class="cta">
                        <h2><?php the_field('cta_title'); ?></h2>
                        <a href="<?php the_field('cta_button_link'); ?>"><?php the_field('cta_button_text'); ?></a>
                    </div>

                    <nav class="post-navigation">
                        <div class="nav-previous"><?php previous_post_link('%link', '&larr; %title'); ?></div>
                        <div class="nav-next"><?php next_post_link('%link', '%title &rarr;'); ?></div>
                    </nav>

                    <?php 
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif; 
                    ?>

                <?php endwhile; ?>
            <?php else : ?>
                <p>Brak treści do wyświetlenia.</p>
            <?php endif; ?>

        </div>
    </main>

<?php get_footer(); ?>