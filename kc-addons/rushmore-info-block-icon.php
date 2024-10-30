<?php 
/*
 * rushmore info block icon shortcode map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

add_action('init', 'rushmore_info_block_icon', 99 );

if ( !function_exists('rushmore_info_block_icon') ) {

   function rushmore_info_block_icon(){

      if (function_exists('kc_add_map')) { 

          kc_add_map(
              array(
                  'rushmore_info_block_icon' => array(
                      'name' => esc_html__('Info Block Icon', 'IMAQ'),
                      'icon' => 'sl-energy',
                      'category' => esc_html__( 'IMAQ', 'IMAQ' ),
                      'params' => array(
                          'general' => array(
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Show Icon?', 'IMAQ' ),
                                  'name' => 'icon_visibility',
                                  'value' => esc_html__( 'yes', 'IMAQ' ),
                              ),
                              array(
                                  'name' => 'icon',
                                  'label' => esc_html__('Add Icon', 'IMAQ'),
                                  'description' => esc_html__( 'Select your icon', 'IMAQ' ),
                                  'type' => 'icon_picker',
                              ),
                              array(
                                'type' => 'textarea',
                                'name' => 'title',
                                'label' => esc_html__( 'Title', 'IMAQ' ),
                                'description' => esc_html__( 'Write your title here.', 'IMAQ' ),
                              ),
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Show Content?', 'IMAQ' ),
                                  'name' => 'content_visibility',
                                  'value' => esc_html__( 'yes', 'IMAQ' ),
                              ),
                              array(
                                'type' => 'textarea',
                                'name' => 'info_content',
                                'label' => esc_html__( 'Content', 'IMAQ' ),
                                'description' => esc_html__( 'Write your content here.', 'IMAQ' ),
                                'relation' => array(
                                   'parent' => 'content_visibility',
                                   'show_when' => array( 'yes' )
                                ),
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
                                            array('property' => 'color', 'label' => 'Title Color', 'selector' => '+ h3.card-title'),
                                            array('property' => 'color', 'label' => 'Title Color Hover', 'selector' => '+:hover h3.card-title'),
                                            array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => '+ h3.card-title'),
                                            array('property' => 'font-size', 'label' => 'Title Font Size', 'selector' => '+ h3.card-title'),
                                            array('property' => 'font-weight', 'label' => 'Title Font Weight', 'selector' => '+ h3.card-title'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+ h3.card-title'),
                                            array('property' => 'text-transform', 'label' => 'Title Text Transform', 'selector' => '+ h3.card-title'),
                                            array('property' => 'text-align', 'label' => 'Title Text Align', 'selector' => '+ h3.card-title'),
                                            array('property' => 'margin', 'label' => 'Title Margin', 'selector' => '+ h3.card-title'),
                                            array('property' => 'padding', 'label' => 'Title Padding', 'selector' => '+ h3.card-title'),
                                      ),
                                      'Desc' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+.icon-card p'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+.icon-card p:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.icon-card p'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.icon-card p'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.icon-card p'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.icon-card p'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.icon-card p'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+.icon-card p'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.icon-card p'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.icon-card p'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+.icon-card p'),
                                      ),
                                      'Icon' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+.icon-card .icon-card-limn > i'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+.icon-card .icon-card-limn > i:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.icon-card .icon-card-limn > i'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.icon-card .icon-card-limn > i'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.icon-card .icon-card-limn > i'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.icon-card .icon-card-limn > i'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.icon-card .icon-card-limn > i'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+.icon-card .icon-card-limn > i'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.icon-card .icon-card-limn > i'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.icon-card .icon-card-limn > i'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+.icon-card .icon-card-limn > i'),
                                      ),
                                      'Box' => array(
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.icon-card'),
                                            array('property' => 'background-color', 'label' => 'Background Color Hover', 'selector' => '+.icon-card:hover'),
                                            array('property' => 'color', 'label' => 'Font Color', 'selector' => '+.icon-card'),
                                            array('property' => 'color', 'label' => 'Font Color Hover', 'selector' => '+.feature:hover, +.with_image_text:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.icon-card'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.icon-card'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.icon-card'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.icon-card'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.icon-card'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+.icon-card'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.icon-card'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.icon-card'),
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



