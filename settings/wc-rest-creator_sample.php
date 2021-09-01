<?php
    namespace IronPaws;

    defined( 'ABSPATH' ) || exit;

    require_once plugin_dir_path(__FILE__) . '../includes/wp-defs.php';
    require_once plugin_dir_path(__FILE__) . '../includes/debug.php';
    require plugin_dir_path(__FILE__) . '../vendor/autoload.php';

    use Automattic\WooCommerce\Client;
    use Automattic\WooCommerce\HttpClient\HttpClientException;

    // https://woocommerce.github.io/code-reference/files/woocommerce-includes-class-wc-rest-authentication.htm
    class WC_Rest_Creator {  
          static function create_wc() {
            return new Client(
                '<URL>', 
                'ck_<key>', 
                'cs_<key>',
                [
                    'wp_api' => true,
                    'version' => 'wc/v3'
                ]
            );
        }

        function getResponseBody($response) {
            return $this->$woocommerce->http->getResponse()->getBody();
        }

        // @function processResponse
        // @param $result - result from a call to the WooCommerce REST API
        // @returns : null = failure, associative object = success
        // ----
        // Internally, Client calls HttpClient, which sets the parameters as CURL
        // options, and then calls CURL. The result is processed by json_decode.
        // json_decode can return true, false, or null. However, the body still
        // may contain valid data. Try a little harder to get it.
        static function processResponse($result) {
            if ((false == $result) || (null == $result)) {
                $body = getResponseBody($result);
                if ((false == $body) || (null == $body)) {
                    return null;
                } else {
                    $body = json_decode($body);
                    if ((false == $body) || (null == $body)) {return null;}
                    
                    return $body;
                }
            }

            return $result;
        }

        static function handleHttpClientException(HttpClientException $ehce) {
            write_log(__FUNCTION__ . __LINE__ . "Caught. Message:", $e->getMessage() ); // Error message.
            write_log(" Request:", $e->getRequest() ); // Last request data.
            write_log(" Response:", $e->getResponse() ); // Last response data.
        }
    }

?>