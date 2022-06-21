<?php
/*-----------------------------------------
    ADD TO CART BUTTON
-----------------------------------------*/
// function oscar_woocommerce_addcart(){
//     echo '<div class="oscar__add__to__cart">';
//         woocommerce_template_loop_add_to_cart();
//     echo '</div>';
// }

/*----------------------------
    OSCAR THEME WIDGETS CONTROL
-----------------------------*/
function oscar_widget_control(){
    return [
        'timeline_slides'     => esc_html__( 'Timeline Slides', 'bilalmghl' ),
        'oscar_post_carousel'      => esc_html__( 'Post Carousel', 'bilalmghl' ),
        'welcome_slides'      => esc_html__( 'Main Slider', 'bilalmghl' ),
        'area_title'      => esc_html__( 'Section Title', 'bilalmghl' ),
        'subscriber_form'      => esc_html__( 'MailChimp Form', 'bilalmghl' ),
    ];
}



if( !function_exists( 'oscar_render_icons' ) ){
        
    /**
     * oscar_render_icons
     *
     * @param  array $content
     * @param  string $class
     * @return mixed
     */
    function oscar_render_icons( $content = array(), $class = '' ){

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
if ( !function_exists( 'oscar2_kses' ) ) {

    function oscar2_kses( $raw ) {
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
