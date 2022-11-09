<?php

GFForms::include_payment_addon_framework();

class GFFakePayment extends GFPaymentAddOn {

    protected $_version = GF_THANKQ_ADDON_VERSION;
    protected $_min_gravityforms_version = '1.9.16';
    protected $_slug = 'gravityformsfakepayment';
    protected $_path = 'gravityformsfakepayment/gravityformsfakepayment.php';
    protected $_full_path = __FILE__;
    protected $_title = 'Gravity Forms Fake Payment Add-On';
    protected $_short_title = 'Fake Payment Add-On';
    
    protected $_requires_credit_card = true;

    private static $_instance = null;

    /**
     * Get an instance of this class.
     *
     * @return GFSimpleFeedAddOn
     */
    public static function get_instance() {
        if ( self::$_instance == null ) {
            self::$_instance = new GFFakePayment();
        }

        return self::$_instance;
    }
    
    public function authorize( $feed, $submission_date, $form, $entry ) {
        $transaction_id = time();
        return [
            'is_authorized'     => true,
            'transaction_id'    => $transaction_id,
            'captured_payment'  => [
                'is_success'        => true,
                'transaction_id'    => $transaction_id,
                'amount'            => 10
            ]
        ];
    }
}
