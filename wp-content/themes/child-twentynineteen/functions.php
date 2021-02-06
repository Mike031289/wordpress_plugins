<?php
add_action( "wp_enqueue_scripts", "my_them_enqueue_styles");
function my_them_enqueue_styles(){
    wp_enqueue_style("parent-style",get_template_directory_uri()."./styles.css");
    wp_enqueue_style("child-style",get_stylesheet_directory_uri()."./styles.css");
}