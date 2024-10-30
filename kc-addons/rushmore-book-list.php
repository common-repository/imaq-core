<?php 
/*
 * rushmore book list shortcode map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

add_action('init', 'rushmore_book_list', 99 );

if ( !function_exists('rushmore_book_list') ) {

   function rushmore_book_list(){

      if (function_exists('kc_add_map')) { 

          kc_add_map(
              array(
                  'rushmore_book_list' => array(
                      'name' => esc_html__('Book List', 'IMAQ'),
                      'icon' => 'sl-energy',
                      'category' => esc_html__( 'IMAQ', 'IMAQ' ),
                      'params' => array(
                          'general' => array(
                              array(
                                  'name' => 'bg_image',
                                  'label' => esc_html__('Add Background Image', 'IMAQ'),
                                  'description' => esc_html__( 'Upload your  background image', 'IMAQ' ),
                                  'type' => 'attach_image',
                                  'value' => '',
                              ),
                              array(
                                  'type' => 'select',
                                  'name' => 'book_cat',
                                  'label' => esc_html__('Category', 'IMAQ'),
                                  'description' => esc_html__( 'Select your category', 'IMAQ' ),
                                  'options' => rushmore_get_book_categories(),
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
                                'value' => esc_html__( 'ASC', 'IMAQ' ),
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
                                  'value' => esc_html__( 'Explore More', 'IMAQ' ),
                                  'description' => esc_html__( 'Write your button text here', 'IMAQ' ),
                                  'relation' => array(
                                     'parent' => 'btn_visibility',
                                     'show_when' => array( 'yes' )
                                  ),
                              ),
                              array(
                                  'type' => 'toggle',
                                  'label' => esc_html__( 'Add Button custom link?', 'IMAQ' ),
                                  'name' => 'add_btn_custom_link',
                                  'value' => esc_html__( 'no', 'IMAQ' ),
                              ),
                              array(
                                  'type' => 'link',
                                  'label' => esc_html__( 'Button Link', 'IMAQ' ),
                                  'name' => 'btn_link',
                                  'description' => esc_html__( 'Add link to button', 'IMAQ' ),
                                  'relation' => array(
                                      'parent' => 'add_btn_custom_link',
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
                                            array('property' => 'color', 'label' => 'Title Color', 'selector' => '+ .sabbi-book_timeline .book-list-title a'),
                                            array('property' => 'color', 'label' => 'Title Color Hover', 'selector' => '+:hover .sabbi-book_timeline .book-list-title a'),
                                            array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => '+ .sabbi-book_timeline .book-list-title a'),
                                            array('property' => 'font-size', 'label' => 'Title Font Size', 'selector' => '+ .sabbi-book_timeline .book-list-title a'),
                                            array('property' => 'font-weight', 'label' => 'Title Font Weight', 'selector' => '+ .sabbi-book_timeline .book-list-title a'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+ .sabbi-book_timeline .book-list-title a'),
                                            array('property' => 'text-transform', 'label' => 'Title Text Transform', 'selector' => '+ .sabbi-book_timeline .book-list-title a'),
                                            array('property' => 'text-align', 'label' => 'Title Text Align', 'selector' => '+ .sabbi-book_timeline .book-list-title a'),
                                            array('property' => 'margin', 'label' => 'Title Margin', 'selector' => '+ .sabbi-book_timeline .book-list-title a'),
                                            array('property' => 'padding', 'label' => 'Title Padding', 'selector' => '+ .sabbi-book_timeline .book-list-title a'),
                                      ),
                                      'Sorting Year' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+ .sabbi-book_timeline > li .year'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+:hover .sabbi-book_timeline > li .year:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .sabbi-book_timeline > li .year'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .sabbi-book_timeline > li .year'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .sabbi-book_timeline > li .year'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .sabbi-book_timeline > li .year'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .sabbi-book_timeline > li .year'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .sabbi-book_timeline > li .year'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .sabbi-book_timeline > li .year'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .sabbi-book_timeline > li .year'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+ .sabbi-book_timeline > li .year'),
                                      ),
                                      'Button' => array(
                                          array('property' => 'color', 'label' => 'Text Color', 'selector' => '+ .sabbi-book_timeline .btn-expand'),
                                          array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .sabbi-book_timeline .btn-expand'),
                                          array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .sabbi-book_timeline .btn-expand'),
                                          array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+ .sabbi-book_timeline .btn-expand'),
                                          array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .sabbi-book_timeline .btn-expand'),
                                          array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .sabbi-book_timeline .btn-expand'),
                                          array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .sabbi-book_timeline .btn-expand'),
                                          array('property' => 'text-align', 'label' => 'Align', 'selector' => '+ .sabbi-book_timeline .btn-expand'),
                                          array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .sabbi-book_timeline .btn-expand'),
                                          array('property' => 'display', 'label' => 'Display', 'selector' => '+ .sabbi-book_timeline .btn-expand'),
                                          array('property' => 'width', 'selector' => '+ .sabbi-book_timeline .btn-expand'),
                                          array('property' => 'height', 'selector' => '+ .sabbi-book_timeline .btn-expand'),
                                          array('property' => 'border', 'label' => 'Border', 'selector' => '+ .sabbi-book_timeline .btn-expand'),
                                          array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+ .sabbi-book_timeline .btn-expand'),
                                          array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .sabbi-book_timeline .btn-expand'),
                                          array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .sabbi-book_timeline .btn-expand'),
                                          array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+ .sabbi-book_timeline .btn-expand')

                                      ),
                                      'Button Mouse Hover' => array(
                                        array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+ .sabbi-book_timeline .btn-expand:hover'),
                                        array('property' => 'color', 'label' => 'Text Color', 'selector'=>'+ .sabbi-book_timeline .btn-expand:hover'),
                                        array('property' => 'background-color', 'label' => 'Background Color', 'selector'=>'+ .sabbi-book_timeline .btn-expand:hover'),
                                        array('property' => 'border', 'label' => 'Border', 'selector' => '+ .sabbi-book_timeline .btn-expand:hover'),
                                        array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+ .sabbi-book_timeline .btn-expand:hover')
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



