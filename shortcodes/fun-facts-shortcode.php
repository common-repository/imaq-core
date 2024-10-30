<?php 
/*
 * rushmore fun facts shortcode
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

function rushmore_fun_facts_shortcode( $atts, $content = null ){

	extract( shortcode_atts( array(
            'value'   => '',
            'title'   => '',
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
	
    $html .= ' <div class="brand_quickfact-content text-center '.esc_attr($extra_class).'">
                    <div class="brand_quickfact-count_value">'.esc_html($value).'</div>
                    <div class="brand_quickfact-label">'.esc_html($title).'</div>
                </div>';

	return $html;

}
add_shortcode( 'rushmore_fun_facts', 'rushmore_fun_facts_shortcode' );
