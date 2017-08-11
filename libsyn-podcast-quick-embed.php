<?php
/**
 * @package Libsyn_Embed
 * @version 1.0
 */
/*
Plugin Name: Libsyn Podcast Quick Embed
Description: This is a simple plugin to quickly embed a Libsyn Podcast in your wordpress website. You don't have to go through any complex process for this. A button is provided in editor itself for this. Just click it and insert your podcast id, it will then insert a shortcode in your code. Save the post. And now you have a sweet lybsyn podcast player embedded in your content.
Author: Durgesh Tayade
Version: 1.0.0
Author URI: http://dwebpixel.com/
*/

require 'editor-plugins/libsyn-podcast.php';

/*
Add Shortcode for podcast player
 */
function libsyn_podcast_shortcode( $atts , $content = null ){

    $atts =  shortcode_atts( array(
            'id' =>  0,
        ), $atts, 'libsyn_podcast' );  

    $id = absint( $atts['id'] );

    if( 0 == $id ){
    	return '<p> Please add the podcast id.</p>';	
    }else{
    	return '<p><iframe style="border: none" src="//html5-player.libsyn.com/embed/episode/id/'. $id .'/height/90/width/750/theme/custom/autonext/no/thumbnail/yes/autoplay/no/preload/no/no_addthis/no/direction/backward/no-cache/true/render-playlist/no/custom-color/01babb/" height="90" width="100%" scrolling="no"  allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe></p>';
    }
}

add_shortcode( 'libsyn_podcast', 'libsyn_podcast_shortcode' );