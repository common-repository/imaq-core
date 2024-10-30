<?php 
/*
 * rushmore team profile section shortcode map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

add_action('init', 'rushmore_team_profile_section', 99 );

if ( !function_exists('rushmore_team_profile_section') ) {

   function rushmore_team_profile_section(){

      if (function_exists('kc_add_map')) { 

          kc_add_map(
              array(
                  'rushmore_team_profile_section' => array(
                      'name' => esc_html__('Profile Section', 'IMAQ'),
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
                                  'type' => 'dropdown',
                                  'label' => esc_html__( 'Select Profile Section', 'IMAQ' ),
                                  'name' => 'section_type',
                                  'value' => esc_html__( 'education', 'IMAQ' ),
                                  'options' => array(
                                     ''  => esc_html__('Select a profile section', 'IMAQ'),
                                     'basic_and_bio'  => esc_html__('Basic Info And Biography', 'IMAQ'),
                                     'education' => esc_html__('Education', 'IMAQ'),
                                     'pro_experience' => esc_html__('Professional Experience', 'IMAQ'),
                                     'awards_prizes' => esc_html__('Awards Prizes', 'IMAQ'),
                                  ),
                              ),
                              array(
                                'name' => 'custom_class',
                                'label' => esc_html__('Extra Class Name', 'IMAQ'),
                                'type' => 'text',
                                'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'IMAQ' ),
                             ),

                          ), //End of general
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



