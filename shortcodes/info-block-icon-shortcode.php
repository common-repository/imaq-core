<?php 
/*
 * rushmore info block icon shortcode
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

function rushmore_info_block_icon_shortcode( $atts, $content = null ){

	extract( shortcode_atts( array(
            'icon' => '',
		    'icon_visibility'   => '',
            'title'   => '',
            'content_visibility'   => '',
            'info_content'   => '',
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
	
    $html .= ' <div class="icon-card text-center '.esc_attr($extra_class).'">';
                if( isset($icon_visibility) && $icon_visibility == 'yes' ){
                $html .= '<figure class="icon-card-limn">
                            <i class="'.esc_attr($icon).'"></i>
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
                
                $html .= '
                        <h3 class="card-title">'.$wk_title.'</h3>';

                if( isset($content_visibility) && $content_visibility == 'yes' ){
                    $html .= wpautop($info_content);
                }
               
                $html .= '
                </div>';

	return $html;

}
add_shortcode( 'rushmore_info_block_icon', 'rushmore_info_block_icon_shortcode' );
