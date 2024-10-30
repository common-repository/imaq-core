<?php 
/*
 * rushmore journal article shortcode map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

add_action('init', 'rushmore_journal_article', 99 );

if ( !function_exists('rushmore_journal_article') ) {

   function rushmore_journal_article(){

      if (function_exists('kc_add_map')) { 

          kc_add_map(
              array(
                  'rushmore_journal_article' => array(
                      'name' => esc_html__('Journal Article', 'IMAQ'),
                      'icon' => 'sl-energy',
                      'category' => esc_html__( 'IMAQ', 'IMAQ' ),
                      'params' => array(
                          'general' => array(
                              array(
                                'name' => 'order',
                                'label' => esc_html__( 'Slide Order Style', 'IMAQ'),
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
                                        'Tab' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+ .journal-papers-nav-list > li a'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+:hover .journal-papers-nav-list > li a'),
                                            array('property' => 'background-color', 'label' => 'Bg Color', 'selector' => '+ .journal-papers-nav-list > li a'),
                                            array('property' => 'background-color', 'label' => 'Bg Color Hover', 'selector' => '+:hover .journal-papers-nav-list > li a'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .journal-papers-nav-list > li a'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .journal-papers-nav-list > li a'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .journal-papers-nav-list > li a'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+ .journal-papers-nav-list > li a'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .journal-papers-nav-list > li a'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .journal-papers-nav-list > li a'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .journal-papers-nav-list > li a'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .journal-papers-nav-list > li a'),
                                      ),
                                      'Active Tab' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+ .journal-papers-nav-list > li.active a'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+:hover .journal-papers-nav-list > li.active a'),
                                            array('property' => 'background-color', 'label' => 'Bg Color', 'selector' => '+ .journal-papers-nav-list > li.active a'),
                                            array('property' => 'background-color', 'label' => 'Bg Color Hover', 'selector' => '+:hover .journal-papers-nav-list > li.active a'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .journal-papers-nav-list > li.active a'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .journal-papers-nav-list > li.active a'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .journal-papers-nav-list > li.active a'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+ .journal-papers-nav-list > li.active a'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .journal-papers-nav-list > li.active a'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .journal-papers-nav-list > li.active a'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .journal-papers-nav-list > li.active a'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .journal-papers-nav-list > li.active a'),
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



