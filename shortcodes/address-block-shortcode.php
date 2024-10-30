<?php 
/*
 * rushmore address block shortcode
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

function rushmore_address_block_shortcode( $atts, $content = null ){

	extract( shortcode_atts( array(
            'title'   => '',
            'address_content'   => '',
		    'custom_class' => '',
            'custom_css' => ''
		), $atts ) );

     //custom css       
    $wrap_class  = apply_filters( 'kc-el-class', $atts );

    if( !empty( $custom_class ) ):
        $wrap_class[] = $custom_class;
    endif;
    $extra_class = implode( ' ', $wrap_class );  

    $html = '';
	
    $html .= '<div class="addr_future_memb '.esc_attr( $extra_class ).'">';
            if( !empty( $title ) ){
                $html .= '<h4 class="entry-title">'.esc_html($title).'</h4>';
            }
            $html .= '<div class="address-entry">';
            if( $address_content != '' ){
                $addresses = explode( "\n",  $address_content );
                if( count( $addresses ) ){
                    foreach ($addresses as $address ) {
                    $html .= '<p class="__ad-num">'.esc_html($address).'</p>';
                   }
                }
            }
            $html .= '</div>';
    $html .= '</div>';

	return $html;

}
add_shortcode( 'rushmore_address_block', 'rushmore_address_block_shortcode' );
