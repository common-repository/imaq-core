<?php 
/*
 * rushmore video shortcode
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

function rushmore_video_shortcode( $atts, $content = null ){

	extract( shortcode_atts( array(
            'image' => '',
            'image_caption' => '',
		    'video_link'   => '',
            'title_visibility'   => '',
            'title'   => '',
            'title_link' => '',
            'content_visibility'   => '',
            'video_content'   => '',
		    'custom_class' => '',
            'custom_css' => ''
		), $atts ) );

    //custom css       
    $wrap_class  = apply_filters( 'kc-el-class', $atts );

    if( !empty( $custom_class ) ):
        $wrap_class[] = $custom_class;
    endif;
    $extra_class = implode( ' ', $wrap_class );

    if( isset( $title_link ) && !empty( $title_link ) ){
        $title_link = ( '||' === $title_link ) ? '' : $title_link;
        if( function_exists('kc_parse_link') ){
           $title_link = kc_parse_link( $title_link );

            if( strlen( $title_link['url'] ) > 0 ){
                $title_href   = $title_link['url'];
                $title_target  = strlen( $title_link['target'] ) > 0 ? $title_link['target'] : '_self';
            }
            else {
                $title_href = '#';
                $title_target = '_self';
            }
        }
       
    } else {
        $title_href = '#';
        $title_target = '_self';
    }
    
    $image_preview = wp_get_attachment_image( $image, 'full', '', array('class' => 'img-responsive img-thumpost' ) );

    $html = '';
	
    $html .= '<article class="sabbi-thumlinepost-card card-video solitude-bg__x '.esc_attr($extra_class).'">
                        <figure class="sabbi-thumlinepost-card-figure">
                            <a class="video-play" href="'.esc_url($video_link).'" data-toggle="lightbox">'.$image_preview.'</a>
                            <figcaption>'.esc_html($image_caption).'</figcaption>
                        </figure>';
            if( isset($title_visibility) && $title_visibility == 'yes' ){
                $html .= '<h3 class="entry-title"><a href="'.esc_url($title_href).'" target="'.esc_attr($title_target).'">'.esc_html($title).'</a></h3>';
            }
            if( isset($content_visibility) && $content_visibility == 'yes' ){
                $html .= wpautop($video_content);
            }
            $html .= '</article>';

	return $html;

}
add_shortcode( 'rushmore_video', 'rushmore_video_shortcode' );
