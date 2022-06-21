<?php
/*-------------------------------
	CUSTOM IMAGE SIZE
--------------------------------*/
add_image_size( 'bilalmghl_grid_big_thumb', 570, 330 );
add_image_size( 'bilalmghl_grid_small_thumb', 270, 180 );

/*------------------------------
	CUSTOM FONTS CONTROLS
-------------------------------*/
class bilalmghl_Custom_Functions{

    public function __construct() {
		add_action( 'elementor/controls/controls_registered', [ $this, 'add_custom_font' ] );  
	}
	
	public function add_custom_font( $controls_registry ){

	    $new_fonts = array(        
	        "Gilroy" => "googlefonts"
	    );

	    // For Elementor 1.7.10 and newer
	    $fonts = $controls_registry->get_control( 'font' )->get_settings( 'options' );
	    $fonts = array_merge($fonts,$new_fonts);

	    // Register here the custom font families
	    $controls_registry->get_control( 'font' )->set_settings( 'options', $fonts );  
	}
}
new bilalmghl_Custom_Functions();

/*-----------------------------
    EDD REVIEW FUNCTIONALITY
-------------------------------*/
if ( class_exists( 'EDD_Reviews' ) ) {
    /*-----------------------------------------
        Remove default edd review from content
    ------------------------------------------*/
    function bilalmghl_remove_review() {
        $edd_reviews = edd_reviews();
        remove_filter( 'the_content', array( $edd_reviews, 'load_frontend' ) );
    }
    add_action( 'template_redirect', 'bilalmghl_remove_review' );
}

/*--------------------------------------------------
    EDD DOWNLOAD DROPDOWN CATEGORY
--------------------------------------------------*/
function bilalmghl_get_terms_dropdown($taxonomies, $args){
    $myterms = get_terms( $taxonomies, $args );
    $output  = "<div class='download__search__cats '><select name='download_cats'>";
    $output .= "<option value='all'>" . esc_html__("All Categories", 'bilalmghl') . "</option>";
    foreach ($myterms as $term) {
        $term_name = $term->name;
        $slug      = $term->slug;
        $output   .= "<option value='" . $slug . "'>" . $term_name . "</option>";
    }
    $output .= "</select></div>";
    return $output;
}

/*------------------------------
    WOOCOMMERCE FUNCTIONALITY
-------------------------------*/
if ( class_exists( 'WooCommerce' ) ) {
    
    add_action( 'after_setup_theme', 'bilalmghl_woocommerce_setup' );
    function bilalmghl_woocommerce_setup() {

        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
        add_theme_support( 'woocommerce', array(
            'thumbnail_image_width' => 500,
        ));
    }

    /*---------------------------------------
        ADD EXTRA METABOX TAB TO WOOCOMMERCE
    ----------------------------------------*/
    if( !function_exists('bilalmghl_add_wc_extra_metabox_tab')){
        function bilalmghl_add_wc_extra_metabox_tab($tabs){
            $bilalmghl_tab = array(
                'label'    => __( 'Product Badge', 'bilalmghl' ),
                'target'   => 'bilalmghl_product_data',
                'class'    => '',
                'priority' => 80,
            );
            $tabs[] = $bilalmghl_tab;
            return $tabs;
        }
        add_filter( 'woocommerce_product_data_tabs', 'bilalmghl_add_wc_extra_metabox_tab' );
    }

    // add metabox to general tab
    if( !function_exists('bilalmghl_add_metabox_to_general_tab')){
        function bilalmghl_add_metabox_to_general_tab(){
            echo '<div id="bilalmghl_product_data" class="panel woocommerce_options_panel hidden">';
                woocommerce_wp_text_input( array(
                    'id'          => '_saleflash_text',
                    'label'       => __( 'Custom Product Badge Text', 'bilalmghl' ),
                    'placeholder' => __( 'New', 'bilalmghl' ),
                    'description' => __( 'Enter your prefered SaleFlash text. Ex: New / Free etc', 'bilalmghl' ),
                ) );
            echo '</div>';
        }
        add_action( 'woocommerce_product_data_panels', 'bilalmghl_add_metabox_to_general_tab' );
    }
    // Update data
    if( !function_exists('bilalmghl_save_metabox_of_general_tab') ){
        function bilalmghl_save_metabox_of_general_tab( $post_id ){
            $saleflash_text = wp_kses_post( stripslashes( $_POST['_saleflash_text'] ) );
            update_post_meta( $post_id, '_saleflash_text', $saleflash_text);
        }
        add_action( 'woocommerce_process_product_meta', 'bilalmghl_save_metabox_of_general_tab');
    }

    /*--------------------------------
        CUSTOM PRODUCT BADGE
    --------------------------------*/
    function bilalmghl_custom_product_badge( $show = 'yes' ){
        global $product;
        $custom_saleflash_text = get_post_meta( get_the_ID(), '_saleflash_text', true );
        if( $show == 'yes' ){
            if( !empty( $custom_saleflash_text ) && $product->is_in_stock() ){
                if( $product->is_featured() ){
                    echo '<span class="ht-product-label ht-product-label-left hot">' . esc_html( $custom_saleflash_text ) . '</span>';
                }else{
                    echo '<span class="ht-product-label ht-product-label-left">' . esc_html( $custom_saleflash_text ) . '</span>';
                }
            }
        }
    }

    /*--------------------------------
         SALE FLASH
    ---------------------------------*/
    function bilalmghl_sale_flash( $offertype = 'default' ){
        global $product;
        if( $product->is_on_sale() && $product->is_in_stock() ){
            if( $offertype !='default' && $product->get_regular_price() > 0 ){
                $_off_percent  = ( 1 - round( $product->get_price() / $product->get_regular_price(), 2 ))*100;
                $_off_price    = round($product->get_regular_price() - $product->get_price(), 0);
                $_price_symbol = get_woocommerce_currency_symbol();
                $symbol_pos    = get_option('woocommerce_currency_pos', 'left');
                $price_display = '';
                switch( $symbol_pos ){
                    case 'left':
                        $price_display = '-'.$_price_symbol.$_off_price;
                    break;
                    case 'right':
                        $price_display = '-'.$_off_price.$_price_symbol;
                    break;
                    case 'left_space':
                        $price_display = '-'.$_price_symbol.' '.$_off_price;
                    break;
                    default: /* right_space */
                        $price_display = '-'.$_off_price.' '.$_price_symbol;
                    break;
                }
                if( $offertype == 'number' ){
                    echo '<span class="ht-product-label ht-product-label-right">'.$price_display.'</span>';
                }elseif( $offertype == 'percent'){
                    echo '<span class="ht-product-label ht-product-label-right">'.$_off_percent.'%</span>';
                }else{ echo ' '; }

            }else{
                echo '<span class="ht-product-label ht-product-label-right">'.esc_html__( 'Sale!', 'bilalmghl' ).'</span>';
            }
        }else{
            $out_of_stock      = get_post_meta( get_the_ID(), '_stock_status', true );
            $out_of_stock_text = apply_filters( 'bilalmghl_shop_out_of_stock_text', __( 'Out of stock', 'bilalmghl' ) );
            if ( 'outofstock' === $out_of_stock ) {
                echo '<span class="ht-stockout ht-product-label ht-product-label-right">'.esc_html( $out_of_stock_text ).'</span>';
            }
        }
    }

    /*------------------------------------
        WOOCOMMERCE DEFAULT RESULT COUNT
    --------------------------------------*/
    function bilalmghl_product_result_count( $total, $perpage, $paged ){
        wc_set_loop_prop( 'total', $total );
        wc_set_loop_prop( 'per_page', $perpage );
        wc_set_loop_prop( 'current_page', $paged );
        $geargs = array(
            'total'    => wc_get_loop_prop( 'total' ),
            'per_page' => wc_get_loop_prop( 'per_page' ),
            'current'  => wc_get_loop_prop( 'current_page' ),
        );
        wc_get_template( 'loop/result-count.php', $geargs );
    }

    /*-------------------------------------
        WOOCOMMERCE DEFAULT PRODUCT SHORTING
    ---------------------------------------*/
    function bilalmghl_product_shorting( $getorderby ){
        ?>
        <div class="bilalmghl-custom-sorting">
            <form class="woocommerce-ordering" method="get">
                <select name="orderby" class="orderby">
                    <?php
                        $catalog_orderby = apply_filters( 'woocommerce_catalog_orderby', array(
                            'menu_order' => __( 'Default sorting', 'bilalmghl' ),
                            'popularity' => __( 'Sort by popularity', 'bilalmghl' ),
                            'rating'     => __( 'Sort by average rating', 'bilalmghl' ),
                            'date'       => __( 'Sort by latest', 'bilalmghl' ),
                            'price'      => __( 'Sort by price: low to high', 'bilalmghl' ),
                            'price-desc' => __( 'Sort by price: high to low', 'bilalmghl' ),
                        ) );
                        foreach ( $catalog_orderby as $id => $name ){
                            echo '<option value="' . esc_attr( $id ) . '" ' . selected( $getorderby, $id, false ) . '>' . esc_attr( $name ) . '</option>';
                        }
                    ?>
                </select>
                <?php
                    // Keep query string vars intact
                    foreach ( $_GET as $key => $val ) {
                        if ( 'orderby' === $key || 'submit' === $key )
                            continue;
                        if ( is_array( $val ) ) {
                            foreach( $val as $innerVal ) {
                                echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
                            }
                        } else {
                            echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
                        }
                    }
                ?>
            </form>
        </div>
        <?php
    }

    /*------------------------------
        CUSTOM PAGE PAGINATION
    -------------------------------*/
    function bilalmghl_custom_pagination( $totalpage ){
        echo '<div class="ht-row woocommerce"><div class="ht-col-xs-12"><nav class="woocommerce-pagination">';
            echo paginate_links( apply_filters(
                    'woocommerce_pagination_args', array(
                        'base'      => esc_url( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ), 
                        'format'    => '', 
                        'current'   => max( 1, get_query_var( 'paged' ) ), 
                        'total'     => $totalpage, 
                        'prev_text' => '&larr;', 
                        'next_text' => '&rarr;', 
                        'type'      => 'list', 
                        'end_size'  => 3, 
                        'mid_size'  => 3 
                    )
                )       
            );
        echo '</div></div></div>';
    }

    /*------------------------------
        CHANGE PRODUCT PER PAGE
    --------------------------------*/

    /*-----------------------------------------
        ADD TO CART BUTTON
    -----------------------------------------*/
    function bilalmghl_woocommerce_addcart(){
        echo '<div class="bilalmghl__add__to__cart">';
            woocommerce_template_loop_add_to_cart();
        echo '</div>';
    }
}

/*------------------------------------------
    PRODUCT QUICKVIEW BUTTON
-------------------------------------------*/
/**
* [yith_quick_view product_id="30" type="button" label="Quick View"]
* Usages: Compare button shortcode [yith_compare_button] From "YITH WooCommerce Quickview" plugins.
* Plugins URL: https://wordpress.org/plugins/yith-woocommerce-quickview/
* File Path: https://docs.yithemes.com/yith-woocommerce-quick-view/premium-version-settings/shortcode/
* The Function "bilalmghl_woocommerce_compare_button" Depends on YITH WooCommerce Compare plugins. If YITH WooCommerce Compare is installed and actived, then it will work.
*/
function bilalmghl_quick_view_button( $product_id = 0, $label = '', $return = false ) {
    if( !class_exists('YITH_WCQV_Frontend') ){
        return;
    }
    global $product;

    if( ! $product_id ){
        $product instanceof WC_Product && $product_id = yit_get_prop( $product, 'id', true );
    }
    $show_quick_view_button = apply_filters( 'yith_wcqv_show_quick_view_button', true, $product_id );
    if( !$show_quick_view_button ) return;

    $button = '';
    if( $product_id ) {
        // get label
        $label  = $label ? $label : esc_html__( 'Quick View', 'bilalmghl' );
        $button = '<div class="bilalmghl__quickview__button"><a title="'.esc_attr__( 'Quick View', 'bilalmghl' ).'" href="#" class="button yith-wcqv-button" data-product_id="' . $product_id . '"><i class="ti ti-zoom-in"></i>' . $label . '</a></div>';
        $button = apply_filters('yith_add_quick_view_button_html', $button, $label, $product);
    }
    if( $return ) {
        return $button;
    }
    echo $button;
}
remove_action( 'woocommerce_after_shop_loop_item', 'yith_add_quick_view_button', 15 );
remove_action( 'yith_wcwl_table_after_product_name', 'yith_add_quick_view_button', 15 );

/*------------------------------------------
    PRODUCT WISHLIST BUTTON
-------------------------------------------*/
/**
* Usages: "bilalmghl_add_to_wishlist_button()" function is used  to modify the wishlist button from "YITH WooCommerce Wishlist" plugins.
* Plugins URL: https://wordpress.org/plugins/yith-woocommerce-wishlist/
* File Path: yith-woocommerce-wishlist/templates/add-to-wishlist.php
* The below Function depends on YITH WooCommerce Wishlist plugins. If YITH WooCommerce Wishlist is installed and actived, then it will work.
*/

function bilalmghl_add_to_wishlist_button( $normalicon = '<i class="fa fa-heart-o"></i>', $addedicon = '<i class="fa fa-heart"></i>', $tooltip = 'no' ) {
    global $product, $yith_wcwl;

    if ( ! class_exists( 'YITH_WCWL' ) || empty(get_option( 'yith_wcwl_wishlist_page_id' ))) return;

    $url          = YITH_WCWL()->get_wishlist_url();
    $product_type = $product->get_type();
    $exists       = $yith_wcwl->is_product_in_wishlist( $product->get_id() );
    $classes      = 'class="add_to_wishlist"';
    $add          = get_option( 'yith_wcwl_add_to_wishlist_text' );
    $browse       = get_option( 'yith_wcwl_browse_wishlist_text' );
    $added        = get_option( 'yith_wcwl_product_added_text' );

    $output = '';
    $output  .= '<div class="'.( $tooltip == 'yes' ? '' : 'tooltip_no' ).' wishlist button-default yith-wcwl-add-to-wishlist add-to-wishlist-' . esc_attr( $product->get_id() ) . '">';
        $output .= '<div class="yith-wcwl-add-button';
            $output .= $exists ? ' hide" style="display:none;"' : ' show"';
            $output .= '><a href="' . esc_url( htmlspecialchars( YITH_WCWL()->get_wishlist_url() ) ) . '" data-product-id="' . esc_attr( $product->get_id() ) . '" data-product-type="' . esc_attr( $product_type ) . '" ' . $classes . ' >'.$normalicon.'<span class="bilalmghl__product__action__tooltip">'.esc_html( $add ).'</span></a>';
            $output .= '<i class="fa fa-spinner fa-pulse ajax-loading" style="visibility:hidden"></i>';
        $output .= '</div>';

        $output .= '<div class="yith-wcwl-wishlistaddedbrowse show" style="display:block;"><a class="" href="' . esc_url( $url ) . '">'.$addedicon.'<span class="bilalmghl__product__action__tooltip">'.esc_html( $browse ).'</span></a></div>';
        $output .= '<div class="yith-wcwl-wishlistexistsbrowse ' . ( $exists ? 'show' : 'hide' ) . '" style="display:' . ( $exists ? 'block' : 'none' ) . '"><a href="' . esc_url( $url ) . '" class="">'.$addedicon.'<span class="bilalmghl__product__action__tooltip">'.esc_html( $added ).'</span></a></div>';
    $output .= '</div>';
    echo $output;
}

/*------------------------------------------
    PRODUCT COMPARE BUTTON
-------------------------------------------*/
/**
* Usages: Compare button shortcode [yith_compare_button] From "YITH WooCommerce Compare" plugins.
* Plugins URL: https://wordpress.org/plugins/yith-woocommerce-compare/
* File Path: yith-woocommerce-compare/includes/class.yith-woocompare-frontend.php
* The Function "bilalmghl_woocommerce_compare_button" Depends on YITH WooCommerce Compare plugins. If YITH WooCommerce Compare is installed and actived, then it will work.
*/
function bilalmghl_woocommerce_compare_button( $buttonstyle = 1 ){
    if( !class_exists('YITH_Woocompare') ) return;
    global $product;
    $product_id = $product->get_id();
    $comp_link  = site_url() . '?action=yith-woocompare-add-product';
    $comp_link  = add_query_arg('id', $product_id, $comp_link);

    if( $buttonstyle == 1 ){
        echo do_shortcode('[yith_compare_button]');
    }else{
        echo '<a href="'. esc_url( $comp_link ) .'" class="bilalmghl__compare__button woocommerce product compare-button" data-product_id="'. esc_attr( $product_id ) .'" rel="nofollow"><i class="ti ti-reload"></i>'.esc_html__( 'Compare', 'bilalmghl' ).'</a>';
    }
}


/*----------------------------
	CONTACT FORM 7 RETURN ARRAY
-------------------------------*/
function bilalmghl_get_contact_forms_seven_list(){

	$forms_list = array();
	$forms_args = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
	$forms      = get_posts( $forms_args );

    if( $forms ){
        foreach ( $forms as $form ){
            $forms_list[$form->ID] = $form->post_title;
        }
    }else{
        $forms_list[ esc_html__( 'No contact form found', 'bilalmghl' ) ] = 0;
    }
    return $forms_list;
}

/*---------------------------
	WP FORMS RETURN ARRAY
-----------------------------*/
function bilalmghl_get_wpforms_forms_list(){

	$forms_list = array();
	$forms_args = array( 'posts_per_page' => -1, 'post_type'=> 'wpforms' );
	$forms      = get_posts( $forms_args );
    if( $forms ){
        foreach ( $forms as $form ){
            $forms_list[$form->ID] = $form->post_title;
        }
    }else{
        $forms_list[ __( 'Form not found', 'bilalmghl' ) ] = 0;
    }
    return $forms_list;
}

/*---------------------------
	WE FORM RETURN ARRAY
-----------------------------*/
function bilalmghl_get_we_forms_list() {

    $forms = [];
    if ( class_exists( 'WeForms' ) ) {
        $_forms = get_posts( [
			'post_type'      => 'wpuf_contact_form',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => 'title',
			'order'          => 'ASC',
        ] );

        if ( ! empty( $_forms ) ) {
            $forms = wp_list_pluck( $_forms, 'post_title', 'ID' );
        }
    }
    return $forms;
}

/*---------------------------
	NINJA FORM RETURN ARRAY
-----------------------------*/
function bilalmghl_get_ninja_forms_list() {

    $form_list = array();
    if ( class_exists( 'Ninja_Forms' ) ) {
        $ninja_forms  = Ninja_Forms()->form()->get_forms();
        if ( ! empty( $ninja_forms ) && ! is_wp_error( $ninja_forms ) ) {
            $form_list = ['0' => esc_html__( 'Select Form', 'bilalmghl' )];
            foreach ( $ninja_forms as $form ) {   
                $form_list[ $form->get_id() ] = $form->get_setting( 'title' );
            }
        }
    } else {
        $form_list = ['0' => esc_html__( 'Form Not Found.', 'bilalmghl' ) ];
    }
    return $form_list;
}

/*---------------------------
	CALDERA FORM RETURN ARRAY
-----------------------------*/
function bilalmghl_get_caldera_forms_list() {

    if ( class_exists( 'Caldera_Forms' ) ) {
		$caldera_forms = Caldera_Forms_Forms::get_forms( true, true );
		$form_list     = ['0' => esc_html__( 'Select Form', 'bilalmghl' )];
		$form          = array();
        if ( ! empty( $caldera_forms ) && ! is_wp_error( $caldera_forms ) ) {
            foreach ( $caldera_forms as $form ) {
                if ( isset($form['ID']) and isset($form['name'])) {
                    $form_list[$form['ID']] = $form['name'];
                }   
            }
        }
    }else{
        $form_list = ['0' => esc_html__( 'Form Not Found!', 'bilalmghl' ) ];
    }
    return $form_list;
}

/*---------------------------
	GRAVITY FORM RETURN ARRAY
----------------------------*/
function bilalmghl_get_gravity_forms_list() {
    if ( class_exists( 'GFForms' ) ) {
		$gravity_forms = \RGFormsModel::get_forms( null, 'title' );
		$form_list     = ['0' => esc_html__( 'Select Form', 'bilalmghl' )];
        if ( ! empty( $gravity_forms ) && ! is_wp_error( $gravity_forms ) ) {
            foreach ( $gravity_forms as $form ) {   
                $form_list[ $form->id ] = $form->title;
            }
        }
    }else{
        $form_list = ['0' => esc_html__( 'Form Not Found!', 'bilalmghl' ) ];
    }
    return $form_list;
}

/*----------------------------
    FLUENT FORM LIST ARRAY
------------------------------*/
function bilalmghl_fluent_form_list(){
    if( function_exists( 'wpFluent' ) ){

        $fluent_forms = wpFluent()->table('fluentform_forms')->select(['id', 'title'])->orderBy('id', 'DESC')->get();
        $form_list    = ['0' => esc_html__( 'Select Form', 'bilalmghl' )];

        if ($fluent_forms) {
            $form_list[0] = esc_html__('Select a Fluent Form', 'bilalmghl');
            foreach ($fluent_forms as $form) {
                $form_list[$form->id] = $form->title .' ('.$form->id.')';
            }
        } else {
            $form_list[0] = esc_html__('Create a Form First', 'bilalmghl');
        }
    }else{
        $form_list = ['0' => esc_html__( 'Form Not Found!', 'bilalmghl' ) ];
    }
    return $form_list;
}

/*----------------------------
    SPACETHEME WIDGETS CONTROL
-----------------------------*/
function bilalmghl_widget_control(){
    return [
        'accordion'          => esc_html__( 'Accordion', 'bilalmghl' ),
        'animate_headline'   => esc_html__( 'Animate Headline', 'bilalmghl' ),
        'area_title'         => esc_html__( 'Area Title', 'bilalmghl' ),
        'box'                => esc_html__( 'Box', 'bilalmghl' ),
        'business_hours'     => esc_html__( 'Business Hour', 'bilalmghl' ),
        'cf7'                => esc_html__( 'Contact Form 7', 'bilalmghl' ),
        'copyright_text'     => esc_html__( 'Copyright Text', 'bilalmghl' ),
        'countdown_circle'   => esc_html__( 'Countdown Circle', 'bilalmghl' ),
        'counter'            => esc_html__( 'Counter', 'bilalmghl' ),
        'download_button'    => esc_html__( 'Download Button', 'bilalmghl' ),
        'dual_button'        => esc_html__( 'Dual Button', 'bilalmghl' ),
        'icon_listing'       => esc_html__( 'Mega Icon Listing', 'bilalmghl' ),
        'image_carousel'     => esc_html__( 'Image Carousel', 'bilalmghl' ),
        'info_box'           => esc_html__( 'Info Box', 'bilalmghl' ),
        'navigation_menu'    => esc_html__( 'Navigation Menu', 'bilalmghl' ),
        'post_carousel'      => esc_html__( 'Post Carousel', 'bilalmghl' ),
        'position_element'   => esc_html__( 'Position Element', 'bilalmghl' ),
        'portfolio'          => esc_html__( 'Portfolio', 'bilalmghl' ),
        'portfolio_carousel' => esc_html__( 'Portfolio Carousel', 'bilalmghl' ),
        'price_table'        => esc_html__( 'Price Table', 'bilalmghl' ),
        'shortcode'          => esc_html__( 'Shortcode', 'bilalmghl' ),
        'socials'            => esc_html__( 'Socials', 'bilalmghl' ),
        'subscriber_form'    => esc_html__( 'Subscriber Form', 'bilalmghl' ),
        'tabs'               => esc_html__( 'Tabs', 'bilalmghl' ),
        'teams'              => esc_html__( 'Teams', 'bilalmghl' ),
        'testimonials'       => esc_html__( 'Testimonial', 'bilalmghl' ),
        'video'              => esc_html__( 'Video', 'bilalmghl' ),
        'video_popup_button' => esc_html__( 'Video Popup Button', 'bilalmghl' ),
        'welcome_slides'     => esc_html__( 'Welcome Slides', 'bilalmghl' ),
        'base_effect'        => esc_html__( 'Base Effect', 'bilalmghl' ),
        'Lottie_Animation'   => esc_html__( 'Lottie Animation', 'bilalmghl' ),
        'timeline_slides'     => esc_html__( 'Timeline Slides', 'bilalmghl' ),
    ];
}



function bilalmghl_mime_types($mimes) {
    $mimes['json'] = 'application/json'; 
    $mimes['svg'] = 'image/svg+xml'; 
    return $mimes; 
} 
add_filter('upload_mimes', 'bilalmghl_mime_types');


if( !function_exists( 'bilalmghl_render_icons' ) ){
        
    /**
     * bilalmghl_render_icons
     *
     * @param  array $content
     * @param  string $class
     * @return mixed
     */
    function bilalmghl_render_icons( $content = array(), $class = '' ){

        if ( !is_array( $content ) ) {
            return false;
        }
    
        if ( is_array( $content['value'] ) ) {
            $svg_icon = $content['value']['url'];
        }else{
            $font_icon = $content['value'];
        }
    
        if( !is_array( $content['value'] ) && $font_icon ){
            if($class){
                return '<i class="'.$class.' '.esc_attr( $font_icon ).'"></i>';
            }else{
                return '<i class="'.esc_attr( $font_icon ).'"></i>';
            }
        }
    
        if ( $content['library'] == 'svg' ) {
            try{
                $url_basename = basename( $svg_icon ); 
                $svg_ext      = explode( '.',$url_basename )[1];
    
                $svg_file     = wp_remote_get( $svg_icon );
                $svg_file     = wp_remote_retrieve_body($svg_file );
                $find_string  = '<svg';
                $position     = strpos( $svg_file, $find_string );
                $svg_file_new = substr( $svg_file, $position );
                return $svg_file_new;
            }catch(\Exception $e) {
                return false;
            }
        }
    }
}

if ( !function_exists( 'bilalmghl_kses' ) ) {

    function bilalmghl_kses( $raw ) {
        $allowed_tags = array(
            'a'                             => array(
                'class'  => array(),
                'href'   => array(),
                'rel'    => array(),
                'title'  => array(),
                'target' => array(),
            ),
            'option'                        => array(
                'value' => array(),
            ),
            'abbr'                          => array(
                'title' => array(),
            ),
            'b'                             => array(),
            'blockquote'                    => array(
                'cite' => array(),
            ),
            'cite'                          => array(
                'title' => array(),
            ),
            'code'                          => array(),
            'del'                           => array(
                'datetime' => array(),
                'title'    => array(),
            ),
            'dd'                            => array(),
            'div'                           => array(
                'class' => array(),
                'title' => array(),
                'style' => array(),
            ),
            'dl'                            => array(),
            'dt'                            => array(),
            'em'                            => array(),
            'h1'                            => array(),
            'h2'                            => array(),
            'h3'                            => array(),
            'h4'                            => array(),
            'h5'                            => array(),
            'h6'                            => array(),
            'i'                             => array(
                'class' => array(),
            ),
            'img'                           => array(
                'alt'    => array(),
                'class'  => array(),
                'height' => array(),
                'src'    => array(),
                'width'  => array(),
            ),
            'li'                            => array(
                'class' => array(),
            ),
            'ol'                            => array(
                'class' => array(),
            ),
            'p'                             => array(
                'class' => array(),
            ),
            'q'                             => array(
                'cite'  => array(),
                'title' => array(),
            ),
            'span'                          => array(
                'class' => array(),
                'title' => array(),
                'style' => array(),
            ),
            'iframe'                        => array(
                'width'       => array(),
                'height'      => array(),
                'scrolling'   => array(),
                'frameborder' => array(),
                'allow'       => array(),
                'src'         => array(),
            ),
            'strike'                        => array(),
            'br'                            => array(),
            'small'                         => array(),
            'strong'                        => array(),
            'data-wow-duration'             => array(),
            'data-wow-delay'                => array(),
            'data-wallpaper-options'        => array(),
            'data-stellar-background-ratio' => array(),
            'ul'                            => array(
                'class' => array(),
            ),
        );
        if ( function_exists( 'wp_kses' ) ) { // WP is here
            $allowed = wp_kses( $raw, $allowed_tags );
        } else {
            $allowed = $raw;
        }
        return $allowed;
    }
}