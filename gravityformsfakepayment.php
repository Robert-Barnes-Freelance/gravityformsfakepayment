<?php
/*
Plugin Name: Gravity Forms Fake Payment Add-On
Plugin URI: 
Description: Fake payment add-on for gravity forms
Version: 1.0
Author: Robert Barnes
Author URI: 
*/

define( 'GF_FAKEPAYMENT_ADDON_VERSION', '1.0' );

class GF_FakePayment_Bootstrap {

    public static function load() {

        if ( ! method_exists( 'GFForms', 'include_payment_addon_framework' ) ) {
            return;
        }

        require_once( 'class-gffakepayment.php' );

        GFAddOn::register( 'GFFakePayment' );
    }

}
add_action( 'gform_loaded', array( 'GF_FakePayment_Bootstrap', 'load' ), 5 );

function gf_fakepayment() {
    return GFFakePayment::get_instance();
}

