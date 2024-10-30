<?php 
/*
 * rushmore event list shortcode map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

add_action('init', 'rushmore_event_list', 99 );

if ( !function_exists('rushmore_event_list') ) {

   function rushmore_event_list(){

      if (function_exists('kc_add_map')) { 

          kc_add_map(
              array(
                  'rushmore_event_list' => array(
                      'name' => esc_html__('Event List', 'IMAQ'),
                      'icon' => 'sl-energy',
                      'category' => esc_html__( 'IMAQ', 'IMAQ' ),
                      'params' => array(
                          'general' => array(
                              array(
                                'name' => 'count',
                                'label' => esc_html__( 'Count', 'IMAQ'),
                                'type' => 'text',
                                'value' => esc_html__( '4', 'IMAQ' ),
                                'description' => esc_html__( 'How many post you want to show in one page. if you want to show unlimited post then just type -1', 'IMAQ' ),
                              ),
                              array(
                                  'name' => 'orderby',
                                  'label' => esc_html__( 'Order By', 'IMAQ'),
                                  'type' => 'dropdown',
                                  'options' => array(
                                      'none' => esc_html__('None', 'IMAQ'),
                                      'ID' => esc_html__( 'ID', 'IMAQ'),
                                      'title' => esc_html__( 'Title', 'IMAQ'),
                                      'date' => esc_html__( 'Date', 'IMAQ'),
                                      'rand' => esc_html__( 'Random', 'IMAQ'),
                                  ),
                                  'value' => esc_html__( 'ID', 'IMAQ' ),
                                  'description' => esc_html__( 'Select the sorting order.', 'IMAQ' ),
                              ),
                              array(
                                'name' => 'order',
                                'label' => esc_html__( 'Order Style', 'IMAQ'),
                                'type' => 'dropdown',
                                'options' => array(
                                   ''     => esc_html__('Select an order style', 'IMAQ'),
                                   'DESC'  => esc_html__('Newest', 'IMAQ'),
                                   'ASC' => esc_html__('Oldest', 'IMAQ'),
                                ),
                                'value' => esc_html__( 'DESC', 'IMAQ' ),
                                'description' => esc_html__( 'Select the sorting order.', 'IMAQ' ),
                              ),
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Show Pagination ?', 'IMAQ' ),
                                  'name' => 'pagination_visibility',
                                  'value' => esc_html__( 'yes', 'IMAQ' ),
                              ),
                              array(
                                'name' => 'custom_class',
                                'label' => esc_html__('Extra Class Name', 'IMAQ'),
                                'type' => 'text',
                                'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'IMAQ' ),
                             ),

                          ), //End of general
                          'styling' => array(
                            array(
                                'name' => 'custom_css',
                                'type' => 'css',
                                'options' => array(
                                    array(
                                        'screens' => 'any,1024,999,767,479',
                                        'Title' => array(
                                            array('property' => 'color', 'label' => 'Title Color', 'selector' => '+.sabbi-events-item .sabbi-events-title'),
                                            array('property' => 'color', 'label' => 'Title Color Hover', 'selector' => '.sabbi-events-item .sabbi-events-title:hover'),
                                            array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => '+.sabbi-events-item .sabbi-events-title'),
                                            array('property' => 'font-size', 'label' => 'Title Font Size', 'selector' => '+.sabbi-events-item .sabbi-events-title'),
                                            array('property' => 'font-weight', 'label' => 'Title Font Weight', 'selector' => '+.sabbi-events-item .sabbi-events-title'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+.sabbi-events-item .sabbi-events-title'),
                                            array('property' => 'text-transform', 'label' => 'Title Text Transform', 'selector' => '+.sabbi-events-item .sabbi-events-title'),
                                            array('property' => 'text-align', 'label' => 'Title Text Align', 'selector' => '+.sabbi-events-item .sabbi-events-title'),
                                            array('property' => 'margin', 'label' => 'Title Margin', 'selector' => '+.sabbi-events-item .sabbi-events-title'),
                                            array('property' => 'padding', 'label' => 'Title Padding', 'selector' => '+.sabbi-events-item .sabbi-events-title'),
                                      ),
                                      'Icon' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc i, +.sabbi-events-item .events-item-meta .events- i'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc i:hover, +.sabbi-events-item .events-item-meta .events-date i:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc i, +.sabbi-events-item .events-item-meta .events-date i'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc i, +.sabbi-events-item .events-item-meta .events-date i'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc i, +.sabbi-events-item .events-item-meta .events-date i'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc i, +.sabbi-events-item .events-item-meta .events-date i'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc i, +.sabbi-events-item .events-item-meta .events-date i'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc i, +.sabbi-events-item .events-item-meta .events-date i'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc i, +.sabbi-events-item .events-item-meta .events-date i'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc i, +.sabbi-events-item .events-item-meta .events-date i'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc i, +.sabbi-events-item .events-item-meta .events-date i'),
                                      ),
                                      'Content' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc span.text, +.sabbi-events-item .events-item-meta .events-date span.text'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc span.text:hover, +.sabbi-events-item .events-item-meta .events-date span.text:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc span.text, +.sabbi-events-item .events-item-meta .events-date span.text'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc span.text, +.sabbi-events-item .events-item-meta .events-date span.text'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc span.text, +.sabbi-events-item .events-item-meta .events-date span.text'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc span.text, +.sabbi-events-item .events-item-meta .events-date span.text'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc span.text, +.sabbi-events-item .events-item-meta .events-date span.text'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc span.text, +.sabbi-events-item .events-item-meta .events-date span.text'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc span.text, +.sabbi-events-item .events-item-meta .events-date span.text'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc span.text, +.sabbi-events-item .events-item-meta .events-date span.text'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+.sabbi-events-item .events-item-meta .events-loc span.text, +.sabbi-events-item .events-item-meta .events-date span.text'),
                                      ),
                                      
                                      'Box' => array(
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.sabbi-events-item'),
                                            array('property' => 'background-color', 'label' => 'Background Color Hover', 'selector' => '+.sabbi-events-item:hover'),
                                            array('property' => 'color', 'label' => 'Font Color', 'selector' => '+.sabbi-events-item'),
                                            array('property' => 'color', 'label' => 'Font Color Hover', 'selector' => '+.sabbi-events-item:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.sabbi-events-item'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.sabbi-events-item'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.sabbi-events-item'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.sabbi-events-item'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.sabbi-events-item'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+.sabbi-events-item'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.sabbi-events-item'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.sabbi-events-item'),
                                          ),
                                    )
                                ) //End of options
                              )

                          ), //End of styling
                          'animate' => array(
                              array(
                                 'name'    => 'animate',
                                 'type'    => 'animate'
                              )
                           ), //End of animate
                         
                      ) // End of params

                  ),  // End of elemnt 
              )
          ); // End add map

      } // End if

   } 

 } // End if



