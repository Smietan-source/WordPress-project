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

            <?php
            wp_nav_menu( array(
                'theme_location' => 'header-menu-left',
                'container_class' => 'header-menu-left'
            ) );
            ?>

            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php bloginfo( 'name' ); ?>
                </a>
            </h1>

            <?php
            wp_nav_menu( array(
                'theme_location' => 'header-menu-right',
                'container_class' => 'header-menu-right'
            ) );
            ?>

        </nav>

    </header>