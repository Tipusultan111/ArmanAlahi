<?php
function arman_theme_style () {
    wp_enqueue_style('arman_style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'arman_theme_style');


// Register Portfolio Custom Post Type
function register_portfolio_post_type() {

    $labels = array(
        'name'                  => _x( 'Portfolios', 'Post Type General Name', 'textdomain' ),
        'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'textdomain' ),
        'menu_name'             => __( 'Portfolio', 'textdomain' ),
        'name_admin_bar'        => __( 'Portfolio Item', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Portfolio', 'textdomain' ),
        'new_item'              => __( 'New Portfolio', 'textdomain' ),
        'edit_item'             => __( 'Edit Portfolio', 'textdomain' ),
        'view_item'             => __( 'View Portfolio', 'textdomain' ),
        'all_items'             => __( 'All Portfolios', 'textdomain' ),
        'search_items'          => __( 'Search Portfolios', 'textdomain' ),
        'not_found'             => __( 'No Portfolios found', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Portfolios found in Trash', 'textdomain' ),
    );

    $args = array(
        'label'                 => __( 'Portfolio', 'textdomain' ),
        'description'           => __( 'Portfolio items', 'textdomain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail', 'excerpt' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'rewrite'               => array( 'slug' => 'portfolio' ),
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'show_in_rest'          => true, // For Elementor and Gutenberg
    );

    register_post_type( 'portfolio', $args );

}
add_action( 'init', 'register_portfolio_post_type', 0 );


// Register Portfolio Categories Taxonomy
function register_portfolio_taxonomy() {

    $labels = array(
        'name'              => _x( 'Portfolio Categories', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Portfolio Categories', 'textdomain' ),
        'all_items'         => __( 'All Portfolio Categories', 'textdomain' ),
        'parent_item'       => __( 'Parent Portfolio Category', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Portfolio Category:', 'textdomain' ),
        'edit_item'         => __( 'Edit Portfolio Category', 'textdomain' ),
        'update_item'       => __( 'Update Portfolio Category', 'textdomain' ),
        'add_new_item'      => __( 'Add New Portfolio Category', 'textdomain' ),
        'new_item_name'     => __( 'New Portfolio Category Name', 'textdomain' ),
        'menu_name'         => __( 'Portfolio Categories', 'textdomain' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'portfolio-category' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );

}
add_action( 'init', 'register_portfolio_taxonomy', 1 );
