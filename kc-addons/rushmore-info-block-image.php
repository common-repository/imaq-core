<?php 
/*
 * rushmore info block shortcode map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

add_action('init', 'rushmore_info_block', 99 );

if ( !function_exists('rushmore_info_block') ) {

   function rushmore_info_block(){

      if (function_exists('kc_add_map')) { 

          kc_add_map(
              array(
                  'rushmore_info_block' => array(
                      'name' => esc_html__('Info Block Image', 'IMAQ'),
                      'icon' => 'sl-energy',
                      'category' => esc_html__( 'IMAQ', 'IMAQ' ),
                      'params' => array(
                          'general' => array(
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Show Image?', 'IMAQ' ),
                                  'name' => 'image_visibility',
                                  'value' => esc_html__( 'yes', 'IMAQ' ),
                              ),
                              array(
                                  'name' => 'image',
                                  'label' => esc_html__('Add Image', 'IMAQ'),
                                  'description' => esc_html__( 'Upload your image', 'IMAQ' ),
                                  'type' => 'attach_image',
                                  'relation' => array(
                                     'parent' => 'image_visibility',
                                     'show_when' => array( 'yes' )
                                  ),
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
                                'name' => 'info_img_content',
                                'label' => esc_html__( 'Content', 'IMAQ' ),
                                'description' => esc_html__( 'Write your content here.', 'IMAQ' ),
                                'relation' => array(
                                   'parent' => 'content_visibility',
                                   'show_when' => array( 'yes' )
                                ),
                              ),
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Show Button?', 'IMAQ' ),
                                  'name' => 'button_visibility',
                                  'value' => esc_html__( 'yes', 'IMAQ' ),
                              ),
                              array(
                                  'type' => 'text',
                                  'label' => esc_html__( 'Button Text', 'IMAQ' ),
                                  'name' => 'btn_text',
                                  'value' => esc_html__( 'read more', 'IMAQ' ),
                                  'description' => esc_html__( 'Write your button text here', 'IMAQ' ),
                                  'relation' => array(
                                       'parent' => 'button_visibility',
                                       'show_when' => array( 'yes' )
                                  ),
                              ),
                              array(
                                  'type' => 'link',
                                  'label' => esc_html__( 'Add Link', 'IMAQ' ),
                                  'name' => 'btn_link',
                                  'description' => esc_html__( 'Add link to button', 'IMAQ' ),
                                  'relation' => array(
                                       'parent' => 'button_visibility',
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
                                            array('property' => 'color', 'label' => 'Title Color', 'selector' => '+ h2.info-box-title'),
                                            array('property' => 'color', 'label' => 'Title Color Hover', 'selector' => '+:hover h2.info-box-title'),
                                            array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => '+ h2.info-box-title'),
                                            array('property' => 'font-size', 'label' => 'Title Font Size', 'selector' => '+ h2.info-box-title'),
                                            array('property' => 'font-weight', 'label' => 'Title Font Weight', 'selector' => '+ h2.info-box-title'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+ h2.info-box-title'),
                                            array('property' => 'text-transform', 'label' => 'Title Text Transform', 'selector' => '+ h2.info-box-title'),
                                            array('property' => 'text-align', 'label' => 'Title Text Align', 'selector' => '+ h2.info-box-title'),
                                            array('property' => 'margin', 'label' => 'Title Margin', 'selector' => '+ h2.info-box-title'),
                                            array('property' => 'padding', 'label' => 'Title Padding', 'selector' => '+ h2.info-box-title'),
                                      ),
                                      'Desc' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+.sabbi-thumlinepost-card p'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+.sabbi-thumlinepost-card p:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.sabbi-thumlinepost-card p'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.sabbi-thumlinepost-card p'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.sabbi-thumlinepost-card p'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.sabbi-thumlinepost-card p'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.sabbi-thumlinepost-card p'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+.sabbi-thumlinepost-card p'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.sabbi-thumlinepost-card p'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.sabbi-thumlinepost-card p'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+.sabbi-thumlinepost-card p'),
                                      ),
                                      'Button' => array(
                                          array('property' => 'color', 'label' => 'Text Color', 'selector' => '+.sabbi-thumlinepost-card .read-more'),
                                          array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.sabbi-thumlinepost-card .read-more'),
                                          array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.sabbi-thumlinepost-card .read-more'),
                                          array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.sabbi-thumlinepost-card .read-more'),
                                          array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.sabbi-thumlinepost-card .read-more'),
                                          array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.sabbi-thumlinepost-card .read-more'),
                                          array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.sabbi-thumlinepost-card .read-more'),
                                          array('property' => 'text-align', 'label' => 'Align', 'selector' => '+.sabbi-thumlinepost-card .read-more'),
                                          array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+.sabbi-thumlinepost-card .read-more'),
                                          array('property' => 'display', 'label' => 'Display', 'selector' => '+.sabbi-thumlinepost-card .read-more'),
                                          array('property' => 'width', 'selector' => '+.sabbi-thumlinepost-card .read-more'),
                                          array('property' => 'height', 'selector' => '+.sabbi-thumlinepost-card .read-more'),
                                          array('property' => 'border', 'label' => 'Border', 'selector' => '+.sabbi-thumlinepost-card .read-more'),
                                          array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+.sabbi-thumlinepost-card .read-more'),
                                          array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.sabbi-thumlinepost-card .read-more'),
                                          array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.sabbi-thumlinepost-card .read-more'),
                                          array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+.sabbi-thumlinepost-card .read-more'),
                                      ),
                                      'Button Mouse Hover' => array(
                                        array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.sabbi-thumlinepost-card .read-more:hover'),
                                        array('property' => 'color', 'label' => 'Text Color', 'selector'=>'+.sabbi-thumlinepost-card .read-more:hover'),
                                        array('property' => 'background-color', 'label' => 'Background Color', 'selector'=>'+.sabbi-thumlinepost-card .read-more:hover'),
                                        array('property' => 'border', 'label' => 'Border', 'selector' => '+.sabbi-thumlinepost-card .read-more:hover'),
                                        array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+.sabbi-thumlinepost-card .read-more:hover'),
                                      ),
                                    'Image' => array(
	                                    array('property' => 'text-align', 'label' => 'Image Alignment', 'selector' => '+.sabbi-thumlinepost-card img'),
	                                    array('property' => 'display', 'label' => 'Image Display', 'selector' => '+.sabbi-thumlinepost-card img'),
	                                    array('property' => 'float', 'label' => 'Image Float', 'selector' => '+.sabbi-thumlinepost-card img'),
	                                    array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.sabbi-thumlinepost-card img'),
	                                    array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '+.sabbi-thumlinepost-card img'),
	                                    array('property' => 'border', 'label' => 'Border', 'selector' => '+.sabbi-thumlinepost-card img'),
	                                    array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+.sabbi-thumlinepost-card img'),
	                                    array('property' => 'width', 'label' => 'Width', 'selector' => '+.sabbi-thumlinepost-card img'),
	                                    array('property' => 'height', 'label' => 'Height', 'selector' => '+.sabbi-thumlinepost-card img'),
	                                    array('property' => 'max-width', 'label' => 'Max Width', 'selector' => '+.sabbi-thumlinepost-card img'),
	                                    array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => '+.sabbi-thumlinepost-card img'),
	                                    array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.sabbi-thumlinepost-card img'),
	                                    array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.sabbi-thumlinepost-card img')
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
	                                        array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+.sabbi-thumlinepost-card'),
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



