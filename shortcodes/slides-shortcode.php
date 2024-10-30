<?php 
/*
 * rushmore slides shortcode
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

function rushmore_slides_shortcode( $atts, $content = null ){

    extract( shortcode_atts( array(
            'slides'   => '',
            'slideautoplay' => '',
            'slideautoplayinterval' => '',
            'custom_class' => '',
            'custom_css' => ''
        ), $atts ) );

     //custom css       
    $wrap_class  = apply_filters( 'kc-el-class', $atts );

    if( !empty( $custom_class ) ):
        $wrap_class[] = $custom_class;
    endif;
    $extra_class = implode( ' ', $wrap_class );

    $random_id = rand( 15678234, 678236272 );

    $html = '';
    if( !empty( $slides ) && is_array( $slides ) ) {

    $html .= '<div class="sabbi-site-head"><div class="sabbi-site-header-meta '.esc_attr($extra_class).'" >
            <div class="site-hmsl-content text-center pt_60">
                <div class="seq seq--kawsa" id="sequence" data-slideautoPlay="'.$slideautoplay.'" data-slideautoPlayInterval="'.$slideautoplayinterval.'">
                    <div class="seq-screen">
                        <ul class="seq-canvas">';
                        $i = 0;
                        foreach ( $slides as $slide ) {
                        $i++;
                        $image_url = wp_get_attachment_image_src( $slide->image, 'full' );
                        if( !empty($slide->btn_link) ) {
                            $button_link = $slide->btn_link;
                        }

                        if( !empty( $button_link ) ){
                            $btn_link = ( '||' === $button_link ) ? '' : $button_link;
                            if( function_exists('kc_parse_link') ){
                               $btn_link = kc_parse_link( $btn_link );

                                if( strlen( $btn_link['url'] ) > 0 ){
                                    $btn_href   = $btn_link['url'];
                                    $btn_title   = $btn_link['title'];
                                    $btn_target = strlen( $btn_link['target'] ) > 0 ? $btn_link['target'] : '_self';
                                }
                            }
                            else {
                                $btn_href = '#';
                                $btn_title = 'btn title';
                                $btn_target = '_self';
                            }

                        } else {
                            $btn_href = '#';
                            $btn_title = 'btn title';
                            $btn_target = '_self';
                        }
                        
                        $html .= '<li class="seq-step1" id="step'.esc_attr($i).'" style="background-image:url('.esc_url($image_url[0]).')">
                                <div class="bg-blend"></div>
                                <div class="seq-content" >';
                                    if(!empty($slide->title)){
                                    $html .= '<h2 class="seq-title tt_up" data-seq="">'.esc_html($slide->title).'</h2>';
                                    }
                                    
                                    $s_content = $slide->slide_text;
                              
                                    if(!empty($s_content)){
                                        $html .= '<div class="seq-meta" data-seq="">
                                            <p class="seq-meta-text">'.$s_content.'</p>
                                        </div>';
                                    } 
                                    if( !empty($btn_href) ) {
	                                    $html .= '<a href="' . esc_url( $btn_href ) . '" title="'
	                                             . esc_attr( $btn_title ) . '" target="' . esc_attr( $btn_target )
	                                             . '" class="btn-link btn-more">' . esc_html( $slide->btn_text )
	                                             . '</a>';
                                    }

	                        $html .= '</div>
                            </li>';
                        }
                        $html .= '</ul>
                        <div class="sec-navigate-wrap pos-y_center">
                            <button type="button" class="seq-next"></button>
                            <button type="button" class="seq-prev"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>';
        }
    return $html;


}
add_shortcode( 'rushmore_slides', 'rushmore_slides_shortcode' );