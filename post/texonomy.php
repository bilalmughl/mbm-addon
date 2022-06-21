<?php

/*-----------------------------------------------------------------------------------*/
/*	Creating Custom Taxonomy 
/*-----------------------------------------------------------------------------------*/

if (class_exists('Give')) {
	// create two taxonomies, genres and writers for the post type "book"
	function bilalmghl_give_campaign_taxonomies() {
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => _x( 'Categories', 'taxonomy general name', 'bilalmghl' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'bilalmghl' ),
			'search_items'      => __( 'Search Categories', 'bilalmghl' ),
			'all_items'         => __( 'Categories', 'bilalmghl' ),
			'parent_item'       => __( 'Parent Category', 'bilalmghl' ),
			'parent_item_colon' => __( 'Parent Category:', 'bilalmghl' ),
			'edit_item'         => __( 'Edit Category', 'bilalmghl' ),
			'update_item'       => __( 'Update Category', 'bilalmghl' ),
			'add_new_item'      => __( 'Add New Category', 'bilalmghl' ),
			'new_item_name'     => __( 'New Category', 'bilalmghl' ),
			'menu_name'         => __( 'Categories', 'bilalmghl' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'campaigncategory' ),
		);

		register_taxonomy( 'campaigncats', array( 'give_forms' ), $args );
	}
	add_action( 'init', 'bilalmghl_give_campaign_taxonomies', 0 );

	function bilalmghl_plugin_templates( $template ) {
	    if (  is_single() && get_post_type() == 'give_forms' ) {
	        $template = dirname(__FILE__) . '/templates/single-give-forms.php';
	    }
	    return $template;
	}
	add_filter('template_include', 'bilalmghl_plugin_templates');
}

if ( !function_exists('bilalmghl_single_page_title') ) {
    function bilalmghl_single_page_title(){ ?>
        <div class="barner-area white">
            <div class="barner-area-bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">                        
                        <div class="page-title">
                            <h1>
                                <?php                                    
                                    wp_title( $sep = ' ');
                                 ?>
                            </h1>
                        </div>
                        <div class="breadcumb">
                            <?php if (function_exists('bcn_display')) {
                                bcn_display();
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}