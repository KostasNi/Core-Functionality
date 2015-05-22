<?php
/**
 * Metaboxes
 *
 * This file registers any custom metaboxes
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/billerickson/Core-Functionality
 * @author       Bill Erickson <bill@billerickson.net>
 * @copyright    Copyright (c) 2011, Bill Erickson
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Initialize Metabox Class
 * @since 1.0.0
 * see /lib/metabox/example-functions.php for more information
 *
 */
if ( file_exists( BE_DIR . '/lib/CMB2/init.php' ) ) {
	require_once( BE_DIR . '/lib/CMB2/init.php' );
}

/**
 * Gets a number of posts and displays them as options
 * @param  array $query_args Optional. Overrides defaults.
 * @return array             An array of options that matches the CMB2 options array
 */
function cmb2_get_post_options( $query_args ) {

	$args = wp_parse_args( $query_args, array(
		'post_type'   => 'post',
		'numberposts' => 10,
	) );

	$posts = get_posts( $args );

	$post_options = array();
	if ( $posts ) {
		foreach ( $posts as $post ) {
			$post_options[ $post->ID ] = $post->post_title;
		}
	}

	return $post_options;
}
/**
 * Create Metaboxes
 * @since 1.0.0
 * @link http://www.billerickson.net/wordpress-metaboxes/
 */

function be_metaboxes( $meta_boxes ) {
	$prefix = 'be_';
	$meta_boxes['related-case-studies-options'] = array(
		'id' => $prefix . 'related-case-studies-options',
		'title' => 'Related Case Studies Options',
		'object_types' => array('page'), // post type
	//	'show_on' => array( 'key' => 'id', 'value' => array( 212, 215, 217, 219 ) ),
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true,
		'fields'  => array(
			array(
				'name'    => __( 'Select Related Case Studies', 'cmb2' ),
				'desc'    => __( 'Only select the Case Studies that should appear on the side of this page', 'cmb2' ),
				'id'      => $prefix . 'related_case_studies',
				'type'    => 'multicheck',
				//	'options' => cmb2_get_post_options( array( 'post_type' => 'case-studies', 'numberposts' => 100 ) ),
				'options' => cmb2_get_post_options( array( 'post_type' => 'post', 'numberposts' => 100 ) ),

			),
		),
	);

	return $meta_boxes;
}
add_filter( 'cmb2_meta_boxes' , 'be_metaboxes' );