<?php 
/*
 * rushmore info block shortcode
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

function rushmore_info_block_shortcode( $atts, $content = null ){

	extract( shortcode_atts( array(
            'image_visibility' => '',
		    'image'   => '',
            'title'   => '',
            'content_visibility'   => '',
            'info_img_content'   => '',
            'button_visibility' => '',
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

   

    $image = wp_get_attachment_image( $image, 'full', '', array('class' => 'img-responsive img-thumpost' ) );

    $html = '';
	
    $html .= ' <article class="sabbi-thumlinepost-card solitude-bg__x '.esc_attr($extra_class).'">';
                if( isset($image_visibility) && $image_visibility == 'yes' ){
                $html .= '<figure class="sabbi-thumlinepost-card-figure">
                           '.$image.'
                          </figure>';
                }

                $wk_title = wp_kses( $title, array(
                    'a' => array(
                      'href' => array(),
                      'title' => array()
                    ),
                    'br' => array(),
                    'em' => array(),
                    'strong' => array(),
                ));
                
                $html .= '<div class="sabbi-thumlinepost-card-meta">
                        <h2 class="info-box-title ht-5">'.$wk_title.'</h2>';

                if( isset($content_visibility) && $content_visibility == 'yes' ){
                    $html .= wpautop($info_img_content);
                }
                if( isset($button_visibility) && $button_visibility == 'yes' ){
                $html .= '<a href="'.esc_url($btn_href).'" title="'. esc_attr($btn_title) .'" target="'.esc_attr($btn_target).'" class="btn btn-unsolemn btn-action read-more">'.esc_html($btn_text).'</a>';
                }
                $html .= '</div>
                </article>';

	return $html;

}
add_shortcode( 'rushmore_info_block', 'rushmore_info_block_shortcode' );
