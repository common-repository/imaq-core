<?php 
/*
 * rushmore conference list shortcode
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

function rushmore_conference_list_shortcode( $atts, $content = null ){

	extract( shortcode_atts( array(
            'conference_list' => '',
		    'custom_class' => '',
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
    if( isset( $conference_list ) && is_array( $conference_list ) ){
    $html .= '<div class="auth-deff_timeline_timeline-segment '.esc_attr($extra_class).'">
                <ul class="auth-deff_timeline list-unstyled">';
            foreach ( $conference_list as $conference ) {
	            $date_array = explode(' ', $conference->date);
	            $year = $date_array[0];
	            $date_month = array_slice($date_array, 1);
	            $date_month = implode(' ', $date_month);
	            
                if( !empty($conference->link) ) {
                    $link = $conference->link;
                }

                if( !empty( $link ) ){
                    $link = ( '||' === $link ) ? '' : $link;
                    if( function_exists('kc_parse_link') ){
                       $link = kc_parse_link( $link );

                        if( strlen( $link['url'] ) > 0 ){
                            $href   = $link['url'];
                        }
                    }
                    else {
                        $href = '#';
                    }

                } else {
                    $href = '#';
                }

            $html .= '<li>
                        <div class="time-span">
                            <div class="time-year">'.esc_html( $year ).'</div>
                            <div class="time-month">'.esc_html( $date_month ).'</div>
                        </div>
                        <div class="timeline-meta">
                            <h3 class="staff-title"><a href="'.esc_url($href).'">'.esc_html( $conference->title ).'</a></h3>
                            <div class="__time">'.esc_html( $conference->time ).'</div>';
                            if( !empty( $conference->location ) ){
                            $html .= '<div class="__loc"><span>'.esc_html( 'Location', 'IMAQ').': </span>'.esc_html( $conference->location ).'</div>';
                            }
                            $html .='<p class="meta-text">'.esc_html( $conference->content ).'</p>
                        </div>
                    </li>';
            }
            $html .= '</ul>
            </div>';
    }
	return $html;

}
add_shortcode( 'rushmore_conference_list', 'rushmore_conference_list_shortcode' );
