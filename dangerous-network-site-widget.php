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
