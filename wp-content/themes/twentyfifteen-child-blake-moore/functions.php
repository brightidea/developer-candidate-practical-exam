<?php 
function theme_enqueue_styles() {
    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

// Task 2: Create a shortcode called [AllPageLinks] in the functions.php of your child theme which programmatically prints links to all pages on the site. Please include this shortcode in one of the pages.

function all_page_links_shortcode() {

	$pages = get_pages(); 

 	echo "<ul>";
 	foreach ( $pages as $page ) {
	  	$option = '<li><a href="' . get_page_link( $page->ID ) . '">';
		$option .= $page->post_title;
		$option .= '</a></li>';
		echo $option;
	}
 	echo "</ul>";	

}
add_shortcode('AllPageLinks', 'all_page_links_shortcode');

// Registers the Artist Post type
function disney_artist_posttype() {
	register_post_type( 'artists',
		array(
			'labels' => array(
				'name' => __( 'Artists' ),
				'singular_name' => __( 'Artist' ),
				'add_new' => __( 'Add New Artist' ),
				'add_new_item' => __( 'Add New Artist' ),
				'edit_item' => __( 'Edit Artist' ),
				'new_item' => __( 'Add New Artist' ),
				'view_item' => __( 'View Artist' ),
				'search_items' => __( 'Search Artist' ),
				'not_found' => __( 'No Artists found' ),
				'not_found_in_trash' => __( 'No Artists found in trash' )
			),
			'public' => true,
			'supports' => array( 'title' ),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "artists"), // Permalinks format
			'menu_position' => 5,
		)
	);
}

add_action( 'init', 'disney_artist_posttype' );

function disney_artist_change_title_text( $title ){
     $screen = get_current_screen();
 
     if  ( 'artists' == $screen->post_type ) {
          $title = 'Enter Artist\'s Name Here';
     }
     return $title;
}
 
add_filter( 'enter_title_here', 'disney_artist_change_title_text' );

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
 
    // update path
    $path = get_stylesheet_directory() . '/acf/';
    
    // return
    return $path;
    
}
 

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '/acf/';
    
    // return
    return $dir;
    
}
 

// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');


// 4. Include ACF
include_once( get_stylesheet_directory() . '/acf/acf.php' );


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_55b8063c99d6c',
	'title' => 'Artist Information',
	'fields' => array (
		array (
			'key' => 'field_55b80643f98d4',
			'label' => 'Artist Thumbnail',
			'name' => 'artist_thumbnail',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'full',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_55b80718f98d5',
			'label' => 'Artist\'s Facebook Page URL',
			'name' => 'facebook_page_url',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_55b8074cf98d6',
			'label' => 'Shows',
			'name' => 'shows',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'min' => '',
			'max' => '',
			'layout' => 'table',
			'button_label' => 'Add Row',
			'sub_fields' => array (
				array (
					'key' => 'field_55b8075af98d7',
					'label' => 'Show Title',
					'name' => 'show_title',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_55b807a3f98d8',
					'label' => 'Show Date',
					'name' => 'show_date',
					'type' => 'date_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'display_format' => 'F j, Y',
					'return_format' => 'F j, Y',
					'first_day' => 1,
				),
				array (
					'key' => 'field_55b807c5f98d9',
					'label' => 'Venue Name',
					'name' => 'venue_name',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_55b8084bf98db',
					'label' => 'Venue City',
					'name' => 'venue_city',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_55b80859f98dc',
					'label' => 'Venue State',
					'name' => 'venue_state',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_55b8086ff98dd',
					'label' => 'Buy Tickets URL',
					'name' => 'buy_tickets_url',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'artists',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'permalink',
		1 => 'the_content',
		2 => 'excerpt',
		3 => 'custom_fields',
		4 => 'discussion',
		5 => 'comments',
		6 => 'revisions',
		7 => 'slug',
		8 => 'author',
		9 => 'format',
		10 => 'page_attributes',
		11 => 'featured_image',
		12 => 'categories',
		13 => 'tags',
		14 => 'send-trackbacks',
	),
));

endif;