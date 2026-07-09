<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
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

            <div class="nav-logo">
                <?php
                    if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                    }
                ?>
            </div>

            <?php
            wp_nav_menu( array(
                'theme_location' => 'header-menu-right',
                'container_class' => 'header-menu-right'
            ) );
            ?>

        </nav>
        <div class="search-bar">
            <?php include 'search-bar.php'; ?>
        </div>

    </header>