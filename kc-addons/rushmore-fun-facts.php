<?php 
/*
 * rushmore fun facts shortcode map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

add_action('init', 'rushmore_fun_facts', 99 );

if ( !function_exists('rushmore_fun_facts') ) {

   function rushmore_fun_facts(){

      if (function_exists('kc_add_map')) { 

          kc_add_map(
              array(
                  'rushmore_fun_facts' => array(
                      'name' => esc_html__('Fun Fact', 'IMAQ'),
                      'icon' => 'sl-energy',
                      'category' => esc_html__( 'IMAQ', 'IMAQ' ),
                      'params' => array(
                          'general' => array(
                              array(
                                'type' => 'text',
                                'name' => 'value',
                                'label' => esc_html__( 'Value', 'IMAQ' ),
                                'description' => esc_html__( 'Write your fun fact value here.', 'IMAQ' ),
                              ),
                              array(
                                'type' => 'text',
                                'name' => 'title',
                                'label' => esc_html__( 'Title', 'IMAQ' ),
                                'description' => esc_html__( 'Write your title here.', 'IMAQ' ),
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
                                            array('property' => 'color', 'label' => 'Title Color', 'selector' => '+ .brand_quickfact-label'),
                                            array('property' => 'color', 'label' => 'Title Color Hover', 'selector' => '+:hover .brand_quickfact-label'),
                                            array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => '+ .brand_quickfact-label'),
                                            array('property' => 'font-size', 'label' => 'Title Font Size', 'selector' => '+ .brand_quickfact-label'),
                                            array('property' => 'font-weight', 'label' => 'Title Font Weight', 'selector' => '+ .brand_quickfact-label'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+ .brand_quickfact-label'),
                                            array('property' => 'text-transform', 'label' => 'Title Text Transform', 'selector' => '+ .brand_quickfact-label'),
                                            array('property' => 'text-align', 'label' => 'Title Text Align', 'selector' => '+ .brand_quickfact-label'),
                                            array('property' => 'margin', 'label' => 'Title Margin', 'selector' => '+ .brand_quickfact-label'),
                                            array('property' => 'padding', 'label' => 'Title Padding', 'selector' => '+ .brand_quickfact-label'),
                                      ),
                                      'Value' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+ .brand_quickfact-count_value'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+ .brand_quickfact-count_value:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .brand_quickfact-count_value'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .brand_quickfact-count_value'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .brand_quickfact-count_value'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .brand_quickfact-count_value'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .brand_quickfact-count_value'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .brand_quickfact-count_value'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .brand_quickfact-count_value'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .brand_quickfact-count_value'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+ .brand_quickfact-count_value'),
                                      ),
                                      'Box' => array(
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.brand_quickfact-content'),
                                            array('property' => 'background-color', 'label' => 'Background Color Hover', 'selector' => '+.brand_quickfact-content:hover'),
                                            array('property' => 'color', 'label' => 'Font Color', 'selector' => '+.brand_quickfact-content'),
                                            array('property' => 'color', 'label' => 'Font Color Hover', 'selector' => '+.brand_quickfact-content:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.brand_quickfact-content'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.brand_quickfact-content'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.brand_quickfact-content'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.brand_quickfact-content'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.brand_quickfact-content'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+.brand_quickfact-content'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.brand_quickfact-content'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.brand_quickfact-content'),
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



