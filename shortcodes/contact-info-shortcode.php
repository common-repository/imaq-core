<?php 
/*
 * rushmore contact info shortcode
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

function rushmore_contact_info_shortcode( $atts, $content = null ){

	extract( shortcode_atts( array(
            'title'   => '',
            'content'   => '',
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
	
    $html .= '<div class="addr_future_memb contact-info '.esc_attr( $extra_class ).'">';
        if( !empty( $title ) ){
        $html .= '<h4 class="entry-title">'.esc_html($title).'</h4>';
        }
        if( !empty( $content ) ){
        $html .= '<p class="__ci_num">'.do_shortcode($content).'</p>';
        }
    $html .= '</div>';

	return $html;

}
add_shortcode( 'rushmore_contact_info', 'rushmore_contact_info_shortcode' );
