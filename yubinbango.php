<?php
/**
 * Plugin Name:     Yubinbango
 * Plugin URI:
 * Description:     This Plugin can display the address automatically from the postal code.
 * Author:          Takashi Hosoya
 * Author URI:      https://takashihosoya.ninja/
 * Text Domain:     yubinbango
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Yubinbango
 */

// Your code starts here.

namespace yubinbango;

if ( !class_exists('WPCF7')) {
    return;
}


define( 'YUBINBANGO_URL',  plugins_url( '', __FILE__ ) );

function enqueue_scripts(){

    wp_enqueue_script(
        'yubinbango',
        YUBINBANGO_URL . '/js/yubinbango.js',
        array( )
    );

}
add_action( 'wpcf7_enqueue_scripts', '\yubinbango\enqueue_scripts' );


function form_class_attr($class){

    return $class . " h-adr";

}
add_filter( 'wpcf7_form_class_attr', '\yubinbango\form_class_attr', 10 , 1 );


function form_elements( $form ){


    $form .= "\n" . '<span class="p-country-name" style="display:none;">Japan</span>' . "\n";
    return $form;

}

add_filter( 'wpcf7_form_elements', '\yubinbango\form_elements', 10, 1);