<?php 
/*
 * rushmore team profile section shortcode
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

function rushmore_team_profile_section_shortcode( $atts, $content = null ){

    extract( shortcode_atts( array(
            'team_slug' => '',
            'section_type' => '',
            'custom_class' => ''
        ), $atts ) );

    //custom class      
    $wrap_class  = array();

    if( !empty( $custom_class ) ):
        $wrap_class[] = $custom_class;
    endif;

    $extra_class = implode( ' ', $wrap_class ); 

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
   
    if( get_post_meta( $idd , $prefix . 'member_designation', true) ){
        $member_designation = get_post_meta( $idd , $prefix . 'member_designation', true);
    } else{
        $member_designation = '';
    }

    if( get_post_meta( $idd , $prefix . 'member_institute', true) ){
        $member_institute = get_post_meta( $idd , $prefix . 'member_institute', true);
    } else{
        $member_institute = '';
    }

    $team_education = get_post_meta( $idd , $prefix . 'team_education', true);
    $team_professional_experience = get_post_meta( $idd , $prefix . 'team_professional_appoinments', true);
    $team_awards_prizes = get_post_meta( $idd , $prefix . 'team_awards_prizes', true);

    if( $section_type == 'basic_and_bio' ){
    $html .= '<article class="profile-glimps">';
    $html .= '<h2 class="entry-title title-foc-md">'.get_the_title().'</h2>
        <p class="text-foc-md">'.wp_kses_post( $member_designation ).'</p>
        <p class="text-foc-md">'.wp_kses_post( $member_institute ).'</p>';
    $html .= '<div class="stage-content-biog">
            '.get_the_content($idd).'
        </div>';
    $html .= '</article>';
   }

    if( $section_type == 'education' ){
        if( isset($team_education) && is_array($team_education) ){
        $html .= '<div class="education_timeline_wrap">
                        <ol class="ol-timeline">';
                        foreach ($team_education as $education) { 
                            if( isset( $education['_IMAQ_education_year'] ) || !empty( $education['_IMAQ_education_year'] ) ){
                                $education_year = $education['_IMAQ_education_year'];
                            } else{
                                $education_year = '';
                            }

                            if( isset( $education['_IMAQ_education_institute'] ) || !empty( $education['_IMAQ_education_institute'] ) ){
                                $education_institute = $education['_IMAQ_education_institute'];
                            } else{
                                $education_institute = '';
                            }

                            if( isset( $education['_IMAQ_education_degree'] ) || !empty( $education['_IMAQ_education_degree'] ) ){
                                $education_degree = $education['_IMAQ_education_degree'];
                            } else{
                                $education_degree = '';
                            }
                             $html .= '<li class="tl-item with-icon">
                                <p><span class="item-section">'.wp_kses_post( $education_year ).'</span></p>
                                <div class="content-wrapper">
                                    <h3 class="title">'.wp_kses_post( $education_degree ).'</h3>
                                    <div class="description">'.wp_kses_post( $education_institute ).'</div>
                                </div>
                            </li>';
                        }
                        $html .= '</ol>
                    </div>';
            }
        }

        if( $section_type == 'pro_experience' ){
            if( isset($team_professional_experience) && is_array($team_professional_experience) ){
            $html .= '<div class="pro-experience">
            <ol class="appoint-timeline  list-unstyled">';
                foreach ($team_professional_experience as $pro_experience) { 
                if( isset( $pro_experience['_IMAQ_pa_year'] ) || !empty( $pro_experience['_IMAQ_pa_year'] ) ){
                    $pe_year = $pro_experience['_IMAQ_pa_year'];
                } else{
                    $pe_year = '';
                }

                if( isset( $pro_experience['_IMAQ_pa_designation'] ) || !empty( $pro_experience['_IMAQ_pa_designation'] ) ){
                    $pe_designation = $pro_experience['_IMAQ_pa_designation'];
                } else{
                    $pe_designation = '';
                }

                if( isset( $pro_experience['_IMAQ_pa_institute'] ) || !empty( $pro_experience['_IMAQ_pa_institute'] ) ){
                    $pe_institute = $pro_experience['_IMAQ_pa_institute'];
                } else{
                    $pe_institute = '';
                }
               $html .= '<li>
                    <span class="year">'.wp_kses_post( $pe_year ).'</span>
                    <div class="appoint-meta">
                        <h5 class="pex-title">'.wp_kses_post( $pe_designation ).'</h5>
                        <div class="meta-span">'.wp_kses_post( $pe_institute ).'</div>
                    </div>
                </li>';
               }
            $html .= '</ol>
            </div>';
            }
        }
        
        if( $section_type == 'awards_prizes' ){
            if( isset($team_awards_prizes) && is_array($team_awards_prizes) ){
            $html .='<div class="awards-prizes">
            <ul class="awards-list list-unstyled">';
                foreach ($team_awards_prizes as $team_award_prize) { 
                    if( isset( $team_award_prize['_IMAQ_award_prize_year'] ) || !empty( $team_award_prize['_IMAQ_award_prize_year'] ) ){
                        $award_prize_year = $team_award_prize['_IMAQ_award_prize_year'];
                    } else{
                        $award_prize_year = '';
                    }

                    if( isset( $team_award_prize['_IMAQ_award_prize_designation'] ) || !empty( $team_award_prize['_IMAQ_award_prize_designation'] ) ){
                        $award_prize_designation = $team_award_prize['_IMAQ_award_prize_designation'];
                    } else{
                        $award_prize_designation = '';
                    }

                    if( isset( $team_award_prize['_IMAQ_award_prize_organization'] ) || !empty( $team_award_prize['_IMAQ_award_prize_organization'] ) ){
                        $award_prize_organization = $team_award_prize['_IMAQ_award_prize_organization'];
                    } else{
                        $award_prize_organization = '';
                    }
                   $html .='<li>
                        <span class="year">'.wp_kses_post( $award_prize_year ).'</span>
                        <div class="awards-meta">
                            <h5 class="awards-title">'.wp_kses_post( $award_prize_designation ).'</h5>
                            <div class="awards-meta"><span>'.wp_kses_post( $award_prize_organization ).'</span></div>
                        </div>
                    </li>';
                }
           $html .='</ul>
            </div>';
            }
        }
    endwhile;   

    wp_reset_postdata();

    return $html;
    endif;

}
add_shortcode( 'rushmore_team_profile_section', 'rushmore_team_profile_section_shortcode' );



