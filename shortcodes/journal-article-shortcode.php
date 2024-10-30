<?php 
/*
 * rushmore journal article shortcode
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

function rushmore_journal_article_shortcode( $atts, $content = null ){

    extract( shortcode_atts( array(
            'order' => '',
            'custom_class' => '',
            'custom_css' => ''
        ), $atts ) );

    //custom css       
    $wrap_class  = apply_filters( 'kc-el-class', $atts );

    if( !empty( $custom_class ) ):
        $wrap_class[] = $custom_class;
    endif;
    $extra_class = implode( ' ', $wrap_class );  


    $terms = get_terms( 'journal_article_cat', array(
        'hide_empty' => true,
        'parent' => 0,

    ) );

    if( !empty( $terms ) && !is_wp_error( $terms ) ){
        $term_array = array();
        foreach ($terms as $term ) {
          $term_array[$term->name] = $term->slug;
        }
        arsort($term_array);
    }

    $html = '';
   
    $html .= '
    <div class="rushmore-content-area section-journal-papers '.esc_attr($extra_class).'">
    <nav class="journal-papers-nav">
        <ul class="journal-papers-nav-list list-inline" role="tablist">';
            if( !empty( $terms ) && is_array( $terms ) ){
                $i = 0;
         
                foreach ( $term_array as $key => $year ) {
                $i++;
                $class_active = ( $i == 1 ) ? 'class=active' : '';
                $html .= '<li role="presentation" '.esc_attr( $class_active ).'><a href="#'.esc_attr( $year ).'" class="link-prev_def" aria-controls="'.esc_html( $year ).'" role="tab" data-toggle="tab">'.esc_html($key ).'</a></li>';
               
                }
            }
        $html .= '</ul>
    </nav>
    <div class="journal-papers-mound-wrap tab-content">';

            $i = 0;
            foreach ( $term_array as $key => $year ) {
            $i++;
          
            $active = ( $i == 1 ) ? 'in active' : '';

            $html .= '<div class="journal-papers-mound tab-pane fade '.esc_attr( $active ).'" id="'.esc_attr($year).'" role="tabpanel">';

            $args = array(
                'post_type'       => 'journal_article',
                'posts_per_page'  => -1,
                'journal_article_cat' => $year,
                'post_status' => 'publish',
                'order' => $order,
            );
            
            $q = new WP_Query( $args );

            if( $q->have_posts() ){

            $year_match = 1;

            while ( $q->have_posts() ) : $q->the_post();
            $idd = get_the_ID();
            $prefix = '_IMAQ_';


            if( get_post_meta( $idd , $prefix . 'journal_article_authors_name', true) ){
                $journal_article_authors_name = get_post_meta( $idd , $prefix . 'journal_article_authors_name', true);
            } else{
                $journal_article_authors_name = '';
            }

            if( get_post_meta( $idd , $prefix . 'journal_article_research_topic', true) ){
                $journal_article_research_topic = get_post_meta( $idd , $prefix . 'journal_article_research_topic', true);
            } else{
                $journal_article_research_topic = '';
            }

            if( get_post_meta( $idd , $prefix . 'journal_article_publication_identity', true) ){
                $journal_article_publication_identity = get_post_meta( $idd , $prefix . 'journal_article_publication_identity', true);
            } else{
                $journal_article_publication_identity = '';
            }

            if( get_post_meta( $idd , $prefix . 'journal_article_doi', true) ){
                $journal_article_doi = get_post_meta( $idd , $prefix . 'journal_article_doi', true);
            } else{
                $journal_article_doi = '';
            }

            if( get_post_meta( $idd , $prefix . 'journal_article_doi_link', true) ){
                $journal_article_doi_link = get_post_meta( $idd , $prefix . 'journal_article_doi_link', true);
            } else{
                $journal_article_doi_link = '';
            }

            if( get_post_meta( $idd , $prefix . 'ja_link_target', true) ){
	            $book_link_target = get_post_meta( $idd , $prefix . 'ja_link_target', true);
            } else{
	            $book_link_target = '';
            }

            $doi_link_target = ( $book_link_target == 0 ) ? '_self' : '_blank';


            if( get_post_meta( $idd , $prefix . 'journal_article_pdf_title', true) ){
                $journal_article_pdf_title = get_post_meta( $idd , $prefix . 'journal_article_pdf_title', true);
            } else{
                $journal_article_pdf_title = '';
            }

            if( get_post_meta( $idd , $prefix . 'journal_article_pdf_link', true) ){
                $journal_article_pdf_link = get_post_meta( $idd , $prefix . 'journal_article_pdf_link', true);
            } else{
                $journal_article_pdf_link = '';
            }
          
                $html .= '<nav class="journal-papers-mound-nav">';
                
                if( $key != $year_match ){
                    $html .= '<h3 class="nav-title">'.wp_kses_post($key).'</h3>';
                    $year_match = $key;
                }

                $html .= '</nav>
                <div class="journal-papers-list">
                    <div class="journal-papers">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="jp-name">'.wp_kses_post( $journal_article_authors_name ).'</p>
                            </div>
                            <div class="col-sm-6">
                                <div class="journal-papers-meta">
                                    <p>'.get_the_title().'<em> '.wp_kses_post($journal_article_research_topic).'</em> '.wp_kses_post($journal_article_publication_identity).'';
                                     if( $journal_article_pdf_link ){
                                     $html .= '<a href="'.esc_url( $journal_article_pdf_link ).'" class="pdf-link" target="_blank">'.wp_kses_post( $journal_article_pdf_title ).'</a>';
                                     }
                                     $html .= '</p>
                                </div>
                            </div>';
                            if( $journal_article_doi ){
                             $html .= '<div class="col-sm-3">
                                <div class="journal-papers-doi"><span>DOI:</span> <a href="'.esc_url($journal_article_doi_link).'" target="'.esc_attr($doi_link_target).'">'.wp_kses_post( $journal_article_doi ).'</a></div>
                            </div>';
                            }
                         $html .= '</div>
                    </div><!-- /.journal-papers -->
                </div>';
            endwhile;

            wp_reset_postdata();
 
            } 
            $html .= '</div>';
            }
        $html .= '</div></div>';
    return $html;
}
add_shortcode( 'rushmore_journal_article', 'rushmore_journal_article_shortcode' );
