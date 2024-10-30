<?php 
/*
 * rushmore contact info shortcode map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

add_action('init', 'rushmore_contact_info', 99 );

if ( !function_exists('rushmore_contact_info') ) {

   function rushmore_contact_info(){

      if (function_exists('kc_add_map')) { 

          kc_add_map(
              array(
                  'rushmore_contact_info' => array(
                      'name' => esc_html__('Contact Information', 'IMAQ'),
                      'icon' => 'sl-energy',
                      'is_container' => true,
                      'priority'  => 140,
                      'pop_width' => 650,
                      'admin_view'  => 'text',
                      'preview_editable' => true,
                      'category' => esc_html__( 'IMAQ', 'IMAQ' ),
                      'params' => array(
                          'general' => array(
                              array(
                                'type' => 'text',
                                'name' => 'title',
                                'label' => esc_html__( 'Title', 'IMAQ' ),
                                'description' => esc_html__( 'Write your title here.', 'IMAQ' ),
                              ),    
                              array(
                                'name' => 'content',
                                'type' => 'textarea_html',
                                'value' => '',
                                'label' => esc_html__( 'Contact Information', 'IMAQ' ),
                                'description' => esc_html__( 'Write your contact information here.', 'IMAQ' ),
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
                                            array('property' => 'color', 'label' => 'Title Color', 'selector' => '+.addr_future_memb h2.entry-title'),
                                            array('property' => 'color', 'label' => 'Title Color Hover', 'selector' => '+.addr_future_memb h2.entry-title:hover'),
                                            array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => '+.addr_future_memb h2.entry-title'),
                                            array('property' => 'font-size', 'label' => 'Title Font Size', 'selector' => '+.addr_future_memb h2.entry-title'),
                                            array('property' => 'font-weight', 'label' => 'Title Font Weight', 'selector' => '+.addr_future_memb h2.entry-title'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+.addr_future_memb h2.entry-title'),
                                            array('property' => 'text-transform', 'label' => 'Title Text Transform', 'selector' => '+.addr_future_memb h2.entry-title'),
                                            array('property' => 'text-align', 'label' => 'Title Text Align', 'selector' => '+.addr_future_memb h2.entry-title'),
                                            array('property' => 'margin', 'label' => 'Title Margin', 'selector' => '+.addr_future_memb h2.entry-title'),
                                            array('property' => 'padding', 'label' => 'Title Padding', 'selector' => '+.addr_future_memb h2.entry-title'),
                                      ),
                                      'Desc' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+.addr_future_memb p.__ci_num'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+.addr_future_memb p.__ci_num:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.addr_future_memb p.__ci_num'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.addr_future_memb p.__ci_num'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.addr_future_memb p.__ci_num'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.addr_future_memb p.__ci_num'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.addr_future_memb p.__ci_num'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+.addr_future_memb p.__ci_num'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.addr_future_memb p.__ci_num'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.addr_future_memb p.__ci_num'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+.addr_future_memb p.__ci_num'),
                                      ),
                                      'Box' => array(
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.addr_future_memb'),
                                            array('property' => 'background-color', 'label' => 'Background Color Hover', 'selector' => '+.addr_future_memb:hover'),
                                            array('property' => 'color', 'label' => 'Font Color', 'selector' => '+.addr_future_memb'),
                                            array('property' => 'color', 'label' => 'Font Color Hover', 'selector' => '+.addr_future_membfeature:hover, +.addr_future_membwith_image_text:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.addr_future_memb'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.addr_future_memb'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.addr_future_memb'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.addr_future_memb'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.addr_future_memb'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+.addr_future_memb'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.addr_future_memb'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.addr_future_memb'),
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



