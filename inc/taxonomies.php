<?php
/**
 * @package shop51e
 */

class Shop51eTaxonomies {
  /**
   * Holds the values to be used in the fields callbacks
   */
  private $taxonomies = array();

  /**
   * Start up
   */
  public function __construct() {
    $this->taxonomies = $this->create_taxonomies();
    add_action( 'init', array( $this, 'register_taxonomies' ) );
  }

  /**
   * create taxonomies
   *
   * @return array
   */
  public function create_taxonomies() {
    return [
//      product category
      'product_category' => [
        'object_type'           => 'product', // Post type
        'labels'                => [
          'name'              => _x( 'Product Categories', 'taxonomy general name', 'shop51e' ),
          'singular_name'     => _x( 'Product Category', 'taxonomy singular name', 'shop51e' ),
          'search_items'      => __( 'Search Product Categories', 'shop51e' ),
          'all_items'         => __( 'All Product Categories', 'shop51e' ),
          'parent_item'       => __( 'Parent Category', 'shop51e' ),
          'parent_item_colon' => __( 'Parent Category:', 'shop51e' ),
          'edit_item'         => __( 'Edit Type', 'shop51e' ),
          'update_item'       => __( 'Update Type', 'shop51e' ),
          'add_new_item'      => __( 'Add New Type', 'shop51e' ),
          'new_item_name'     => __( 'New type Name', 'shop51e' ),
          'menu_name'         => __( 'Product Categories', 'shop51e' ),
        ],
        'hierarchical'          => true,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'product_category' ),
        'show_in_rest'          => true,
        'rest_base'             => 'product_category',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
      ],
    ];
  }

  /**
   * register taxonomies
   */
  public function register_taxonomies() {
    foreach( $this->taxonomies as $tax => $args ) {
      register_taxonomy( $tax, $args['object_type'], $args );
    }
  }


}

$shop51e_taxonomies = new Shop51eTaxonomies();
