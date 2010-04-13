<?php
/*
Plugin Name: Google Related Links
Plugin URI: http://www.devilalbum.com/2010/04/plugin-google-related-links/
Description: This plugin make use of Google Ajax Search Api to provide google related links.
Version: 1.0
Author: yun77op
Author URI: http://www.devilalbum.com/
License : GPL v3
*/

function google_related_links(){
global $post;
 echo '<div id="search-form"></div>';
 echo '<div id="search-related"></div>';  

$js_url=WP_PLUGIN_URL . '/google-related-links/related.js.php';
$site=get_bloginfo('wpurl');
$tags = get_the_tags($post->ID);
if(!$tags)
return;

foreach($tags as $tag) {
$query .= $tag->name . '+'; 
}
$query=substr($query,0,$query.length-1);
$js_string= <<<EOT
<script type="text/javascript" src="http://www.google.com/jsapi" ></script>
<script type="text/javascript" src="$js_url"></script>
<script>
function OnLoad(){
var g=new gSearch();
g.gSearchForm.execute("$query");
watchMore();
}
function addMore(){
var related=document.getElementById('search-related');
var a=document.createElement('a');
a.href="http://www.google.com.hk/search?hl=zh-CN&safe=strict&q=$query+site:$site";
a.appendChild(document.createTextNode('more..'));
a.className='more';
related.appendChild(a);
}
 google.setOnLoadCallback(OnLoad);
</script>
EOT;
echo $js_string;
}


function related_css(){
$css_url=WP_PLUGIN_URL . '/google-related-links/related.css';
echo '<link rel="stylesheet" href="'.$css_url.'" type="text/css" media="all" />';
}

add_action(wp_head,'related_css');
?>
