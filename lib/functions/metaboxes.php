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
 * Create Metaboxes
 * @since 1.0.0
 * @link http://www.billerickson.net/wordpress-metaboxes/
 */

function be_metaboxes( $meta_boxes ) {
	$meta_boxes[] = array(
		'id' => 'page-options',
		'title' => 'Page Options',
		'object_types' => array('page'),
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, 
		'fields' => array(
			array(
				'name' => 'Subtitle',
				'desc' => '',
				'id' => 'be_page_subtitle',
				'type' => 'text'
			),
		),
	);
	
	return $meta_boxes;
}
add_filter( 'cmb2_meta_boxes' , 'be_metaboxes' );