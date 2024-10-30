<?php
/*
 * rushmore event list shortcode
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

function rushmore_event_list_shortcode( $atts, $content = null ){

    extract( shortcode_atts( array(
            'count'                   => '',
            'order'                   => 'DESC',
            'orderby' => '',
            'pagination_visibility'   => '',
            'custom_class' => '',
            'custom_css' => ''
        ), $atts ) );

    //custom css       
    $wrap_class  = apply_filters( 'kc-el-class', $atts );

    if( !empty( $custom_class ) ):
        $wrap_class[] = $custom_class;
    endif;
    $extra_class = implode( ' ', $wrap_class );
    
    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } elseif ( get_query_var('page') ) { $paged = get_query_var('page'); } else { $paged = 1; }

    $args = array(
        'post_type'       => 'event',
        'posts_per_page'  => $count,
        'order' => $order,
        'orderby' => $orderby,
        'post_status' => 'publish',
        'paged' => $paged
    );

    $q = new WP_Query( $args );

    if( $q->have_posts() ){
    
 ?>
    
    <div class="rushmore-content-area page-events stage_events_post">
        <div class="container">
            <div class="events_post-sagment">

                    <div class="row">
                    <?php 
                        $i = 0;
                        while ( $q->have_posts() ) : $q->the_post();
                        $i++;

                        $idd = get_the_ID();
                        $prefix = '_IMAQ_';

                        if( wp_get_attachment_image( get_post_meta( $idd, $prefix . 'event_image', true ), 'IMAQ-event-thumbnail', false, array( 'class' => 'sabbi-events-img img-responsive' ) ) ){
                            $event_image = wp_get_attachment_image( get_post_meta( $idd, $prefix . 'event_image', true ), 'IMAQ-event-thumbnail', false, array( 'class' => 'sabbi-events-img img-responsive' ) );
                        } else{
                            $event_image = '';
                        }


                        if( get_post_meta( $idd , $prefix . 'event_location', true) ){
                            $event_location = get_post_meta( $idd , $prefix . 'event_location', true);
                        } else{
                            $event_location = '';
                        }

                        if( get_post_meta( $idd , $prefix . 'event_date', true) ){
                            $event_date = get_post_meta( $idd , $prefix . 'event_date', true);
                        } else{
                            $event_date = '';
                        }
                    
                    ?>
                    <div class="col-sm-6">
                        <article class="sabbi-events-item <?php echo esc_attr($extra_class); ?>">
                            <a href="<?php esc_url( the_permalink() ); ?>" class="sabbi-events-link">
                                <figure>
                                    <?php echo wp_kses_post( $event_image ); ?>
                                    <figcaption>
                                        <h2 class="sabbi-events-title font-md__x"><?php the_title(); ?></h2>
                                    </figcaption>
                                </figure>
                            </a>
                            <div class="events-item-meta">
                                <?php if( !empty( $event_location ) ) { ?>
                                <div class="events-loc"><i class="ion-location"></i><span class="text"><?php echo wp_kses_post($event_location); ?></span></div>
                                <?php } ?>
                                <?php if( !empty( $event_date ) ) { ?>
                                <div class="events-date"><i class="ion-calendar"></i><span class="text">
                                <?php echo wp_kses_post($event_date); ?>
                                </span></div>
                                <?php } ?>
                            </div>
                        </article><!-- /.sabbi-events-item -->
                    </div> 

                     <?php if( $i%2 === 0 ){ ?>
                       <div class="event-clearfix"></div>
                     <?php } ?>

                    <?php endwhile; ?>
                </div>
               
            </div><!-- /.events_post-sagment -->
            
           
            <?php if( $pagination_visibility == 'yes' ) { ?>
            <nav aria-label="Page navigation" class="pagination_wraper">
            <?php

                $numpages = $q->max_num_pages;

                if( function_exists('IMAQ_pagination') ):
                    IMAQ_pagination( $numpages );
                endif;

            ?>
            </nav>
            <?php } ?>
            
        </div>
    </div><!-- #primary -->
     <?php }  
    wp_reset_postdata();

}
add_shortcode( 'rushmore_event_list', 'rushmore_event_list_shortcode' );