<?php 
/*
 * rushmore latest event shortcode map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

add_action('init', 'rushmore_latest_event', 99 );

if ( !function_exists('rushmore_latest_event') ) {

   function rushmore_latest_event(){

      if (function_exists('kc_add_map')) { 

          kc_add_map(
              array(
                  'rushmore_latest_event' => array(
                      'name' => esc_html__('Latest Event', 'IMAQ'),
                      'icon' => 'sl-energy',
                      'category' => esc_html__( 'IMAQ', 'IMAQ' ),
                      'params' => array(
                          'general' => array(
                              array(
                                'type' => 'text',
                                'name' => 'title',
                                'label' => esc_html__( 'Title', 'IMAQ' ),
                                'value' => esc_html__( 'Latest Events', 'IMAQ' ),
                                'description' => esc_html__( 'Write your title here.', 'IMAQ' ),
                              ),
                              array(
                                'name' => 'count',
                                'label' => esc_html__( 'Count', 'IMAQ'),
                                'type' => 'text',
                                'value' => esc_html__( '3', 'IMAQ' ),
                                'description' => esc_html__( 'Write team count number here.', 'IMAQ' ),
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
                                  'label' => esc_html__( 'Order Style', 'IMAQ'),
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
                                        'Wrapper Title' => array(
                                            array('property' => 'color', 'label' => 'Title Color', 'selector' => '+.news-card .stage-title'),
                                            array('property' => 'color', 'label' => 'Title Color Hover', 'selector' => '.news-card .lst_news_item a:hover'),
                                            array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => '+.news-card .stage-title'),
                                            array('property' => 'font-size', 'label' => 'Title Font Size', 'selector' => '+.news-card .stage-title'),
                                            array('property' => 'font-weight', 'label' => 'Title Font Weight', 'selector' => '+.news-card .stage-title'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+.news-card .stage-title'),
                                            array('property' => 'text-transform', 'label' => 'Title Text Transform', 'selector' => '+.news-card .stage-title'),
                                            array('property' => 'text-align', 'label' => 'Title Text Align', 'selector' => '+.news-card .stage-title'),
                                            array('property' => 'margin', 'label' => 'Title Margin', 'selector' => '+.news-card .stage-title'),
                                            array('property' => 'padding', 'label' => 'Title Padding', 'selector' => '+.news-card .stage-title'),
                                        ),
                                        'Title' => array(
                                            array('property' => 'color', 'label' => 'Title Color', 'selector' => '+.news-card .lst_news_item a'),
                                            array('property' => 'color', 'label' => 'Title Color Hover', 'selector' => '.news-card .lst_news_item a:hover'),
                                            array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => '+.news-card .lst_news_item a'),
                                            array('property' => 'font-size', 'label' => 'Title Font Size', 'selector' => '+.news-card .lst_news_item a'),
                                            array('property' => 'font-weight', 'label' => 'Title Font Weight', 'selector' => '+.news-card .lst_news_item a'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+.news-card .lst_news_item a'),
                                            array('property' => 'text-transform', 'label' => 'Title Text Transform', 'selector' => '+.news-card .lst_news_item a'),
                                            array('property' => 'text-align', 'label' => 'Title Text Align', 'selector' => '+.news-card .lst_news_item a'),
                                            array('property' => 'margin', 'label' => 'Title Margin', 'selector' => '+.news-card .lst_news_item a'),
                                            array('property' => 'padding', 'label' => 'Title Padding', 'selector' => '+.news-card .lst_news_item a'),
                                      ),
                                      'Date' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+.news-card .date'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+.news-card .date:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.news-card .date'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.news-card .date'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.news-card .date'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.news-card .date'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.news-card .date'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+.news-card .date'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.news-card .date'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.news-card .date'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+.news-card .date'),
                                      ),
                                      'Button' => array(
                                          array('property' => 'color', 'label' => 'Text Color', 'selector' => '+.news-card .read-more'),
                                          array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.news-card .read-more'),
                                          array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.news-card .read-more'),
                                          array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.news-card .read-more'),
                                          array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.news-card .read-more'),
                                          array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.news-card .read-more'),
                                          array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.news-card .read-more'),
                                          array('property' => 'text-align', 'label' => 'Align', 'selector' => '+.news-card .read-more'),
                                          array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+.news-card .read-more'),
                                          array('property' => 'display', 'label' => 'Display', 'selector' => '+.news-card .read-more'),
                                          array('property' => 'width', 'selector' => '+.news-card .read-more'),
                                          array('property' => 'height', 'selector' => '+.news-card .read-more'),
                                          array('property' => 'border', 'label' => 'Border', 'selector' => '+.news-card .read-more'),
                                          array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+.news-card .read-more'),
                                          array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.news-card .read-more'),
                                          array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.news-card .read-more'),
                                          array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+.news-card .read-more'),
                                      ),
                                      'Button Mouse Hover' => array(
                                        array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.news-card .read-more:hover'),
                                        array('property' => 'color', 'label' => 'Text Color', 'selector'=>'+.news-card .read-more:hover'),
                                        array('property' => 'background-color', 'label' => 'Background Color', 'selector'=>'+.news-card .read-more:hover'),
                                        array('property' => 'border', 'label' => 'Border', 'selector' => '+.news-card .read-more:hover'),
                                        array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+.news-card .read-more:hover')
                                      ),
                                      'Box' => array(
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.news-card'),
                                            array('property' => 'background-color', 'label' => 'Background Color Hover', 'selector' => '+.news-card:hover'),
                                            array('property' => 'color', 'label' => 'Font Color', 'selector' => '+.news-card'),
                                            array('property' => 'color', 'label' => 'Font Color Hover', 'selector' => '+.news-card:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.news-card'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.news-card'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.news-card'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.news-card'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.news-card'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+.news-card'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.news-card'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.news-card'),
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



