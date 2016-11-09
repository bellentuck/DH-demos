<?php
/*
Plugin Name: Video Custom Posts
Plugin URI:  
Description: This plugin displays videos.
Version:     0.1.0
Author:      Ben Ellentuck
Author URI:  
License:     GPL v2+
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: video-custom-posts
Domain Path:
*/

// Exit if accessed directly.
if( !defined('ABSPATH') ) exit;

/*
* Register Video post type.
*/
function wpdocs_codex_video_init() {
    $labels = array(
        'name'                  => _x( 'Videos', 'Post type general name', 'video-custom-posts' ),
        'singular_name'         => _x( 'Video', 'Post type singular name', 'video-custom-posts' ),
        'menu_name'             => _x( 'Videos', 'Admin Menu text', 'video-custom-posts' ),
        'name_admin_bar'        => _x( 'Video', 'Add New on Toolbar', 'video-custom-posts' ),
        'add_new'               => __( 'Add New', 'video-custom-posts' ),
        'add_new_item'          => __( 'Add New Video', 'video-custom-posts' ),
        'new_item'              => __( 'New Video', 'video-custom-posts' ),
        'edit_item'             => __( 'Edit Video', 'video-custom-posts' ),
        'view_item'             => __( 'View Video', 'video-custom-posts' ),
        'all_items'             => __( 'All Videos', 'video-custom-posts' ),
        'search_items'          => __( 'Search Videos', 'video-custom-posts' ),
        'parent_item_colon'     => __( 'Parent Videos:', 'video-custom-posts' ),
        'not_found'             => __( 'No Videos found.', 'video-custom-posts' ),
        'not_found_in_trash'    => __( 'No Videos found in Trash.', 'video-custom-posts' ),
        'featured_image'        => _x( 'Video Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'video-custom-posts' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'video-custom-posts' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'video-custom-posts' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'video-custom-posts' ),
        'archives'              => _x( 'Video archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'video-custom-posts' ),
        'insert_into_item'      => _x( 'Insert into video', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'video-custom-posts' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Video', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'video-custom-posts' ),
        'filter_items_list'     => _x( 'Filter videos list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'video-custom-posts' ),
        'items_list_navigation' => _x( 'Videos list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'video-custom-posts' ),
        'items_list'            => _x( 'Videos list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'video-custom-posts' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'video' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
        'menu_icon'          => 'dashicons-video-alt3',
    );
 
    register_post_type( 'video', $args );
}
add_action( 'init', 'wpdocs_codex_video_init' );


/*
* Register Decades taxonomy for Sitcom Reader video site.
*/
function sitcom_reader_decades_create_taxonomy() {
    $labels = array(
        'name'              => _x( 'Decades', 'taxonomy general name', 'video-custom-posts' ),
        'singular_name'     => _x( 'Decade', 'taxonomy singular name', 'video-custom-posts' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'decade' ),
    );

    register_taxonomy( 'sitcom_reader_decades', 'video', $args );

}
add_action( 'init', 'sitcom_reader_decades_create_taxonomy' );


/*
 * Never worry about cache again!
 */
function my_load_scripts($hook) {
 
    // create my own version codes
    $my_js_ver  = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/custom.js' ));
    $my_css_ver = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'assets/css/style.css' ));
     
    // 
    wp_enqueue_script( 'custom_js', plugins_url( 'assets/js/custom.js', __FILE__ ), array(), $my_js_ver );
    wp_register_style( 'my_css',    plugins_url( 'assets/css/style.css',    __FILE__ ), false,   $my_css_ver );
    wp_enqueue_style ( 'my_css' );
 
}
add_action('wp_enqueue_scripts', 'my_load_scripts');