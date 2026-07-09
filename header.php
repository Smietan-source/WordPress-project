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
            $page_id = 7;
            ?>
            <li>
                <a href="<?php echo esc_url( get_permalink( $page_id ) ); ?>">
                    <?php echo esc_html( get_the_title( $page_id ) ); ?>
                </a>
            </li>

            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php bloginfo( 'name' ); ?>
                </a>
            </h1>

            <?php 
            $page_id = 10;
            ?>
            <li>
                <a href="<?php echo esc_url( get_permalink( $page_id ) ); ?>">
                    <?php echo esc_html( get_the_title( $page_id ) ); ?>
                </a>
            </li>

        </nav>

    </header>