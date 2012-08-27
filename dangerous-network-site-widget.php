<?php
/*
Plugin Name: Dangerous Network Site Widget
Description: Don't use this unless you really know what you're doing. Kudos http://wpmututorials.com/how-to/return-a-list-of-sites-on-the-network/
License: GPLv2 or later
*/


// Query the sites on a network
function rwi_dnsw_query() {
	
	$network_sites = get_blog_list( 0, 'all' );
	
	return $network_sites;
	
}


// Build out the widget.
// Kudos http://codex.wordpress.org/Function_Reference/register_widget
class DangerousNetworkSiteWidget extends WP_Widget {

	function DangerousNetworkSiteWidget() {
		// Instantiate the parent object
		parent::__construct( false, 'Network Sites' );
	}

	// Widget output
	function widget( $args, $instance ) {
		
		$network_sites = get_blog_list( 0, 'all' );
		
		$output .= '<ul>';
		
		foreach( $network_sites as $network_site ) {
			
			$output .= '<li>Blog ' . $network_site['blog_id'] . ': ' . $network_site['domain'] . $network_site['path'] . '</li>';
			
		}
		
		$output .= '</ul>';
		
		echo $output;
		
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	function form( $instance ) {
		// Output admin widget options form
	}
}

function rwi_dnsw__register_widgets() {
	register_widget( 'DangerousNetworkSiteWidget' );
}

add_action( 'widgets_init', 'rwi_dnsw__register_widgets' );