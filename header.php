<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body <?php body_class() ?>>
    
    <header class="header">

        <nav class="menu-list">

            <div class="nav-box">
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
            </div>

             <div class="black-white-mode">
                <button class="mode"><?php echo file_get_contents(get_theme_file_path('sun.svg')); ?></button>
            </div>


        </nav>

        <section class="right-section">

            <div class="search-bar">
                <?php include 'search-bar.php'; ?>
            </div>
        </section>    

    </header>