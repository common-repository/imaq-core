<?php 
/*
 * rushmore about us block shortcode
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

function rushmore_about_us_block_shortcode( $atts, $content = null ){

	extract( shortcode_atts( array(
            'title'   => '',
            'content'   => '',
            'btn_text'   => '',
            'btn_link' => '',
		    'custom_class' => '',
            'custom_css' => ''
		), $atts ) );

    //custom css       
    $wrap_class  = apply_filters( 'kc-el-class', $atts );

    if( !empty( $custom_class ) ):
        $wrap_class[] = $custom_class;
    endif;
    $extra_class = implode( ' ', $wrap_class );  

    if( isset( $btn_link ) && !empty( $btn_link ) ){
        $btn_link = ( '||' === $btn_link ) ? '' : $btn_link;
        if( function_exists('kc_parse_link') ){
           $btn_link = kc_parse_link( $btn_link );

            if( strlen( $btn_link['url'] ) > 0 ){
                $btn_href   = $btn_link['url'];
                $btn_title   = $btn_link['title'];
                $btn_target  = strlen( $btn_link['target'] ) > 0 ? $btn_link['target'] : '_self';
            }
            else {
                $btn_href = '#';
                $btn_title = 'btn title';
                $btn_target = '_self';
            }
        }
       
    } else {
        $btn_href = '#';
        $btn_title = 'btn title';
        $btn_target = '_self';
    }

    $html = '';
	
    $html .= ' <article class="sabbi-thumlinepost-card solitude-bg__x '.esc_attr($extra_class).'">
                    <h2 class="entry-title ht-4">'.esc_html($title).'</h2>
                    <div class="sabbi-thumlinepost-card-meta">
                        '.wpautop($content).'
                        <a href="'.esc_url($btn_href).'" title="'. esc_attr($btn_title) .'" target="'.esc_attr($btn_target).'" class="btn btn-unsolemn btn-action read-more">'.esc_html($btn_text).'</a>
                    </div>
                </article>';

	return $html;

}
add_shortcode( 'rushmore_about_us_block', 'rushmore_about_us_block_shortcode' );
