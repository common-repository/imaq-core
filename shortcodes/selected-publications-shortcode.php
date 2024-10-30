<?php
/*
 * rushmore selected publications shortcode
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

function rushmore_selected_publications_shortcode( $atts, $content = null ){

    extract( shortcode_atts( array(
            'icon'   => '',
            'order' => '',
            'count'                   => '',
            'custom_class' => '',
            'custom_css' => ''
        ), $atts ) );

    //custom css       
    $wrap_class  = apply_filters( 'kc-el-class', $atts );

    if( !empty( $custom_class ) ):
        $wrap_class[] = $custom_class;
    endif;
    $extra_class = implode( ' ', $wrap_class );   

    // custom post args
    $args = array(
        'post_type' => 'journal_article',
        'posts_per_page' => $count,
        'order' => $order,
        'orderby' => 'ID',
        'meta_query' => array(
            array(
                'key'     => '_IMAQ_selected_publications',
                'value'   => 'on',
            ),
        ),
    );

    $q = new WP_Query( $args );

    if( $q->have_posts() ):

    $html = '';
    $html .= '<div class="paper_cut '.esc_attr($extra_class).'">';
    while ( $q->have_posts() ) : $q->the_post();

    $idd = get_the_ID();
    $prefix = '_IMAQ_';

    if( get_post_meta( $idd , $prefix . 'journal_article_authors_name', true) ){
        $journal_article_authors_name = get_post_meta( $idd , $prefix . 'journal_article_authors_name', true);
    } else{
        $journal_article_authors_name = '';
    }

    if( get_post_meta( $idd , $prefix . 'journal_article_selecte_publication_btn_text', true) ){
        $journal_article_selecte_publication_btn_text = get_post_meta( $idd , $prefix . 'journal_article_selecte_publication_btn_text', true);
    } else{
        $journal_article_selecte_publication_btn_text = 'Publisher\'s website';
    }

    if( get_post_meta( $idd , $prefix . 'journal_article_selecte_publication_btn_link', true) ){
        $journal_article_selecte_publication_btn_link = get_post_meta( $idd , $prefix . 'journal_article_selecte_publication_btn_link', true);
    } else{
        $journal_article_selecte_publication_btn_link = '';
    }

    $html .= '<div class="pub-item with-icon">
                    <div class="elem-wrapper">
                        <i class="'.esc_attr($icon).'"></i>
                    </div>
                    <div class="content-wrapper">
                        <h3 class="title mb_0">'.get_the_title().'</h3>
                        <div class="slc_des">
                            <div class="authr">'.wp_kses_post( $journal_article_authors_name ).'</div>
                        </div>
                        <div class="description">
                            <a class="link-with-icon" href="'.esc_url($journal_article_selecte_publication_btn_link).'" target="black"><i class="ion-ios-browsers-outline"></i>'.wp_kses_post( $journal_article_selecte_publication_btn_text ).'</a>
                        </div>
                  
                </div>
            </div>';
    endwhile;
    $html .= '</div>';
    return $html;
    endif;
    wp_reset_postdata();

}
add_shortcode( 'rushmore_selected_publications', 'rushmore_selected_publications_shortcode' );