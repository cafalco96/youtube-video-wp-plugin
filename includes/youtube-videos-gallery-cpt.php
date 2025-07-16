<?php

//custom post type creation
function yvg_video_register() {
  $singular_name = apply_filters('yvg_label_singular_name', 'Video');
  $plural_name = apply_filters('yvg_label_plural_name', 'Videos');

  $labels = array(
    'name' => $plural_name,
    'singular_name' => $singular_name,
    'add_new' => 'Add Video',
    'add_new_item' => "Add New $singular_name",
    'edit' => "Edit",
    'edit_item' => "Edit $singular_name",
    'new_item' => "New $singular_name",
    'view' => "View",
    'view_item' => "View $singular_name",
    'search_items' => "Search $plural_name",
    'not_found' => "No $plural_name found",
    'not_found_in_trash' => "No $plural_name found in Trash",
    'menu_name' => $plural_name,
  );

  $args = apply_filters('yvg_video_args', array(
    'labels' => $labels,
    'description' => 'Videos for categories',
    'taxonomies' => array('Category'),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'video'),
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-video-alt3',
    'show_in_nav_menus' => true,
    'supports' => array('title'),
  ));

  // Register the custom post type
  register_post_type('video', $args);
}
add_action('init', 'yvg_video_register');