<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
    <?php
        if ( function_exists( 'the_company_logo' ) ) {
            the_company_logo();
        }
    ?>
</head>
<body>
    
    <header class="header">

        <nav class="menu-list">
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php bloginfo( 'name' ); ?>
                </a>
            </h1>

            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary-menu',
                'container'      => 'nav',
                'container_class'=> 'site-navigation',
                'menu_class'     => 'primary-menu-list',
            ) );
            ?>

        </nav>

    </header>