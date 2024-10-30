<?php 
/*
 * rushmore button shortcode map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

add_action('init', 'rushmore_button', 99 );

if ( !function_exists('rushmore_button') ) {

   function rushmore_button(){

      if (function_exists('kc_add_map')) { 

          kc_add_map(
              array(
                  'rushmore_button' => array(
                      'name' => esc_html__('Button', 'IMAQ'),
                      'icon' => 'sl-energy',
                      'category' => esc_html__( 'IMAQ', 'IMAQ' ),
                      'params' => array(
                          'general' => array(
                              array(
                                  'type' => 'dropdown',
                                  'label' => esc_html__( 'Button Style?', 'IMAQ' ),
                                  'name' => 'btn_style',
                                  'value' => '1',
                                  'options' => array(
                                     '1'  => esc_html__('Style 1', 'IMAQ'),
                                     '2' => esc_html__('Style 2', 'IMAQ'),
                                  ),
                              ),
                              array(
                                  'type' => 'text',
                                  'label' => esc_html__( 'Button Text', 'IMAQ' ),
                                  'name' => 'btn_text',
                                  'value' => esc_html__( 'read more', 'IMAQ' ),
                                  'description' => esc_html__( 'Write your button text here', 'IMAQ' ),
                              ),
                              array(
                                  'type' => 'link',
                                  'label' => esc_html__( 'Add Link', 'IMAQ' ),
                                  'name' => 'btn_link',
                                  'description' => esc_html__( 'Add link to button', 'IMAQ' ),
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
                                      'Button' => array(
                                          array('property' => 'color', 'label' => 'Text Color', 'selector' => '+.btn-action'),
                                          array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.btn-action'),
                                          array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.btn-action'),
                                          array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.btn-action'),
                                          array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.btn-action'),
                                          array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.btn-action'),
                                          array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.btn-action'),
                                          array('property' => 'text-align', 'label' => 'Align', 'selector' => '+.btn-action'),
                                          array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+.btn-action'),
                                          array('property' => 'display', 'label' => 'Display', 'selector' => '+.btn-action'),
                                          array('property' => 'width', 'selector' => '+.btn-action'),
                                          array('property' => 'height', 'selector' => '+.btn-action'),
                                          array('property' => 'border', 'label' => 'Border', 'selector' => '+.btn-action'),
                                          array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+.btn-action'),
                                          array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.btn-action'),
                                          array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.btn-action'),
                                          array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+.btn-action')
                                      ),
                                      'Button Mouse Hover' => array(
                                        array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.btn-action:hover'),
                                        array('property' => 'color', 'label' => 'Text Color', 'selector'=>'+.btn-action:hover'),
                                        array('property' => 'background-color', 'label' => 'Background Color', 'selector'=>'+.btn-action:hover'),
                                        array('property' => 'border', 'label' => 'Border', 'selector' => '+.btn-action:hover'),
                                         array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+.btn-action:hover'),
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



