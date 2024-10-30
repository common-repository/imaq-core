<?php 
/*
 * rushmore profile card shortcode map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

add_action('init', 'rushmore_profile_card', 99 );

if ( !function_exists('rushmore_profile_card') ) {

   function rushmore_profile_card(){

      if (function_exists('kc_add_map')) { 

          kc_add_map(
              array(
                  'rushmore_profile_card' => array(
                      'name' => esc_html__('Profile Card', 'IMAQ'),
                      'icon' => 'sl-energy',
                      'category' => esc_html__( 'IMAQ', 'IMAQ' ),
                      'params' => array(
                          'general' => array(
                              array(
                                  'type' => 'select',
                                  'name' => 'team_slug',
                                  'label' => esc_html__('Select Your Team Member Slug Name', 'IMAQ'),
                                  'options' => rushmore_get_team_slug_list(),
                                  'value' => esc_html__( 'dr-rushmore', 'IMAQ' ),
                              ),
	                          array(
		                          'name' => 'image_size',
		                          'label' => esc_html__( 'Image Size', 'IMAQ'),
		                          'type' => 'dropdown',
		                          'options' => array(
			                          'thumbnail' => esc_html__('Thumbnail(default 150px x 150px max)', 'IMAQ'),
			                          'medium' => esc_html__( 'Medium(default 300px x 300px max)', 'IMAQ'),
			                          'medium_large' => esc_html__( 'Medium Large(default 768px x 0px max)', 'IMAQ'),
			                          'large' => esc_html__( 'Large(default 1024px x 1024px max)', 'IMAQ'),
			                          'full' => esc_html__( 'Full(unmodified)', 'IMAQ'),
			                          'IMAQ-single-team-thumb' => esc_html__( 'Custom Image Size(360px x 270px)', 'IMAQ'),
		                          ),
		                          'value' => 'IMAQ-single-team-thumb',
	                          ),
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Show Name?', 'IMAQ' ),
                                  'name' => 'name_visibility',
                                  'value' => esc_html__( 'yes', 'IMAQ' ),
                              ),
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Show Description?', 'IMAQ' ),
                                  'name' => 'content_visibility',
                                  'value' => esc_html__( 'yes', 'IMAQ' ),
                              ),
	                          array(
		                          'type' => 'text',
		                          'label' => esc_html__( 'Content Length', 'IMAQ' ),
		                          'name' => 'excerpt_length',
		                          'value' => 300,
		                          'relation' => array(
			                          'parent' => 'content_visibility',
			                          'show_when' => array( 'yes' )
		                          ),
	                          ),
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Show Button?', 'IMAQ' ),
                                  'name' => 'btn_visibility',
                                  'value' => esc_html__( 'yes', 'IMAQ' ),
                              ),
                              array(
                                  'type' => 'text',
                                  'label' => esc_html__( 'Button Text', 'IMAQ' ),
                                  'name' => 'btn_text',
                                  'value' => esc_html__( 'read more', 'IMAQ' ),
                                  'description' => esc_html__( 'Write your button text here', 'IMAQ' ),
                                  'relation' => array(
                                       'parent' => 'btn_visibility',
                                       'show_when' => array( 'yes' )
                                  ),
                              ),
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Show Contact Title?', 'IMAQ' ),
                                  'name' => 'contact_title_visibility',
                                  'value' => esc_html__( 'no', 'IMAQ' ),
                              ),
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Show Phone Number?', 'IMAQ' ),
                                  'name' => 'phone_number_visibility',
                                  'value' => esc_html__( 'no', 'IMAQ' ),
                              ),
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Show Email?', 'IMAQ' ),
                                  'name' => 'email_visibility',
                                  'value' => esc_html__( 'no', 'IMAQ' ),
                              ),
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Show Social List?', 'IMAQ' ),
                                  'name' => 'social_visibility',
                                  'value' => esc_html__( 'no', 'IMAQ' ),
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
                                            array('property' => 'color', 'label' => 'Title Color', 'selector' => '+.profile-card .entry-title'),
                                            array('property' => 'color', 'label' => 'Title Color Hover', 'selector' => '+.profile-card .entry-title:hover'),
                                            array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => '+.profile-card .entry-title'),
                                            array('property' => 'font-size', 'label' => 'Title Font Size', 'selector' => '+.profile-card .entry-title'),
                                            array('property' => 'font-weight', 'label' => 'Title Font Weight', 'selector' => '+.profile-card .entry-title'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+.profile-card .entry-title'),
                                            array('property' => 'text-transform', 'label' => 'Title Text Transform', 'selector' => '+.profile-card .entry-title'),
                                            array('property' => 'text-align', 'label' => 'Title Text Align', 'selector' => '+.profile-card .entry-title'),
                                            array('property' => 'margin', 'label' => 'Title Margin', 'selector' => '+.profile-card .entry-title'),
                                            array('property' => 'padding', 'label' => 'Title Padding', 'selector' => '+.profile-card .entry-title'),
                                      ),
                                      'Desc' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+.profile-card .card_st_fix p'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+.profile-card .card_st_fix p:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.profile-card .card_st_fix p'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.profile-card .card_st_fix p'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.profile-card .card_st_fix p'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.profile-card .card_st_fix p'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.profile-card .card_st_fix p'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+.profile-card .card_st_fix p'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.profile-card .card_st_fix p'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.profile-card .card_st_fix p'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+.profile-card .card_st_fix p'),
                                      ),
                                      'Button' => array(
                                          array('property' => 'color', 'label' => 'Text Color', 'selector' => '+.profile-card .read-more'),
                                          array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.profile-card .read-more'),
                                          array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.profile-card .read-more'),
                                          array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.profile-card .read-more'),
                                          array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.profile-card .read-more'),
                                          array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.profile-card .read-more'),
                                          array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.profile-card .read-more'),
                                          array('property' => 'text-align', 'label' => 'Align', 'selector' => '+.profile-card .read-more'),
                                          array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+.profile-card .read-more'),
                                          array('property' => 'display', 'label' => 'Display', 'selector' => '+.profile-card .read-more'),
                                          array('property' => 'width', 'selector' => '+.profile-card .read-more'),
                                          array('property' => 'height', 'selector' => '+.profile-card .read-more'),
                                          array('property' => 'border', 'label' => 'Border', 'selector' => '+.profile-card .read-more'),
                                          array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+.profile-card .read-more'),
                                          array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.profile-card .read-more'),
                                          array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.profile-card .read-more'),
                                          array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+.profile-card .read-more')

                                      ),
                                      'Button Mouse Hover' => array(
                                        array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.profile-card .read-more:hover'),
                                        array('property' => 'color', 'label' => 'Text Color', 'selector'=>'+.profile-card .read-more:hover'),
                                        array('property' => 'background-color', 'label' => 'Background Color', 'selector'=>'+.profile-card .read-more:hover'),
                                        array('property' => 'border', 'label' => 'Border', 'selector' => '+.profile-card .read-more:hover'),
                                        array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+.profile-card .read-more:hover')

                                      ),
                                      'Box' => array(
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.profile-card'),
                                            array('property' => 'background-color', 'label' => 'Background Color Hover', 'selector' => '+.profile-card:hover'),
                                            array('property' => 'color', 'label' => 'Font Color', 'selector' => '+.profile-card'),
                                            array('property' => 'color', 'label' => 'Font Color Hover', 'selector' => '+.feature:hover, +.with_image_text:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.profile-card'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.profile-card'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.profile-card'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.profile-card'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.profile-card'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+.profile-card'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.profile-card'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.profile-card'),
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



