<?php
/**
 * Plugin Name: SM Featured Author
 * Plugin URI: http://mangipudi.com/wordpressplugins/smfeaturedauthors.zip
 * Description: Display Featured Author using user ID. usage: [SMFA user_id=1]
 * Version: 1.0
 * Author: Sivaji Mangipudi
 * Author URI: https://www.facebook.com/sivaji.mangipudi
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * usage: [SMFA user_id=1]
 */
 add_shortcode('SMFA', 'user_meta_shortcode_handler');

function user_meta_shortcode_handler($atts,$content=null){ 
    echo '<div class="smfa">';
    echo get_avatar( $atts['user_id']);
    echo "<h4 class='smfa-title'>". get_user_meta($atts['user_id'], 'first_name', true). " ". get_user_meta($atts['user_id'], 'last_name', true).'</h4>';
    echo "<p class='smfa-description'>". get_user_meta($atts['user_id'], 'description', true)."</p>";
    echo '<p class="smfa-readmore">Read the posts <a class="smfa-link" href="'. get_author_posts_url( $atts['user_id'] ) .'">here</a></p>';
    echo '</div>';
}
function smfeaturedauthors_css() {
wp_register_style('smfeaturedauthors_css', plugins_url('smfeaturedauthors.css',__FILE__ ));
wp_enqueue_style('smfeaturedauthors_css');
}
add_action( 'wp_enqueue_scripts','smfeaturedauthors_css');