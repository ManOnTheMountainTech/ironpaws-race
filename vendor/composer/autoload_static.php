<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite4634bedc97d563b158eceb8f8ad576b
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Ironpawsllc\\Ironpaws\\' => 21,
        ),
        'A' => 
        array (
            'Automattic\\WooCommerce\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ironpawsllc\\Ironpaws\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Automattic\\WooCommerce\\' => 
        array (
            0 => __DIR__ . '/..' . '/automattic/woocommerce/src/WooCommerce',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'WC_API_Client' => __DIR__ . '/..' . '/woothemes/woocommerce-api/lib/woocommerce-api/class-wc-api-client.php',
        'WC_API_Client_Authentication' => __DIR__ . '/..' . '/woothemes/woocommerce-api/lib/woocommerce-api/class-wc-api-client-authentication.php',
        'WC_API_Client_Exception' => __DIR__ . '/..' . '/woothemes/woocommerce-api/lib/woocommerce-api/exceptions/class-wc-api-client-exception.php',
        'WC_API_Client_HTTP_Exception' => __DIR__ . '/..' . '/woothemes/woocommerce-api/lib/woocommerce-api/exceptions/class-wc-api-client-http-exception.php',
        'WC_API_Client_HTTP_Request' => __DIR__ . '/..' . '/woothemes/woocommerce-api/lib/woocommerce-api/class-wc-api-client-http-request.php',
        'WC_API_Client_Resource' => __DIR__ . '/..' . '/woothemes/woocommerce-api/lib/woocommerce-api/resources/abstract-wc-api-client-resource.php',
        'WC_API_Client_Resource_Coupons' => __DIR__ . '/..' . '/woothemes/woocommerce-api/lib/woocommerce-api/resources/class-wc-api-client-resource-coupons.php',
        'WC_API_Client_Resource_Custom' => __DIR__ . '/..' . '/woothemes/woocommerce-api/lib/woocommerce-api/resources/class-wc-api-client-resource-custom.php',
        'WC_API_Client_Resource_Customers' => __DIR__ . '/..' . '/woothemes/woocommerce-api/lib/woocommerce-api/resources/class-wc-api-client-resource-customers.php',
        'WC_API_Client_Resource_Index' => __DIR__ . '/..' . '/woothemes/woocommerce-api/lib/woocommerce-api/resources/class-wc-api-client-resource-index.php',
        'WC_API_Client_Resource_Order_Notes' => __DIR__ . '/..' . '/woothemes/woocommerce-api/lib/woocommerce-api/resources/class-wc-api-client-resource-order-notes.php',
        'WC_API_Client_Resource_Order_Refunds' => __DIR__ . '/..' . '/woothemes/woocommerce-api/lib/woocommerce-api/resources/class-wc-api-client-resource-order-refunds.php',
        'WC_API_Client_Resource_Orders' => __DIR__ . '/..' . '/woothemes/woocommerce-api/lib/woocommerce-api/resources/class-wc-api-client-resource-orders.php',
        'WC_API_Client_Resource_Products' => __DIR__ . '/..' . '/woothemes/woocommerce-api/lib/woocommerce-api/resources/class-wc-api-client-resource-products.php',
        'WC_API_Client_Resource_Reports' => __DIR__ . '/..' . '/woothemes/woocommerce-api/lib/woocommerce-api/resources/class-wc-api-client-resource-reports.php',
        'WC_API_Client_Resource_Webhooks' => __DIR__ . '/..' . '/woothemes/woocommerce-api/lib/woocommerce-api/resources/class-wc-api-client-resource-webhooks.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite4634bedc97d563b158eceb8f8ad576b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite4634bedc97d563b158eceb8f8ad576b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite4634bedc97d563b158eceb8f8ad576b::$classMap;

        }, null, ClassLoader::class);
    }
}
