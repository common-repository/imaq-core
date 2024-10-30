<?php 
/*
 * rushmore team list shortcode map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

add_action('init', 'rushmore_team_list', 99 );

if ( !function_exists('rushmore_team_list') ) {

   function rushmore_team_list(){

      if (function_exists('kc_add_map')) { 

          kc_add_map(
              array(
                  'rushmore_team_list' => array(
                      'name' => esc_html__('Team List', 'IMAQ'),
                      'icon' => 'sl-energy',
                      'category' => esc_html__( 'IMAQ', 'IMAQ' ),
                      'params' => array(
                          'general' => array(
                              array(
                                  'type' => 'select',
                                  'name' => 'r_cat',
                                  'label' => esc_html__('Category', 'IMAQ'),
                                  'description' => esc_html__( 'Select your category', 'IMAQ' ),
                                  'options' => rushmore_get_team_categories(),
                              ),
                              array(
                                'name' => 'count',
                                'label' => esc_html__( 'Count', 'IMAQ'),
                                'type' => 'dropdown',
                                'options' => array(
                                   '-1' => esc_html__('-1', 'IMAQ'),
                                   '2' => esc_html__( '2', 'IMAQ'),
                                   '3' => esc_html__( '3', 'IMAQ'),
                                   '4' => esc_html__( '4', 'IMAQ'),
                                   '6' => esc_html__( '6', 'IMAQ'),
                                ),
                                'value' => esc_html__( '4', 'IMAQ' ),
                                'description' => esc_html__( 'Select team count number here.If you want to show unlimited team member , select -1', 'IMAQ' ),
                              ),
	                          array(
		                          'name' => 'column',
		                          'label' => esc_html__( 'Number of Column in per row', 'IMAQ'),
		                          'type' => 'dropdown',
		                          'options' => array(
			                          '12' => esc_html__('1', 'IMAQ'),
			                          '6' => esc_html__( '2', 'IMAQ'),
			                          '4' => esc_html__( '3', 'IMAQ'),
			                          '3' => esc_html__( '4', 'IMAQ'),
		                          ),
		                          'value' => '4',
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
                                'label' => esc_html__( 'Team Order Style', 'IMAQ'),
                                'type' => 'dropdown',
                                'options' => array(
                                   ''     => esc_html__('Select an order style', 'IMAQ'),
                                    'DESC' => esc_html__('Newest', 'IMAQ'),
                                    'ASC'  => esc_html__('Oldest', 'IMAQ'),
                                ),
                                'value' => esc_html__( 'ASC', 'IMAQ' ),
                                'description' => esc_html__( 'Select the sorting order style.', 'IMAQ' ),
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
			                          'IMAQ-team-thumbnail' => esc_html__( 'Custom Image Size(360px x 270px)', 'IMAQ'),
		                          ),
		                          'value' => 'IMAQ-team-thumbnail',
	                          ),
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Show Title?', 'IMAQ' ),
                                  'name' => 'title_visibility',
                                  'value' => esc_html__( 'yes', 'IMAQ' ),
                              ),
	                          array(
		                          'type' => 'toggle',
		                          'label' => esc_html__( 'Link To Profile Page?', 'IMAQ' ),
		                          'name' => 'link_to_profile',
		                          'value' => 'yes'
	                          ),
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Show Designation?', 'IMAQ' ),
                                  'name' => 'des_visibility',
                                  'value' => esc_html__( 'yes', 'IMAQ' ),
                              ), 
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Show Phone Number?', 'IMAQ' ),
                                  'name' => 'phone_number_visibility',
                                  'value' => esc_html__( 'yes', 'IMAQ' ),
                              ), 
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Show Email?', 'IMAQ' ),
                                  'name' => 'email_visibility',
                                  'value' => esc_html__( 'yes', 'IMAQ' ),
                              ),
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Show Social?', 'IMAQ' ),
                                  'name' => 'social_visibility',
                                  'value' => esc_html__( 'yes', 'IMAQ' ),
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
                                  'value' => esc_html__( 'View all', 'IMAQ' ),
                                  'description' => esc_html__( 'Write your button text here', 'IMAQ' ),
                                  'relation' => array(
                                     'parent' => 'btn_visibility',
                                     'show_when' => array( 'yes' )
                                  ),
                              ),
                              array(
                                  'type' => 'link',
                                  'label' => esc_html__( 'Add Link', 'IMAQ' ),
                                  'name' => 'btn_link',
                                  'description' => esc_html__( 'Add link to button', 'IMAQ' ),
                                  'relation' => array(
                                     'parent' => 'btn_visibility',
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
                                            array('property' => 'color', 'label' => 'Title Color', 'selector' => '+.profile-card .fig-title'),
                                            array('property' => 'color', 'label' => 'Title Color Hover', 'selector' => '+.profile-card .fig-title:hover'),
                                            array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => '+.profile-card .fig-title'),
                                            array('property' => 'font-size', 'label' => 'Title Font Size', 'selector' => '+.profile-card .fig-title'),
                                            array('property' => 'font-weight', 'label' => 'Title Font Weight', 'selector' => '+.profile-card .fig-title'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+.profile-card .fig-title'),
                                            array('property' => 'text-transform', 'label' => 'Title Text Transform', 'selector' => '+.profile-card .fig-title'),
                                            array('property' => 'text-align', 'label' => 'Title Text Align', 'selector' => '+.profile-card .fig-title'),
                                            array('property' => 'margin', 'label' => 'Title Margin', 'selector' => '+.profile-card .fig-title'),
                                            array('property' => 'padding', 'label' => 'Title Padding', 'selector' => '+.profile-card .fig-title'),
                                      ),
                                      'Designation' => array(
                                            array('property' => 'color', 'label' => 'Title Color', 'selector' => '+.profile-card .fig-title-des'),
                                            array('property' => 'color', 'label' => 'Title Color Hover', 'selector' => '+.profile-card .fig-title-des:hover'),
                                            array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => '+.profile-card .fig-title-des'),
                                            array('property' => 'font-size', 'label' => 'Title Font Size', 'selector' => '+.profile-card .fig-title-des'),
                                            array('property' => 'font-weight', 'label' => 'Title Font Weight', 'selector' => '+.profile-card .fig-title-des'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+.profile-card .fig-title-des'),
                                            array('property' => 'text-transform', 'label' => 'Title Text Transform', 'selector' => '+.profile-card .fig-title-des'),
                                            array('property' => 'text-align', 'label' => 'Title Text Align', 'selector' => '+.profile-card .fig-title-des'),
                                            array('property' => 'margin', 'label' => 'Title Margin', 'selector' => '+.profile-card .fig-title-des'),
                                            array('property' => 'padding', 'label' => 'Title Padding', 'selector' => '+.profile-card .fig-title-des'),
                                      ),
                                      'Meta' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+.profile-card .fig-meta'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+.profile-card .fig-meta:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.profile-card .fig-meta'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.profile-card .fig-meta'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.profile-card .fig-meta'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.profile-card .fig-meta'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.profile-card .fig-meta'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+.profile-card .fig-meta'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.profile-card .fig-meta'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.profile-card .fig-meta'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+.profile-card .fig-meta'),
                                      ),
                                      'Button' => array(
                                          array('property' => 'color', 'label' => 'Text Color', 'selector' => '+.action-wrap .btn-action'),
                                          array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.action-wrap .btn-action'),
                                          array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.action-wrap .btn-action'),
                                          array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.action-wrap .btn-action'),
                                          array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.action-wrap .btn-action'),
                                          array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.action-wrap .btn-action'),
                                          array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.action-wrap .btn-action'),
                                          array('property' => 'text-align', 'label' => 'Align', 'selector' => '+.action-wrap .btn-action'),
                                          array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+.action-wrap .btn-action'),
                                          array('property' => 'display', 'label' => 'Display', 'selector' => '+.action-wrap .btn-action'),
                                          array('property' => 'width', 'selector' => '+.action-wrap .btn-action'),
                                          array('property' => 'height', 'selector' => '+.action-wrap .btn-action'),
                                          array('property' => 'border', 'label' => 'Border', 'selector' => '+.action-wrap .btn-action'),
                                          array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+.action-wrap .btn-action'),
                                          array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.action-wrap .btn-action'),
                                          array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.action-wrap .btn-action'),
                                          array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+.action-wrap .btn-action')

                                      ),
                                      'Button Mouse Hover' => array(
                                        array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.action-wrap .btn-action:hover'),
                                        array('property' => 'color', 'label' => 'Text Color', 'selector'=>'+.action-wrap .btn-action:hover'),
                                        array('property' => 'background-color', 'label' => 'Background Color', 'selector'=>'+.action-wrap .btn-action:hover'),
                                        array('property' => 'border', 'label' => 'Border', 'selector' => '+.action-wrap .btn-action:hover'),
                                        array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+.action-wrap .btn-action:hover')

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



