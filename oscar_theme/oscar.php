<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class Bilalmghl_Elementor_Extension {

	const VERSION                   = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
	const MINIMUM_PHP_VERSION       = '5.7';

	private static $_instance = null;
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}
	public function init() {

		load_plugin_textdomain( 'bilalmghl' );

		/*---------------------------------
			Check if Elementor installed and activated
		-----------------------------------*/
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		/*---------------------------------
			Check for required Elementor version
		----------------------------------*/
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		/*----------------------------------
			Check for required PHP version
		-----------------------------------*/
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		/*----------------------------------
			ADD NEW ELEMENTOR CATEGORIES
		------------------------------------*/
		add_action( 'elementor/init', [ $this, 'add_elementor_category' ] );

		/*----------------------------------
			ADD PLUGIN WIDGETS ACTIONS
		-----------------------------------*/
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

		/*----------------------------------
			ELEMENTOR REGISTER CONTROL
		-----------------------------------*/
		add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );

		/*----------------------------------
			EDITOR STYLE
		----------------------------------*/
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'bilalmghl_editor_styles' ] );

		/*----------------------------------
			ENQUEUE DEFAULT SCRIPT
		-----------------------------------*/
		add_action( 'wp_enqueue_scripts', array ( $this, 'bilalmghl_default_scripts' ) );

		/*----------------------------------
			EDITOR ENQUEUE STYLE & SCRIPTS
		-----------------------------------*/
		/*add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'register_widget_scripts' ] );
		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );*/

		/*---------------------------------
			REGISTER FRONTEND SCRIPTS
		----------------------------------*/
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'bilalmghl_register_frontend_scripts' ] );
		add_action( 'elementor/frontend/after_register_styles', [ $this, 'bilalmghl_register_frontend_styles' ]);

		/*--------------------------------
			ENQUEUE FRONTEND SCRIPTS
		---------------------------------*/
		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'bilalmghl_enqueue_frontend_scripts' ] );
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'bilalmghl_enqueue_frontend_style' ] );

		if (file_exists(dirname(__FILE__) . '/post/texonomy.php' )) {
			require_once(dirname(__FILE__) . '/post/texonomy.php' );
		}
		if (file_exists(dirname(__FILE__) . '/inc/helper_functions.php' )) {
			require_once(dirname(__FILE__) . '/inc/helper_functions.php' );
		}

		if (file_exists(dirname(__FILE__) . '/inc/icons.php' )) {
			require_once(dirname(__FILE__) . '/inc/icons.php' );
		}
	}

	/*******************************
	 * 	ADD ASSETS
	 *******************************/

	public function bilalmghl_editor_styles(){
		wp_enqueue_style( 'bilalmghl-editor', OSCAR_ADDONS_ROOT_CSS . 'bilalmghl-editor.css' );
	}

	public function bilalmghl_default_scripts(){
		wp_enqueue_style( 'bilalmghl-widgets', OSCAR_ADDONS_ROOT_CSS . 'widgets.css' );
		if ( class_exists('Give') ) {
			wp_enqueue_style( 'overwrite', OSCAR_ADDONS_ROOT_CSS . 'overwrite.css', array('give-styles'), BILALMGHL_VERSION, 'all' );
		}
	}

	/**
	 * Enqueue Widget Scripts
	 *
	 * Enqueue custom Scripts required to run Skima Core.
	 *
	 * @since 1.7.0
	 * @since 1.7.1 The method moved to this class.
	 *
	 * @access public
	 */
	public function bilalmghl_enqueue_frontend_scripts(){
        wp_enqueue_script( 'appear', OSCAR_ADDONS_ROOT_JS . 'appear.js', array('jquery'), BILALMGHL_VERSION, true );
        wp_enqueue_script( 'waypoints', OSCAR_ADDONS_ROOT_JS . 'waypoints.min.js', array('jquery'), BILALMGHL_VERSION, true );
	}

	/**
	 * Register Widget Scripts
	 *
	 * Register custom scripts required to run Skima Core.
	 *
	 * @since 1.6.0
	 * @since 1.7.1 The method moved to this class.
	 *
	 * @access public
	 */
	public function bilalmghl_register_frontend_scripts() {

        wp_register_script( 'owl-carousel', OSCAR_ADDONS_ROOT_JS . 'owl.carousel.min.js', array('jquery'), BILALMGHL_VERSION, true );
        wp_register_script( 'slick', OSCAR_ADDONS_ROOT_JS . 'slick.min.js', array('jquery'), BILALMGHL_VERSION, true );
        wp_register_script( 'swiper', OSCAR_ADDONS_ROOT_JS . 'swiper.min.js', array('jquery'), BILALMGHL_VERSION, true );
        wp_register_script( 'modal-video', OSCAR_ADDONS_ROOT_JS . 'modal-video.min.js', array('jquery'), BILALMGHL_VERSION, true );
        wp_register_script( 'svg-progress', OSCAR_ADDONS_ROOT_JS . 'svg-progress-min.js', array('jquery'), BILALMGHL_VERSION, true );
        wp_register_script( 'TimeCircle', OSCAR_ADDONS_ROOT_JS . 'TimeCircles.js', array('jquery'), BILALMGHL_VERSION, true );
        wp_register_script( 'roadmap', OSCAR_ADDONS_ROOT_JS . 'roadmap.min.js', array('jquery'), BILALMGHL_VERSION, true );
        wp_register_script( 'timeline', OSCAR_ADDONS_ROOT_JS . 'timeline.min.js', array('jquery'), BILALMGHL_VERSION, true );
        wp_register_script( 'tooltipster', OSCAR_ADDONS_ROOT_JS . 'tooltipster.bundle.min.js', array('jquery'), BILALMGHL_VERSION, true );
        wp_register_script( 'animatedheadline', OSCAR_ADDONS_ROOT_JS . 'jquery.animatedheadline.min.js', array('jquery'), BILALMGHL_VERSION, true );
        wp_register_script( 'easyBar', OSCAR_ADDONS_ROOT_JS . 'easyBar.js', array('jquery','waypoints'), BILALMGHL_VERSION, true );

        /*--------------------------
			SINGLE SCRIPTS
        ---------------------------*/
        wp_register_script( 'isotope', OSCAR_ADDONS_ROOT_JS . 'isotope.pkgd.min.js', array('jquery','imagesloaded'), BILALMGHL_VERSION, true );
        wp_register_script( 'masonry', array('jquery', 'imagesloaded') );
        wp_register_script( 'ajaxchimp', OSCAR_ADDONS_ROOT_JS . 'ajaxchimp.js', array('jquery'), BILALMGHL_VERSION, true );
        wp_register_script( 'anime', OSCAR_ADDONS_ROOT_JS . 'anime.min.js', array('jquery'), BILALMGHL_VERSION, true );
        wp_register_script( 'bilalmghl-effect', OSCAR_ADDONS_ROOT_JS . 'bilalmghl-effect.min.js', array('jquery'), BILALMGHL_VERSION, true );

		wp_register_script('lottie-player', 'https://unpkg.com/@lottiefiles/lottie-player@0.4.0/dist/lottie-player.js',['bilalmghl-core'],BILALMGHL_VERSION,true);
        wp_register_script('lottie-interactivity', 'https://unpkg.com/@lottiefiles/lottie-interactivity@latest/dist/lottie-interactivity.min.js',['bilalmghl-core'],BILALMGHL_VERSION, true);


        wp_register_script( 'base_effect', OSCAR_ADDONS_ROOT_JS . 'bilalmghl_base_effect.js', array('jquery'), BILALMGHL_VERSION, true );
        //wp_register_script( 'base_effect_2', OSCAR_ADDONS_ROOT_JS . 'bilalmghl_base_effect_2.js', array('jquery'), BILALMGHL_VERSION, true );
        

        wp_register_script( 'bilalmghl-core', OSCAR_ADDONS_ROOT_JS . 'active.js', array('jquery'), BILALMGHL_VERSION, true );
	}

	/**
	 * Enqueue Widget Styles
	 *
	 * Enqueue custom styles required to run Skima Core.
	 *
	 * @since 1.7.0
	 * @since 1.7.1 The method moved to this class.
	 *
	 * @access public
	 */
	public function bilalmghl_enqueue_frontend_style() {
		wp_dequeue_style('e-animations');
		wp_deregister_style('e-animations');
        wp_enqueue_style( 'be-animate', OSCAR_ADDONS_ROOT_CSS . 'animate.css', array('e-animations') );
	}

	/**
	 * Register Widget Styles
	 *
	 * Register custom styles required to run Skima Core.
	 *
	 * @since 1.7.0
	 * @since 1.7.1 The method moved to this class.
	 *
	 * @access public
	 */
	public function bilalmghl_register_frontend_styles(){
		wp_register_style( 'owl-carousel', OSCAR_ADDONS_ROOT_CSS .'owl.carousel.css' );
        wp_register_style( 'slick', OSCAR_ADDONS_ROOT_CSS .'slick.min.css' );
        wp_register_style( 'swiper', OSCAR_ADDONS_ROOT_CSS .'swiper.min.css' );
        wp_register_style( 'modal-video', OSCAR_ADDONS_ROOT_CSS .'modal-video.min.css' );
        wp_register_style( 'TimeCircle', OSCAR_ADDONS_ROOT_CSS .'TimeCircles.css' );
        wp_register_style( 'roadmap', OSCAR_ADDONS_ROOT_CSS .'roadmap.min.css' );
        wp_register_style( 'timeline', OSCAR_ADDONS_ROOT_CSS .'timeline.min.css' );
        wp_register_style( 'tooltipster', OSCAR_ADDONS_ROOT_CSS .'tooltipster.bundle.min.css' );
        wp_register_style( 'animatedheadline', OSCAR_ADDONS_ROOT_CSS .'jquery.animatedheadline.css' );
        wp_register_style( 'easyBar', OSCAR_ADDONS_ROOT_CSS .'easyBar.css' );
	}

	/***************************
	 * 	VERSION CHECK
	 * *************************/
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bilalmghl' ),
			'<strong>' . esc_html__( 'Elementor bilalmghl Addons', 'bilalmghl' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'bilalmghl' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**************************
	 * 	MISSING NOTICE
	 ***************************/
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'bilalmghl' ),
			'<strong>' . esc_html__( 'Elementor bilalmghl Addons', 'bilalmghl' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'bilalmghl' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/****************************
	 * 	PHP VERSION NOTICE
	 ****************************/
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bilalmghl' ),
			'<strong>' . esc_html__( 'Elementor bilalmghl Addons', 'bilalmghl' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'bilalmghl' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/****************************
	 * 	INIT WIDGETS
	 ****************************/
	public function init_widgets() {
		$this->bilalmghl_widgets();
		$this->bilalmghl_widgets_register();
	}

	public function bilalmghl_widgets(){
		/*---------------------------
			Include Widget files
		-----------------------------*/
		if (array_key_exists( 'accordion', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/adv_accordion.php' );
		}
		if (array_key_exists( 'animate_headline', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/animate_headline.php' );
		}
		if (array_key_exists( 'area_title', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/area_title.php' );
		}

		if (array_key_exists( 'box', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/box.php' );
		}
		if (array_key_exists( 'business_hours', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/business_hours.php' ); /* Also It Will Be Used For Mega Listing With Icon*/
		}

		if (array_key_exists( 'cf7', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/cf7.php' );
		}
		if (array_key_exists( 'copyright_text', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/copyright_text.php' );
		}
		if (array_key_exists( 'countdown_circle', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/countdown_circle.php' );
		}
		if (array_key_exists( 'counter', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/counter.php' );
		}
		if (array_key_exists( 'counter_circle', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/counter_circle.php' );
		}

		if (array_key_exists( 'download_button', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/download_button.php' );
		}
		if (array_key_exists( 'dual_button', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/dual_button.php' );
		}
		if (array_key_exists( 'dual_text', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/dual_text.php' );
		}

		if (array_key_exists( 'edd', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/edd.php' );
		}
		if (array_key_exists( 'edd_login', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/edd_login.php' );
		}
		if (array_key_exists( 'edd_products', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/edd_products.php' );
		}
		if (array_key_exists( 'edd_register', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/edd_register.php' );
		}
		if (array_key_exists( 'edd_search_form', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/edd_search_form.php' );
		}
		if (array_key_exists( 'edd_thumbs_categories', bilalmghl_widget_control()) ){
			require_once( __DIR__ . '/widgets/edd_thumbs_categories.php' );
		}

		if (array_key_exists( 'give_campains', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/give_campains.php' );
		}

		if (array_key_exists( 'icon_listing', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/icon_listing.php' );
		}
		if (array_key_exists( 'image_carousel', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/image_carousel.php' );
		}
		if (array_key_exists( 'image_carousel_alt', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/image_carousel_alt.php' );
		}
		if (array_key_exists( 'info_box', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/info_box.php' );
		}
		if (array_key_exists( 'infotext_box', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/infotext_box.php' );
		}
		if (array_key_exists( 'instagram', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/instagram.php' );
		}

		if (array_key_exists( 'multitype_gallery', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/multitype_gallery.php' );
		}

		if (array_key_exists( 'navigation_menu', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/navigation_menu.php' );
		}

		if (array_key_exists( 'Ulitmate_Progressbar', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/Ulitmate_Progressbar.php' );
		}

		if (array_key_exists( 'portfolio', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/portfolio.php' );
		}
		if (array_key_exists( 'portfolio_carousel', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/portfolio_carousel.php' );
		}
		if (array_key_exists( 'position_element', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/position_element.php' );
		}
		if (array_key_exists( 'post_carousel', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/post_carousel.php' );
		}
		if (array_key_exists( 'post_group', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/post_group.php' );
		}
		if (array_key_exists( 'post_group_2', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/post_group_2.php' );
		}

		if (array_key_exists( 'price_table', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/price_table.php' );
		}
		if (array_key_exists( 'price_tabs', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/price_tabs.php' );
		}
		if (array_key_exists( 'progress_roadmap', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/progress_roadmap.php' );
		}

		if (array_key_exists( 'scroll_button', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/scroll_button.php' );
		}
		if (array_key_exists( 'shortcode', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/shortcode.php' );
		}
		if (array_key_exists( 'socials', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/socials.php' );
		}
		if (array_key_exists( 'subscriber_form', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/subscriber_form.php' );
		}

		if (array_key_exists( 'tabs', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/tabs.php' );
		}
		if (array_key_exists( 'teams', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/teams.php' );
		}
		if (array_key_exists( 'testimonials', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/testimonials.php' );
		}
		if (array_key_exists( 'timeline', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/timeline.php' );
		}
		if (array_key_exists( 'timeline_roadmap', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/timeline_roadmap.php' );
		}
		if (array_key_exists( 'timeline_step', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/timeline_step.php' );
		}

		if (array_key_exists( 'video', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/video.php' );
		}
		if (array_key_exists( 'video_popup_button', bilalmghl_widget_control()) ){
		    require_once( __DIR__ . '/widgets/video_popup_button.php' );
		}

		if ( array_key_exists( 'welcome_slides', bilalmghl_widget_control() ) ){
		    require_once( __DIR__ . '/widgets/welcome_slides.php' );
		}
		//***************************OSCAR********************
		if ( array_key_exists( 'timeline_slides', bilalmghl_widget_control() ) ){
		    require_once( __DIR__ . '/widgets/timeline_slides.php' );
		}


		//************************
		if ( array_key_exists( 'woocommerce_products', bilalmghl_widget_control() ) ){
		    require_once( __DIR__ . '/widgets/woocommerce_products.php' );
		}

		if (array_key_exists( 'base_effect', bilalmghl_widget_control() ) ){
	    	require_once( __DIR__ . '/widgets/base_effect.php' );
		}

		if (array_key_exists( 'base_effect_2', bilalmghl_widget_control() ) ){
	    	require_once( __DIR__ . '/widgets/base_effect_2.php' );
		}

		if (array_key_exists( 'Lottie_Animation', bilalmghl_widget_control() ) ){
	    	require_once( __DIR__ . '/widgets/Lottie_Animation.php' );
		}

	}
	public function bilalmghl_widgets_register(){

		/**
		 * NOTE: If you use ( use \Elementor\Plugin as Plugin; ) you need to set namespace before instansiate in widget register.
		 * Like Plugin::instance()->widgets_manager->register_widget_type( new Widget_Class() );
		 * and If you use ( namespace Elementor ) No need instansiate in widget register.
		 * Like Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_Class() );
		 */
	}

	/******************************
	 * 	INIT CONTROLS
	 ******************************/
	public function init_controls() {
		/*---------------------------
			Include Control files
		---------------------------*/
		require_once( __DIR__ . '/controls/control.php' );

		/*---------------------------
			Register control
		---------------------------*/
		//Plugin::$instance->controls_manager->register_control( 'control-type-', new \bilalmghl_Control() );
	}

	/*******************************
	 * 	ADD CUSTOM CATEGORY
	 *******************************/
	public function add_elementor_category()
	{
		Plugin::instance()->elements_manager->add_category( 'bilalmghl-addons', array(
			'title' => __( 'bilalmghl Addons', 'bilalmghl' ),
			'icon'  => 'fa fa-plug',
		), 1 );
	}


	/******************************
	 * 	ALL INCLUDES
	******************************/
	public function includes() {

	}
}
Bilalmghl_Elementor_Extension::instance();
