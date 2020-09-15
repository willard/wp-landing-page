<?php 
/**
 * @package WP Landing Page
 * @version 1.0.0
 */
/*
Plugin Name: WP Landing Page
Plugin URI: https://iamwillard.com/wp-landing-page
Description: Landing Page for Wordpress
Author: Willard Macay
Version: 1.0.0
Author URI: https://iamwillard
*/

function wp_landing_page_add_page_template ($templates) {
    $templates['wp-landing-page-template.php'] = 'WP Landing Page';
    return $templates;
    }
add_filter ('theme_page_templates', 'wp_landing_page_add_page_template');

function wp_landing_page_redirect_page_template ($template) {
    $post = get_post(); 
    $page_template = get_post_meta( $post->ID, '_wp_page_template', true ); 
    if ('wp-landing-page-template.php' == basename ($page_template))
        $template = WP_PLUGIN_DIR . '/wp-landing-page/wp-landing-page-template.php';
    return $template;
    }
add_filter ('page_template', 'wp_landing_page_redirect_page_template');