<?php 
/*
 * rushmore book list shortcode
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

function rushmore_book_list_shortcode( $atts, $content = null ){

    extract( shortcode_atts( array(
            'book_cat' => '',
            'bg_image' => '',
            'orderby' => '',
            'order' => 'ASC',
            'btn_visibility' => '',
            'add_btn_custom_link' => '',
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


    $terms = get_terms( 'book_cat', array(
        'hide_empty' => true,
    ) );

    if( !empty( $terms ) ){
        $term_array = array();
        foreach ($terms as $term ) {
          $term_array[$term->name] = $term->slug;
        }
        arsort($term_array);
    } else{
         $term_array = array();
    }

    $bg_image = wp_get_attachment_url( $bg_image );

    $html = '';
    $html .= '<div class="sabbi-book_timeline-segment '.esc_attr($extra_class).'" style="background-image: url('.esc_url( $bg_image ).')">
                    <ul class="sabbi-book_timeline list-unstyled">';

    if( !$book_cat ) {
        foreach ($term_array as $key => $year) {

            $args = array(
                'post_type' => 'book',
                'posts_per_page' => -1,
                'book_cat' => $year,
                'order' => $order,
                'orderby' => $orderby,
                'post_status' => 'publish',
            );

            $q = new WP_Query($args);

            if ($q->have_posts()) {

                $html .= '<li>';

                $html .= '<span class="year">' . wp_kses_post($key) . '</span>';

                $html .= '<ul class="book-list list-unstyled">';
                $j = 0;
                while ($q->have_posts()) : $q->the_post();
                    $j++;

                    $idd = get_the_ID();
                    $prefix = '_IMAQ_';

                    if (wp_get_attachment_image(get_post_meta($idd, $prefix . 'book_image', true), 'rushmore-book-thumbnail', false, array('class' => 'img-responsive'))) {
                        $book_image = wp_get_attachment_image(get_post_meta($idd, $prefix . 'book_image', true), 'rushmore-book-thumbnail', false, array('class' => 'img-responsive'));
                    } else {
                        $book_image = '';
                    }

                    if (get_post_meta($idd, $prefix . 'book_link', true)) {
                        $book_link = get_post_meta($idd, $prefix . 'book_link', true);
                    } else {
                        $book_link = '';
                    }

                    if (get_post_meta($idd, $prefix . 'book_link_target', true)) {
                        $book_link_target = get_post_meta($idd, $prefix . 'book_link_target', true);
                    } else {
                        $book_link_target = '';
                    }

                    $link_target = ($book_link_target == 0) ? '_self' : '_blank';

                    if (get_post_meta($idd, $prefix . 'book_description', true)) {
                        $book_description = get_post_meta($idd, $prefix . 'book_description', true);
                    } else {
                        $book_description = '';
                    }

                    if (get_post_meta($idd, $prefix . 'book_author_name', true)) {
                        $book_author_name = get_post_meta($idd, $prefix . 'book_author_name', true);
                    } else {
                        $book_author_name = '';
                    }

                    $onexpan = ($j > 3 && $btn_visibility == 'yes') ? ' class=onexpan' : '';

                    $html .= '<li' . esc_attr($onexpan) . '>
                                    <figure>' . wp_kses_post($book_image) . '</figure>
                                    <div class="book-list-meta">
                                        <h3 class="book-list-title"><a href="' . esc_url($book_link) . '" target="' . esc_attr($link_target) . '">' . get_the_title() . '</a> </h3>
                                        <div class="book-list-brand"><em>' . wp_kses_post($book_description) . '</em></div>
                                        <p class="book-author">' . wp_kses_post($book_author_name) . '</p>
                                    </div>
                                </li>';

                endwhile;

                $html .= '</ul>';

                if ( ($j > 3 && $btn_visibility == 'yes') && ($add_btn_custom_link != 'yes') ) {
                    $html .= '<a href="#" class="btn btn-unsolemn btn-expand" data-text="' . esc_attr($btn_text) . '">' . esc_html($btn_text) . '</a>';
                }

                if ( ($j > 3 && $btn_visibility == 'yes') && ($add_btn_custom_link == 'yes') ) {
                    $html .= '<a href="'.esc_url($btn_href).'" title="'. esc_attr($btn_title) .'" target="'.esc_attr($btn_target).'" class="btn btn-unsolemn">'.esc_html($btn_text).'</a>';
                }

                $html .= '</li>';

            }
        }
    } else {

                    $args = array(
                        'post_type' => 'book',
                        'posts_per_page' => -1,
                        'book_cat' => $book_cat,
                        'order' => $order,
                        'orderby' => $orderby,
                        'post_status' => 'publish',
                    );

                    $q = new WP_Query($args);

                    if ($q->have_posts()) {

                        $html .= '<li>';

                        $html .= '<span class="year">' . wp_kses_post($book_cat) . '</span>';

                        $html .= '<ul class="book-list list-unstyled">';
                        $j = 0;
                        while ($q->have_posts()) : $q->the_post();
                            $j++;

                            $idd = get_the_ID();
                            $prefix = '_IMAQ_';

                            if (wp_get_attachment_image(get_post_meta($idd, $prefix . 'book_image', true), 'rushmore-book-thumbnail', false, array('class' => 'img-responsive'))) {
                                $book_image = wp_get_attachment_image(get_post_meta($idd, $prefix . 'book_image', true), 'rushmore-book-thumbnail', false, array('class' => 'img-responsive'));
                            } else {
                                $book_image = '';
                            }

                            if (get_post_meta($idd, $prefix . 'book_link', true)) {
                                $book_link = get_post_meta($idd, $prefix . 'book_link', true);
                            } else {
                                $book_link = '';
                            }

                            if (get_post_meta($idd, $prefix . 'book_link_target', true)) {
                                $book_link_target = get_post_meta($idd, $prefix . 'book_link_target', true);
                            } else {
                                $book_link_target = '';
                            }

                            $link_target = ($book_link_target == 0) ? '_self' : '_blank';

                            if (get_post_meta($idd, $prefix . 'book_description', true)) {
                                $book_description = get_post_meta($idd, $prefix . 'book_description', true);
                            } else {
                                $book_description = '';
                            }

                            if (get_post_meta($idd, $prefix . 'book_author_name', true)) {
                                $book_author_name = get_post_meta($idd, $prefix . 'book_author_name', true);
                            } else {
                                $book_author_name = '';
                            }

                            $onexpan = ($j > 3 && $btn_visibility == 'yes') ? ' class=onexpan' : '';

                            $html .= '<li' . esc_attr($onexpan) . '>
                                                <figure>' . wp_kses_post($book_image) . '</figure>
                                                <div class="book-list-meta">
                                                    <h3 class="book-list-title"><a href="' . esc_url($book_link) . '" target="' . esc_attr($link_target) . '">' . get_the_title() . '</a> </h3>
                                                    <div class="book-list-brand"><em>' . wp_kses_post($book_description) . '</em></div>
                                                    <p class="book-author">' . wp_kses_post($book_author_name) . '</p>
                                                </div>
                                            </li>';

                        endwhile;

                        $html .= '</ul>';

                        if ( ($j > 3 && $btn_visibility == 'yes') && ($add_btn_custom_link != 'yes') ) {
                            $html .= '<a href="#" class="btn btn-unsolemn btn-expand" data-text="' . esc_attr($btn_text) . '">' . esc_html($btn_text) . '</a>';
                        }

                        if ( ($j > 3 && $btn_visibility == 'yes') && ($add_btn_custom_link == 'yes') ) {
                            $html .= '<a href="'.esc_url($btn_href).'" title="'. esc_attr($btn_title) .'" target="'.esc_attr($btn_target).'" class="btn btn-unsolemn">'.esc_html($btn_text).'</a>';
                        }

                        $html .= '</li>';

                    }

                }
                $html .='</ul>
                </div>';
    
    wp_reset_postdata();
    
    return $html;
}
add_shortcode( 'rushmore_book_list', 'rushmore_book_list_shortcode' );



