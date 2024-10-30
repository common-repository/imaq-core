<?php 
/*
 * rushmore selected publications shortcode map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

add_action('init', 'rushmore_selected_publications', 99 );

if ( !function_exists('rushmore_selected_publications') ) {

   function rushmore_selected_publications(){

      if (function_exists('kc_add_map')) { 

          kc_add_map(
              array(
                  'rushmore_selected_publications' => array(
                      'name' => esc_html__('Selected Publications', 'IMAQ'),
                      'icon' => 'sl-energy',
                      'category' => esc_html__( 'IMAQ', 'IMAQ' ),
                      'params' => array(
                          'general' => array(
                              array(
                                'name' => 'count',
                                'label' => esc_html__( 'Count', 'IMAQ'),
                                'type' => 'text',
                                'value' => esc_html__( '3', 'IMAQ' ),
                                'description' => esc_html__( 'Write a count number. if you want to show unlimited post then just type -1', 'IMAQ' ),
                              ),
                              array(
                                  'name' => 'icon',
                                  'label' => esc_html__('Add Icon', 'IMAQ'),
                                  'description' => esc_html__( 'Select your icon', 'IMAQ' ),
                                  'type' => 'icon_picker',
                                  'value' => 'ion-ios-paper-outline',
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
                                            array('property' => 'color', 'label' => 'Title Color', 'selector' => '+ .pub-item .title'),
                                            array('property' => 'color', 'label' => 'Title Color Hover', 'selector' => '+:hover .pub-item .title'),
                                            array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => '+ .pub-item .title'),
                                            array('property' => 'font-size', 'label' => 'Title Font Size', 'selector' => '+ .pub-item .title'),
                                            array('property' => 'font-weight', 'label' => 'Title Font Weight', 'selector' => '+ .pub-item .title'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+ .pub-item .title'),
                                            array('property' => 'text-transform', 'label' => 'Title Text Transform', 'selector' => '+ .pub-item .title'),
                                            array('property' => 'text-align', 'label' => 'Title Text Align', 'selector' => '+ .pub-item .title'),
                                            array('property' => 'margin', 'label' => 'Title Margin', 'selector' => '+ .pub-item .title'),
                                            array('property' => 'padding', 'label' => 'Title Padding', 'selector' => '+ .pub-item .title'),
                                      ),
                                      'Desc' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+ .slc_des'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+:hover .slc_des:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .slc_des'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .slc_des'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .slc_des'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .slc_des'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .slc_des'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .slc_des'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .slc_des'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .slc_des'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+ .slc_des'),
                                      ),
                                      'Icon' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+ .pub-item.with-icon .elem-wrapper i'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+ .pub-item.with-icon .elem-wrapper i:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .pub-item.with-icon .elem-wrapper i'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .pub-item.with-icon .elem-wrapper i'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .pub-item.with-icon .elem-wrapper i'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .pub-item.with-icon .elem-wrapper i'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .pub-item.with-icon .elem-wrapper i'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .pub-item.with-icon .elem-wrapper i'),
                                            array('property' => 'border', 'label' => 'Border', 'selector' => '+ .pub-item.with-icon .elem-wrapper i'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .pub-item.with-icon .elem-wrapper i'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .pub-item.with-icon .elem-wrapper i'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+ .pub-item.with-icon .elem-wrapper i'),
                                      ),
                                      'Button' => array(
                                          array('property' => 'color', 'label' => 'Text Color', 'selector' => '+ .pub-item .description .link-with-icon'),
                                          array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .pub-item .description .link-with-icon'),
                                          array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .pub-item .description .link-with-icon'),
                                          array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+ .pub-item .description .link-with-icon'),
                                          array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .pub-item .description .link-with-icon'),
                                          array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .pub-item .description .link-with-icon'),
                                          array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .pub-item .description .link-with-icon'),
                                          array('property' => 'text-align', 'label' => 'Align', 'selector' => '+ .pub-item .description .link-with-icon'),
                                          array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .pub-item .description .link-with-icon'),
                                          array('property' => 'display', 'label' => 'Display', 'selector' => '+ .pub-item .description .link-with-icon'),
                                          array('property' => 'width', 'selector' => '+ .pub-item .description .link-with-icon'),
                                          array('property' => 'height', 'selector' => '+ .pub-item .description .link-with-icon'),
                                          array('property' => 'border', 'label' => 'Border', 'selector' => '+ .pub-item .description .link-with-icon'),
                                          array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+ .pub-item .description .link-with-icon'),
                                          array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .pub-item .description .link-with-icon'),
                                          array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .pub-item .description .link-with-icon'),
                                          array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+ .pub-item .description .link-with-icon')

                                      ),
                                      'Button Mouse Hover' => array(
                                        array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+ .pub-item .description .link-with-icon:hover'),
                                        array('property' => 'color', 'label' => 'Text Color', 'selector'=>'+ .pub-item .description .link-with-icon:hover'),
                                        array('property' => 'background-color', 'label' => 'Background Color', 'selector'=>'+ .pub-item .description .link-with-icon:hover'),
                                        array('property' => 'border', 'label' => 'Border', 'selector' => '+ .pub-item .description .link-with-icon:hover'),
                                        array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+ .pub-item .description .link-with-icon:hover')

                                      ),
                                      'Box' => array(
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.paper_cut, +.paper_cut:before, +.paper_cut:after'),
                                            array('property' => 'background-color', 'label' => 'Background Color Hover', 'selector' => '.paper_cut:hover, +.paper_cut:before:hover, +.paper_cut:after:hover'),
                                            array('property' => 'color', 'label' => 'Font Color', 'selector' => '.paper_cut, +.paper_cut:before, +.paper_cut:after'),
                                            array('property' => 'color', 'label' => 'Font Color Hover', 'selector' => '.paper_cut, +.paper_cut:before, +.paper_cut:after'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.paper_cut, +.paper_cut:before, +.paper_cut:after'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.paper_cut, +.paper_cut:before, +.paper_cut:after'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.paper_cut:hover, +.paper_cut:before:hover, +.paper_cut:after:hover'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.paper_cut, +.paper_cut:before, +.paper_cut:after'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.paper_cut, +.paper_cut:before, +.paper_cut:after'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.paper_cut, +.paper_cut:before, +.paper_cut:after'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '.paper_cut, +.paper_cut:before, +.paper_cut:after'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '.paper_cut, +.paper_cut:before, +.paper_cut:after'),
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



