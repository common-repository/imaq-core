<?php 
/*
 * IMAQ fluent form shortcode
 * Author: WpManageNinja
 * Author URI: http://wpmanageninja.com
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.0
 */

function IMAQ_fluent_form_shortcode( $atts, $content = null ){

    extract( shortcode_atts( array(
            'contact_form_id' => '',
            'custom_class' => '',
            'custom_css' => ''
        ), $atts ) );

    //custom css       
    $wrap_class  = apply_filters( 'kc-el-class', $atts );

    if( !empty( $custom_class ) ):
        $wrap_class[] = $custom_class;
    endif;
    $extra_class = implode( ' ', $wrap_class );

	if( !defined('FLUENTFORM')){
		return;
	}
    global $wpdb;
    $table_name = $wpdb->prefix .'fluentform_forms';
    $form= $wpdb->get_results(
        "
            SELECT id, title
            FROM `$table_name`
            WHERE id = '".esc_attr($contact_form_id)."' LIMIT 1
        "
    );

    $html = '';
    if( !empty( $form ) ) :
    $html .= '<div class="contact-form '.esc_attr($extra_class).'">';
             $html .= do_shortcode('[fluentform id="'.esc_attr($form[0]->id).'"]');
        $html .= '</div>';
    else:
        $html .= esc_html__('Please select one of contact form for display.', 'IMAQ');
    endif;
    return $html;

}
add_shortcode( 'IMAQ_fluent_form', 'IMAQ_fluent_form_shortcode' );
