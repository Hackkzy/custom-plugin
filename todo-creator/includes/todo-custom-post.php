<?php

/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_todo_init() {
 $labels = array(
 	'name'          => _x( 'To-Do', 'Post type general name', 'textdomain' ),
 	'singular_name' => _x( '', 'Post type singular name', 'textdomain' ),
 	'menu_name'		=> _x( 'To-Do', 'Admin Menu text', 'textdomain' ),
 'name_admin_bar' 	=> _x( 'To-DO', 'Add New on Toolbar', 'textdomain' ),
 'add_new' => __( 'Add New', 'textdomain' ),
 'add_new_item' => __( 'Add New List', 'textdomain' ),
 'new_item' => __( 'New List', 'textdomain' ),
 'edit_item' => __( 'Edit List', 'textdomain' ),
 'view_item' => __( 'View List', 'textdomain' ),
 'all_items' => __( 'All List', 'textdomain' ),
 'search_items' => __( 'Search List', 'textdomain' ),
 'parent_item_colon' => __( 'Parent Books:', 'textdomain' ),
 'not_found' => __( 'No To-DO List found.', 'textdomain' ),
 'not_found_in_trash' => __( 'No To-Do List found in Trash.', 'textdomain' ),
 'featured_image' => _x( 'Set Featured Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
 'set_featured_image' => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
 'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
 'use_featured_image' => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
 'archives' => _x( 'To-Do List archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
 'insert_into_item' => _x( 'Insert into To-DO', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
 'uploaded_to_this_item' => _x( 'Uploaded to this To-Do', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
 'filter_items_list' => _x( 'Filter To-DO list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
 'items_list_navigation' => _x( 'To-Do list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
 'items_list' => _x( 'To-Do list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
 );

 $args = array(
 'labels' => $labels,
 'public' => true,
 'publicly_queryable' => true,
 'show_ui' => true,
 'show_in_menu' => true,
 'query_var' => true,
 'rewrite' => array( 'slug' => 'to-do' ),
 'capability_type' => 'post',
 'has_archive' => true,
 'hierarchical' => false,
 'menu_position' => null,
 'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
 );

 register_post_type( 'todo', $args );
}

add_action( 'init', 'wpdocs_codex_todo_init' );

function wpdocs_create_todo_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x('To-Do List Type', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('To-Do Type', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search To-Do List Type', 'textdomain'),
        'all_items'         => __('All To-Do List Type', 'textdomain'),
        'parent_item'       => __('Parent To-Do Type', 'textdomain'),
        'parent_item_colon' => __('Parent To-Do Type:', 'textdomain'),
        'edit_item'         => __('Edit To-Do Type', 'textdomain'),
        'update_item'       => __('Update To-Do Type', 'textdomain'),
        'add_new_item'      => __('Add New To-Do Type', 'textdomain'),
        'new_item_name'     => __('New To-Do Type Name', 'textdomain'),
        'menu_name'         => __('To-Do Type', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => false,
        'rewrite'           => array('slug' => 'todo_type'),
    );

    register_taxonomy('todo_type', array('todo'), $args);
}

add_action('init', 'wpdocs_create_todo_taxonomies');
