<?php

//Admin validation
if (is_admin()) {
  //Load admin scripts
  function yvg_add_admin_scripts() {
    wp_enqueue_style('yvg-admin-style', plugin_dir_url(__FILE__) . 'css/styles-admin.css');
    wp_enqueue_script('yvg-admin-script', plugin_dir_url(__FILE__) . 'js/main.js', array('jquery'), null, true);
  }
  add_action('admin_init', 'yvg_add_admin_scripts');
}

//Front-end validation
function yvg_add_frontend_scripts() {
wp_enqueue_style('yvg-style', plugin_dir_url(dirname(__FILE__)) . 'css/styles.css', [], filemtime(plugin_dir_path(dirname(__FILE__)) . 'css/styles.css'));
  wp_enqueue_script('yvg-script', plugin_dir_url(__FILE__) . 'js/main.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'yvg_add_frontend_scripts'); 
