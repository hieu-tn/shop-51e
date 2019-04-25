<?php
/**
 * @package shop51e
 */

class Shop51eAPI {
  /**
   * Holds the values to be used in the fields callbacks
   */
  private $api = 'shop51e/v1';

  /**
   * Start up
   */
  public function __construct() {
    add_action( 'rest_api_init', function() {
      register_rest_route( $this->api, '/hello/(?P<name>\w+)', array(
        'methods' => 'GET',
        'callback' => array( $this, 'shop51e_hello_callback' ),
      ) );
    } );
  }

  public function shop51e_hello_callback( WP_REST_Request $request ) {
    $params = $request->get_params();
    $name = $params['name'];
    return "hello {$name}";
  }

}

$shop51e_api = new Shop51eAPI();

