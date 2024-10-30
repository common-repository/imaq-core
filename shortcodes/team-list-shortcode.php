<?php 
/*
 * rushmore team list shortcode
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

function rushmore_team_list_shortcode( $atts, $content = null ){

    extract( shortcode_atts( array(
            'r_cat' => '',
            'count' => 4,
            'column' => '',
            'orderby' => '',
            'order' => 'ASC',
            'image_size' => '',
            'title_visibility' => '',
            'link_to_profile' => '',
            'des_visibility'   => '',
            'phone_number_visibility'   => '',
            'email_visibility'   => '',
            'social_visibility'   => '',
            'btn_visibility' => '',
            'btn_link' => '',
            'btn_text' => '',
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


    // custom post args
    $args = array(
        'post_type' => 'team',
        'posts_per_page' => $count,
        'team_cat' => $r_cat,
        'orderby' => $orderby,
        'order' => $order,
    );

    $q = new WP_Query( $args );

    if( $q->have_posts() ):
    $html = '';
    $i = 0;
    while ( $q->have_posts() ) : $q->the_post();
    $i++;
    $idd = get_the_ID();
    
    $prefix = '_IMAQ_';

	$image_id = get_post_meta( get_the_ID(), $prefix . 'team_profile_picture_id', 1 );

    if( wp_get_attachment_image( $image_id, $image_size, false, array( 'class' => 'img-responsive' ) ) ){
	    $profile_image = wp_get_attachment_image( $image_id, $image_size, false, array( 'class' => 'img-responsive' ) );
    } else{
	    $profile_image = '';
    }
	    
    if( get_post_meta( $idd , $prefix . 'member_designation', true) ){
        $member_designation = get_post_meta( $idd , $prefix . 'member_designation', true);
    } else{
        $member_designation = '';
    }

    if( get_post_meta( $idd , $prefix . 'phone_number', true) ){
        $phone_number = get_post_meta( $idd , $prefix . 'phone_number', true);
    } else{
        $phone_number = '';
    }

    if( get_post_meta( $idd , $prefix . 'email', true) ){
        $email = get_post_meta( $idd , $prefix . 'email', true);
    } else{
        $email = '';
    }
    
    $column = ( !empty($column) ) ? $column : '4';
   
    $team_social = get_post_meta( $idd , $prefix . 'team_social', true);
    $html .= '<div class="col-sm-6 col-md-'.esc_attr($column).'">
                    <div class="profile-card profile-card-meta_classic '.esc_attr($extra_class).'">
                        <figure>
                             '.$profile_image.'
                            <figcaption>';

                            if( isset( $title_visibility ) && $title_visibility == 'yes' ){
	                            if( $link_to_profile === 'yes'){
		                            $html .= '<a href="'.esc_url(get_permalink()).'"><h3 class="fig-title">'.get_the_title().'</h3></a>';
	                            } else {
		                            $html .= '<h3 class="fig-title">'.get_the_title().'</h3>';
	                            }
                            }

                            if( isset( $des_visibility ) && $des_visibility == 'yes' ){
                             $html .= '<div class="fig-title-des">'.wp_kses_post($member_designation).'</div>';
                            }

                            $html .= '<div class="fig-meta">';

                            if( $phone_number && $phone_number_visibility == 'yes' ){
                            $html .= '<p class="fig-cal"><strong>'.esc_html('Call', 'IMAQ').':</strong> <span>'.wp_kses_post($phone_number).'</span></p>';
                            }

                            if( $email && $email_visibility == 'yes' ){
                            $html .= '<p class="fig-mail"><strong>'.esc_html('Email', 'IMAQ').':</strong> <span>'.wp_kses_post($email).'</span></p>';
                            }

                            $html .= '</div>
                            </figcaption>
                        </figure>';

                if( isset( $social_visibility ) && $social_visibility == 'yes' ){

                    if( isset($team_social) && is_array($team_social) ){

                    $html .= '<div class="profile-card-meta">
                                <ul class="pfofile-social list-unstyled list-inline">';
                                foreach ($team_social as $social) {
                                    if( isset($social['_IMAQ_socail_link']) || $social['_IMAQ_socail_icon'] ){
                                        $social_link = $social['_IMAQ_socail_link'];
                                    } else{
                                        $social_link = '';
                                    }

                                    if( isset($social['_IMAQ_socail_icon']) && $social['_IMAQ_socail_icon'] ){
                                        $social_icon = $social['_IMAQ_socail_icon'];
                                    } else{
                                        $social_icon = '';
                                    }
                                if( $social_icon && $social_link ){
                                   $html .= '<li><a href="'.esc_url($social_link).'"> <img src="'.esc_url($social_icon).'" alt="sabbi-social" class="img-responsive"></a></li>';
                                }
                                }
                            $html .= '</ul>
                            </div>';
                    }
                }

                $html .= '</div>
                </div>';

                if( $i%2 === 0 ){
                    $html .= '<div class="team-clearfix"></div>';
                }
                
    endwhile;   

    wp_reset_postdata();

    if( isset( $btn_visibility ) && $btn_visibility == 'yes' ){
        $html .= '<div class="action-wrap text-right-sm '.esc_attr($extra_class).'"><a href="'.esc_url($btn_href).'" title="'. esc_attr($btn_title) .'" target="'.esc_attr($btn_target).'" class="btn btn-unsolemn btn-action">'.esc_html($btn_text).'</a></div>';
    }

    return $html;
    endif;

}
add_shortcode( 'rushmore_team_list', 'rushmore_team_list_shortcode' );



