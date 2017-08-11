<?php

//MCE Editor libsyn_podcast Podcast Plugin

add_action( 'init', 'libsyn_podcast_buttons' );

function libsyn_podcast_buttons() {
    add_filter( "mce_external_plugins", "libsyn_podcast_add_buttons" );
    add_filter( 'mce_buttons', 'libsyn_podcast_register_buttons' );
}
function libsyn_podcast_add_buttons( $plugin_array ) {
    $plugin_array['libsyn_podcast'] = plugin_dir_url( __FILE__ ) . 'libsyn-podcast-plugin.js';
    return $plugin_array;
}
function libsyn_podcast_register_buttons( $buttons ) {
    array_push( $buttons, 'podcast' );
    return $buttons;
}