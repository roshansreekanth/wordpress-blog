<?php
function add_my_styles()
{
     wp_enqueue_style( 'style', get_stylesheet_directory_uri().'/style.css' );
}

function register_my_sidebars()
{
    register_sidebar(
            array(
            'id' => 'one',
            'name' => __( 'Sidebar One' ),
            'description' => __( 'Left Sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
            )
        );

        register_sidebar(
            array(
            'id' => 'two',
            'name' => __( 'Sidebar Two' ),
            'description' => __( 'Right Sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
            )
            ); 
           
}



function add_google_fonts()
{
    wp_enqueue_style( 'add_google_fonts', 'https://fonts.googleapis.com/css2?family=Lobster&display=swap', false);
    wp_enqueue_style( 'add_google_fonts', 'https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap', false);
}

add_action( 'wp_enqueue_scripts', 'add_my_styles' );
add_action( 'wp_enqueue_scripts', 'add_google_fonts' ); 
add_action( 'widgets_init','register_my_sidebars' ); 
