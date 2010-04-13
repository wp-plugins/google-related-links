=== Plugin Name ===
Contributors: yun77op
Tags: google,related,link
Tested up to: 2.9.1

== Description ==
This plugin make use of Google Ajax Search Api to provide google related links.

== Installation ==
1. Upload the folder `google-related-links` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Usage ==
Insert the following code within The Loop.
 	<?php if(function_exists('google_related_links')) : ?>
	<?php google_related_links(); ?>
    	<?php endif; ?>
You can modify the related.css file to change the outlook to suit your taste.

== Screenshots ==
1. an example screenshot

== Changelog ==
= 1.0 2010-04-13 =
* Initial release
