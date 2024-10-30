<?php 
/*
 * rushmore about us block shortcode map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

add_action('init', 'rushmore_about_us_block', 99 );

if ( !function_exists('rushmore_about_us_block') ) {

   function rushmore_about_us_block(){

      if (function_exists('kc_add_map')) { 

          kc_add_map(
              array(
                  'rushmore_about_us_block' => array(
                      'name' => esc_html__('About Us Block', 'IMAQ'),
                      'icon' => 'sl-energy',
                      'is_container' => true,
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
                                'type' => 'textarea_html',
                                'name' => 'content',
                                'label' => esc_html__( 'Content', 'IMAQ' ),
                                'description' => esc_html__( 'Write your content here.', 'IMAQ' ),
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
                                        'Title' => array(
                                            array('property' => 'color', 'label' => 'Title Color', 'selector' => '+ h2.entry-title'),
                                            array('property' => 'color', 'label' => 'Title Color Hover', 'selector' => '+:hover h2.entry-title'),
                                            array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => '+ h2.entry-title'),
                                            array('property' => 'font-size', 'label' => 'Title Font Size', 'selector' => '+ h2.entry-title'),
                                            array('property' => 'font-weight', 'label' => 'Title Font Weight', 'selector' => '+ h2.entry-title'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+ h2.entry-title'),
                                            array('property' => 'text-transform', 'label' => 'Title Text Transform', 'selector' => '+ h2.entry-title'),
                                            array('property' => 'text-align', 'label' => 'Title Text Align', 'selector' => '+ h2.entry-title'),
                                            array('property' => 'margin', 'label' => 'Title Margin', 'selector' => '+ h2.entry-title'),
                                            array('property' => 'padding', 'label' => 'Title Padding', 'selector' => '+ h2.entry-title'),
                                      ),
                                      'Desc' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+ .sabbi-thumlinepost-card-meta p'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+:hover .sabbi-thumlinepost-card-meta p:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .sabbi-thumlinepost-card-meta p'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .sabbi-thumlinepost-card-meta p'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .sabbi-thumlinepost-card-meta p'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .sabbi-thumlinepost-card-meta p'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .sabbi-thumlinepost-card-meta p'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .sabbi-thumlinepost-card-meta p'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .sabbi-thumlinepost-card-meta p'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .sabbi-thumlinepost-card-meta p'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+ .sabbi-thumlinepost-card-meta p'),
                                      ),
                                      'Button' => array(
                                          array('property' => 'color', 'label' => 'Text Color', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more'),
                                          array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more'),
                                          array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more'),
                                          array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more'),
                                          array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more'),
                                          array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more'),
                                          array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more'),
                                          array('property' => 'text-align', 'label' => 'Align', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more'),
                                          array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more'),
                                          array('property' => 'display', 'label' => 'Display', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more'),
                                          array('property' => 'width', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more'),
                                          array('property' => 'height', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more'),
                                          array('property' => 'border', 'label' => 'Border', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more'),
                                          array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more'),
                                          array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more'),
                                          array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more'),
                                          array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more')

                                      ),
                                      'Button Mouse Hover' => array(
                                        array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more:hover'),
                                        array('property' => 'color', 'label' => 'Text Color', 'selector'=>'+ .sabbi-thumlinepost-card-meta .read-more:hover'),
                                        array('property' => 'background-color', 'label' => 'Background Color', 'selector'=>'+ .sabbi-thumlinepost-card-meta .read-more:hover'),
                                        array('property' => 'border', 'label' => 'Border', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more:hover'),
                                        array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+ .sabbi-thumlinepost-card-meta .read-more:hover')

                                      ),
                                      'Box' => array(
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.sabbi-thumlinepost-card'),
                                            array('property' => 'background-color', 'label' => 'Background Color Hover', 'selector' => '+.sabbi-thumlinepost-card:hover'),
                                            array('property' => 'color', 'label' => 'Font Color', 'selector' => '+.sabbi-thumlinepost-card'),
                                            array('property' => 'color', 'label' => 'Font Color Hover', 'selector' => '+.feature:hover, +.with_image_text:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.sabbi-thumlinepost-card'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.sabbi-thumlinepost-card'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.sabbi-thumlinepost-card'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.sabbi-thumlinepost-card'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.sabbi-thumlinepost-card'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+.sabbi-thumlinepost-card'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.sabbi-thumlinepost-card'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.sabbi-thumlinepost-card'),
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



