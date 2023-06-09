<?php
    namespace IronPawsLLC;

    defined( 'ABSPATH' ) || exit;

    require_once 'includes/wp-defs.php';
    require_once 'includes/debug.php';
    //require_once 'includes/autoloader.php';

    /*
    function ironpaws_woocommerce_order_status_completed( $order_id ) {
        echo 'woocommerce_order_status_completed';
        error_log( "Order complete for order $order_id", 0 );
    } */


    function ironpaws_woocommerce_payment_complete_order_status( $order_id ) {
        _e('woocommerce_payment_complete_order_status', "ironpaws");
        error_log( "Status of payment complete for order $order_id", 0 );
    }

    // 
    function ironpaws_woocommerce_payment_complete( $order_id ) {
        error_log( "payment complete for order $order_id", 0 );
        Strings::init();

        $wc_order_id = WC_ORDER_ID;
        $next_steps = Strings::$NEXT_STEPS;

        return  <<<ASK_LOCATION_REGISTRATION
            <p>$next_steps</p>
            Ready to race? Register your team!
            <a href="team-registration">Team registration?$wc_order_id=$order_id</a>
        ASK_LOCATION_REGISTRATION;
    }
?>