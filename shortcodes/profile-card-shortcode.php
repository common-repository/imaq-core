<?php 
/*
 * rushmore profile card shortcode
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

function rushmore_profile_card_shortcode( $atts, $content = null ){

    extract( shortcode_atts( array(
            'team_slug' => '',
            'image_size' => '',
            'name_visibility' => '',
            'content_visibility'   => '',
            'excerpt_length' => '',
            'btn_text'         => '',
            'btn_visibility'   => '',
            'contact_title_visibility'   => '',
            'phone_number_visibility'   => '',
            'email_visibility' => '',
            'social_visibility' => '',
            'custom_class'      => '',
            'custom_css'        => ''
        ), $atts ) );

    //custom css       
    $wrap_class  = apply_filters( 'kc-el-class', $atts );

    if( !empty( $custom_class ) ):
        $wrap_class[] = $custom_class;
    endif;
    $extra_class = implode( ' ', $wrap_class );  

    if( is_front_page() ){
        $calss = 'extra';
    }

    // custom post args
    $args = array(
        'post_type' => 'team',
        'name' => $team_slug
    );

    $q = new WP_Query( $args );

    if( $q->have_posts() ):
    $html = '';
    while ( $q->have_posts() ) : $q->the_post();

    $idd = get_the_ID();
    $prefix = '_IMAQ_';

	$image_id = get_post_meta( get_the_ID(), $prefix . 'team_profile_picture_id', 1 );
    
    if( wp_get_attachment_image( $image_id, $image_size, false, array( 'class' => 'img-thumpost img-responsive' ) ) ){
       $profile_image = wp_get_attachment_image( $image_id, $image_size, false, array( 'class' => 'img-thumpost img-responsive' ) );
    } else{
        $profile_image = '';
    }
   
    if( get_post_meta( $idd , $prefix . 'contact_title', true) ){
        $contact_title = get_post_meta( $idd , $prefix . 'contact_title', true);
    } else{
        $contact_title = '';
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

    $team_social = get_post_meta( $idd , $prefix . 'team_social', true);


    $html .= '<article class="sabbi-thumlinepost-card solitude-bg__x profile-card '.esc_attr($extra_class).'">';
                    
                    $html .= '<figure class="sabbi-thumlinepost-card-figure">
                    '.$profile_image.'';
                    $html .= '<figcaption>';
                    if( $contact_title_visibility == 'yes' ){
                    $html .= '<h3 class="fig-title">'.wp_kses_post( $contact_title ).'</h3>';
                    }

                    $html .= '<div class="fig-meta">';

                    if( $phone_number_visibility == 'yes' ){
                    $html .= '<p class="fig-cal"><strong>'.esc_html('Call', 'IMAQ').':</strong> <span>'.wp_kses_post( $phone_number ).'</span></p>';
                    }

                    if( $email_visibility == 'yes' ){
                    $html .= '<p class="fig-mail"><strong>'.esc_html('Email', 'IMAQ').':</strong> <span>'.wp_kses_post( $email ).'</span></p>';
                    }

                    $html .= '</div>
                    </figcaption>';
                    $html .= '</figure>';
                   

                    if( $social_visibility == 'yes' ){

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
	                                    if( $social_icon && $social_link ) {
		                                    $html .= '<li><a href="' . esc_url( $social_link ) . '"> <img src="'
		                                             . esc_url( $social_icon )
		                                             . '" alt="sabbi-social" class="img-responsive"></a></li>';
	                                    }
                                    }
                                $html .= '</ul>
                                </div>';
                        }
                    }
                    
                    if( $name_visibility == 'yes' ){
                        $html .= '<h2 class="entry-title">'.get_the_title().'</h2>';
                    }
                    $html .= '<div class="card_st_fix">';

                    if( $content_visibility == 'yes' ){
                    $html .= wpautop(rushmore_excerpt($idd, $excerpt_length));
                    }

                    if( $btn_visibility == 'yes' ){
                    $html .= '<div class="action-wrap"><a href="'.esc_url( get_permalink() ).'" class="btn btn-unsolemn btn-action read-more">'.esc_html($btn_text).'</a></div>';
                    }
                    $html .= '</div>';

               $html .= '</article>';
    endwhile;   

    wp_reset_postdata();

    return $html;
    endif;

}
add_shortcode( 'rushmore_profile_card', 'rushmore_profile_card_shortcode' );



