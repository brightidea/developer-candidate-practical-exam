<?php
/**
 * Plugin Name: Developer Candidate Practical Exam - Bandsintown API Plugin
 * Plugin URI:  http://blakemoore.io
 * Description: Example Plugin for the Developer Candidate Practical Exam
 * Version:     0.0.1
 * Author:      Blake Moore
 * Author URI:  http://blakemoore.io
 * Text Domain: developer-candidate-practical-exam
 */

# Extra check in case the script is being loaded by a theme.
if ( !function_exists( 'bandsintown_artist' ) )
	require_once( 'inc/bandsintown.php' );

function bandsintown_artist_stylesheet() 
{
    wp_enqueue_style( 'Bandsintown', plugins_url( '/css/styles.css', __FILE__ ) );
}

add_action('wp_print_styles', 'bandsintown_artist_stylesheet');