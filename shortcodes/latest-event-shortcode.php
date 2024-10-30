<?php
/*
 * rushmore latest event shortcode
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com
 * Version: 1.1.0
 */

function rushmore_latest_event_shortcode( $atts, $content = null ){

    extract( shortcode_atts( array(
            'count'                   => '',
            'title'                   => 'Latest Events',
            'order'                   => '',
            'orderby'                 => '',
            'btn_visibility'          => '',
            'btn_link'                => '',
            'btn_text'                => '',
            'custom_class'            => '',
            'custom_css'              => ''
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
    

    // custom post args
    $args = array(
        'post_type' => 'event',
        'posts_per_page' => $count,
        'order' => $order,
        'orderby' => $orderby,
        'post_status' => 'publish',
    );

    $q = new WP_Query( $args );

    if( $q->have_posts() ):

    $html = '';

    $html .= '<article class="news-card sabbi-thumlinepost-card solitude-bg__x '.esc_attr( $extra_class ).'">';
                if( !empty( $title ) ){
                $html .= '<h2 class="stage-title">'.esc_html($title).'</h2>';
                }
                $html .= '<ul class="list-unstyled lst_news_list" tabindex="0">';
                while ( $q->have_posts() ) : $q->the_post();
                $prefix = '_IMAQ_';
                $idd = get_the_ID();

                if( get_post_meta( $idd , $prefix . 'event_date', true) ){
                    $event_date = get_post_meta( $idd , $prefix . 'event_date', true);
                } else{
                    $event_date = '';
                }

                $html .= '<li class="lst_news_item">
                        <h3 class="title mg_0"><a href="'.esc_url( get_the_permalink( $idd ) ).'">'.get_the_title( $idd ).'</a></h3>
                        <div>
                            <span class="date">'.wp_kses_post( $event_date ).'</span>
                        </div>
                    </li>';
                endwhile;
                wp_reset_postdata();
               $html .= '</ul>';
            if( isset( $btn_visibility ) && $btn_visibility == 'yes' ){
            $html .= '<a href="'.esc_url($btn_href).'" title="'. esc_attr($btn_title) .'" target="'.esc_attr($btn_target).'" class="btn btn-unsolemn btn-action read-more">'.esc_html($btn_text).'</a>';
            }
            $html .= '</article>';
    return $html;
    endif;

}
add_shortcode( 'rushmore_latest_event', 'rushmore_latest_event_shortcode' );