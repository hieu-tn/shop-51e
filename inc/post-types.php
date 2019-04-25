<?php
/**
 * @package shop51e
 */

class Shop51ePostTypes {
  /**
   * Holds the values to be used in the fields callbacks
   */
  private $post_types = array();

  /**
   * Start up
   */
  public function __construct() {
    $this->post_types = $this->create_post_types();
    add_action( 'init', array( $this, 'register_post_type' ) );
  }

  /**
   * create post types
   *
   * @return array
   */
  public function create_post_types() {
    return [
//      product
      'product' => [
        'labels'                => [
          'name'               => _x( 'Products', 'post type general name', 'shop51e' ),
          'singular_name'      => _x( 'Product', 'post type singular name', 'shop51e' ),
          'menu_name'          => _x( 'Products', 'admin menu', 'shop51e' ),
          'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'shop51e' ),
          'add_new'            => __( 'Add New', 'Product', 'shop51e' ),
          'add_new_item'       => __( 'Add New Product', 'shop51e' ),
          'new_item'           => __( 'New Product', 'shop51e' ),
          'edit_item'          => __( 'Edit Product', 'shop51e' ),
          'view_item'          => __( 'View Product', 'shop51e' ),
          'all_items'          => __( 'All Products', 'shop51e' ),
          'search_items'       => __( 'Search Products', 'shop51e' ),
          'parent_item_colon'  => __( 'Parent Products:', 'shop51e' ),
          'not_found'          => __( 'No Products found.', 'shop51e' ),
          'not_found_in_trash' => __( 'No Products found in Trash.', 'shop51e' )
        ],
        'description'           => __( 'Description.', 'shop51e' ),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 5,
        'show_in_rest'          => true,
        'rest_base'             => 'products',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'menu_icon'             => 'dashicons-screenoptions',
        'supports'              => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ]
      ],
//      order
      'order' => [
        'labels'                => [
          'name'               => _x( 'Orders', 'post type general name', 'shop51e' ),
          'singular_name'      => _x( 'Order', 'post type singular name', 'shop51e' ),
          'menu_name'          => _x( 'Orders', 'admin menu', 'shop51e' ),
          'name_admin_bar'     => _x( 'Order', 'add new on admin bar', 'shop51e' ),
          'add_new'            => __( 'Add New', 'Order', 'shop51e' ),
          'add_new_item'       => __( 'Add New Order', 'shop51e' ),
          'new_item'           => __( 'New Order', 'shop51e' ),
          'edit_item'          => __( 'Edit Order', 'shop51e' ),
          'view_item'          => __( 'View Order', 'shop51e' ),
          'all_items'          => __( 'All Orders', 'shop51e' ),
          'search_items'       => __( 'Search Orders', 'shop51e' ),
          'parent_item_colon'  => __( 'Parent Orders:', 'shop51e' ),
          'not_found'          => __( 'No Orders found.', 'shop51e' ),
          'not_found_in_trash' => __( 'No Orders found in Trash.', 'shop51e' )
        ],
        'description'           => __( 'Description.', 'shop51e' ),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 5,
        'show_in_rest'          => true,
        'rest_base'             => 'orders',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'menu_icon'             => 'dashicons-cart',
        'supports'              => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ]
      ],
//      promotion
      'promotion' => [
        'labels'                => [
          'name'               => _x( 'Promotions', 'post type general name', 'shop51e' ),
          'singular_name'      => _x( 'Promotion', 'post type singular name', 'shop51e' ),
          'menu_name'          => _x( 'Promotions', 'admin menu', 'shop51e' ),
          'name_admin_bar'     => _x( 'Promotion', 'add new on admin bar', 'shop51e' ),
          'add_new'            => __( 'Add New', 'Promotion', 'shop51e' ),
          'add_new_item'       => __( 'Add New Promotion', 'shop51e' ),
          'new_item'           => __( 'New Promotion', 'shop51e' ),
          'edit_item'          => __( 'Edit Promotion', 'shop51e' ),
          'view_item'          => __( 'View Promotion', 'shop51e' ),
          'all_items'          => __( 'All Promotions', 'shop51e' ),
          'search_items'       => __( 'Search Promotions', 'shop51e' ),
          'parent_item_colon'  => __( 'Parent Promotions:', 'shop51e' ),
          'not_found'          => __( 'No Promotions found.', 'shop51e' ),
          'not_found_in_trash' => __( 'No Promotions found in Trash.', 'shop51e' )
        ],
        'description'           => __( 'Description.', 'shop51e' ),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 5,
        'show_in_rest'          => true,
        'rest_base'             => 'promotions',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'menu_icon'             => 'dashicons-megaphone',
        'supports'              => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ]
      ],
    ];
  }

  /**
   * register post types
   */
  public function register_post_type() {
    foreach( $this->post_types as $type => $args ) {
      register_post_type( $type, $args );
    }
  }

}

$shop51e_post_types = new Shop51ePostTypes();
