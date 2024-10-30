<?php 
/*
 * rushmore video shortcode map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */
add_action('init', 'rushmore_video', 99 );

if ( !function_exists('rushmore_video') ) {

   function rushmore_video(){

      if (function_exists('kc_add_map')) { 

          kc_add_map(
              array(
                  'rushmore_video' => array(
                      'name' => esc_html__( ' Rushmore Video', 'IMAQ' ),
                      'icon' => 'sl-energy',
                      'category' => esc_html__( 'IMAQ', 'IMAQ'),
                      'params' => array(
                          'general' => array(
                           array(
                              'type' => 'attach_image',
                              'label' => esc_html__( 'Video Preview Image', 'IMAQ' ),
                              'name' => 'image',
                              'value' => '',
                              'description' => esc_html__( 'Upload your video preview image here.', 'IMAQ' ),
                           ),
                           array(
                             'type' => 'text',
                             'name' => 'image_caption',
                             'label' => esc_html__( 'Image Caption', 'IMAQ' ),
                             'description' => esc_html__( 'Write your image caption here.', 'IMAQ' ),
                           ),
                           array(
                              'type' => 'text',
                              'label' => esc_html__( 'Video Link', 'IMAQ' ),
                              'value' => '',
                              'name' => 'video_link',
                              'description' => esc_html__( 'Write your youtube/vimeo video link here', 'IMAQ' ),
                           ),
                           array(
                               'type' => 'toggle',
                               'label' => esc_html__( 'Show Title?', 'IMAQ' ),
                               'name' => 'title_visibility',
                               'value' => esc_html__( 'yes', 'IMAQ' ),
                           ),
                           array(
                             'type' => 'text',
                             'name' => 'title',
                             'label' => esc_html__( 'Title', 'IMAQ' ),
                             'description' => esc_html__( 'Write your title here.', 'IMAQ' ),
                             'relation' => array(
                                'parent' => 'title_visibility',
                                'show_when' => array( 'yes' )
                             ),
                           ),
                           array(
                               'type' => 'link',
                               'label' => esc_html__( 'Add Link', 'IMAQ' ),
                               'name' => 'title_link',
                               'description' => esc_html__( 'Add link to title', 'IMAQ' ),
                               'relation' => array(
                                    'parent' => 'title_visibility',
                                    'show_when' => array( 'yes' )
                               ),
                           ), 
                           array(
                               'type' => 'toggle',
                               'label' => esc_html__( 'Show Content?', 'IMAQ' ),
                               'name' => 'content_visibility',
                               'value' => esc_html__( 'yes', 'IMAQ' ),
                           ),
                           array(
                             'type' => 'textarea',
                             'name' => 'video_content',
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
                                            array('property' => 'color', 'label' => 'Title Color', 'selector' => '+.card-video .entry-title a'),
                                            array('property' => 'color', 'label' => 'Title Color Hover', 'selector' => '+:hover h2.entry-title'),
                                            array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => '+.card-video .entry-title a'),
                                            array('property' => 'font-size', 'label' => 'Title Font Size', 'selector' => '+.card-video .entry-title a'),
                                            array('property' => 'font-weight', 'label' => 'Title Font Weight', 'selector' => '+.card-video .entry-title a'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+.card-video .entry-title a'),
                                            array('property' => 'text-transform', 'label' => 'Title Text Transform', 'selector' => '+.card-video .entry-title a'),
                                            array('property' => 'text-align', 'label' => 'Title Text Align', 'selector' => '+.card-video .entry-title a'),
                                            array('property' => 'margin', 'label' => 'Title Margin', 'selector' => '+.card-video .entry-title a'),
                                            array('property' => 'padding', 'label' => 'Title Padding', 'selector' => '+.card-video .entry-title a'),
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
                                      'Image Caption' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+.card-video > .sabbi-thumlinepost-card-figure > figcaption'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+:hover h2.entry-title'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.card-video > .sabbi-thumlinepost-card-figure > figcaption'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.card-video > .sabbi-thumlinepost-card-figure > figcaption'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.card-video > .sabbi-thumlinepost-card-figure > figcaption'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.card-video > .sabbi-thumlinepost-card-figure > figcaption'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.card-video > .sabbi-thumlinepost-card-figure > figcaption'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+.card-video > .sabbi-thumlinepost-card-figure > figcaption'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.card-video > .sabbi-thumlinepost-card-figure > figcaption'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.card-video > .sabbi-thumlinepost-card-figure > figcaption'),
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
                        ), // End of animate  
                      ) // End of params

                  ),  // End of elemnt 
              )
          ); // End add map

      } // End if

   } 

 } // End if
