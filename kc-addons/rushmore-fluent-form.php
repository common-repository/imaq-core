<?php 
/*
 * IMAQ fluent form map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */
add_action('init', 'IMAQ_fluent_form', 99 );

if ( !function_exists('IMAQ_fluent_form') ) {

  function IMAQ_fluent_form(){
    $contact_forms = IMAQ_get_fluent_form_names();

    if (function_exists('kc_add_map')) { 

      kc_add_map(
          array(
              'IMAQ_fluent_form' => array(
              'name' => esc_html__( 'Fluent Form', 'IMAQ' ),
              'icon' => 'sl-energy',
              'category' => esc_html__('IMAQ', 'IMAQ'),
                  'params' => array(

                      'general' => array(

                          array(
                              'name' => 'contact_form_id',
                              'label' => esc_html__('Select Contact Form', 'IMAQ'),
                              'description' => esc_html__( 'Choose previously created contact form from the drop down list.', 'IMAQ' ),
                              'type' => 'select',
                              'options' => $contact_forms
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
                                        'Background' => array(
                                            array('property' => 'background', 'label' => 'Background Color', 'selector' => '+.contact-form'),
                                            array('property' => 'border', 'label' => 'Border', 'selector' => '+.contact-form'),
                                            array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+.contact-form'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.contact-form'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.contact-form'),
                                        ),
                                        'Label' => array(
                                            array('property' => 'color', 'label' => 'Text Color', 'selector' => '+.contact-form .ff-el-input--label label'),
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.contact-form .ff-el-input--label label'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.contact-form .ff-el-input--label label'),
                                            array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.contact-form .ff-el-input--label label'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.contact-form .ff-el-input--label label'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.contact-form .ff-el-input--label label'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.contact-form .ff-el-input--label label'),
                                            array('property' => 'text-align', 'label' => 'Align', 'selector' => '+.contact-form .ff-el-input--label label'),
                                            array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+.contact-form .ff-el-input--label label'),
                                            array('property' => 'display', 'label' => 'Display', 'selector' => '+.contact-form .ff-el-input--label label'),
                                            array('property' => 'width', 'selector' => '+.contact-form .ff-el-input--label label'),
                                            array('property' => 'height', 'selector' => '+.contact-form .ff-el-input--label label'),
                                            array('property' => 'border', 'label' => 'Border', 'selector' => '+.contact-form .ff-el-input--label label'),
                                            array('property' => 'border-color', 'label' => 'Border Color', 'selector' => '+.contact-form .ff-el-input--label label'),
                                            array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+.contact-form .ff-el-input--label label'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.contact-form .ff-el-input--label label'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.contact-form .ff-el-input--label label'),
                                        ),
                                        'Input' => array(
                                            array('property' => 'color', 'label' => 'Text Color', 'selector' => '+.contact-form input'),
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.contact-form input'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.contact-form input'),
                                            array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.contact-form input'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.contact-form input'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.contact-form input'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.contact-form input'),
                                            array('property' => 'text-align', 'label' => 'Align', 'selector' => '+.contact-form input'),
                                            array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+.contact-form input'),
                                            array('property' => 'display', 'label' => 'Display', 'selector' => '+.contact-form input'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+.contact-form input'),
                                            array('property' => 'height', 'label' => 'Height', 'selector' => '+.contact-form input'),
                                            array('property' => 'border', 'label' => 'Border', 'selector' => '+.contact-form input'),
                                            array('property' => 'border-color', 'label' => 'Border Color', 'selector' => '+.contact-form input'),
                                            array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+.contact-form input'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.contact-form input'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.contact-form input'),
                                        ),
                                         'Textarea' => array(
                                            array('property' => 'color', 'label' => 'Text Color', 'selector' => '+.contact-form textarea'),
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.contact-form textarea'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.contact-form textarea'),
                                            array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.contact-form textarea'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.contact-form textarea'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.contact-form textarea'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.contact-form textarea'),
                                            array('property' => 'text-align', 'label' => 'Align', 'selector' => '+.contact-form textarea'),
                                            array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+.contact-form textarea'),
                                            array('property' => 'display', 'label' => 'Display', 'selector' => '+.contact-form textarea'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+.contact-form textarea'),
                                            array('property' => 'height', 'label' => 'Height', 'selector' => '+.contact-form textarea'),
                                            array('property' => 'border', 'label' => 'Border', 'selector' => '+.contact-form textarea'),
                                            array('property' => 'border-color', 'label' => 'Border Color', 'selector' => '+.contact-form textarea'),
                                            array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+.contact-form textarea'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.contact-form textarea'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.contact-form textarea'),
                                        ),
                                        'Button' => array(
                                          array('property' => 'color', 'label' => 'Text Color', 'selector' => '+.contact-form .ff-btn'),
                                          array('property' => 'background', 'label' => 'Background Color', 'selector' => '+.contact-form .ff-btn'),
                                          array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.contact-form .ff-btn'),
                                          array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.contact-form .ff-btn'),
                                          array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.contact-form .ff-btn'),
                                          array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.contact-form .ff-btn'),
                                          array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.contact-form .ff-btn'),
                                          array('property' => 'text-align', 'label' => 'Align', 'selector' => '+.contact-form .ff-btn'),
                                          array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+.contact-form .ff-btn'),
                                          array('property' => 'display', 'label' => 'Display', 'selector' => '+.contact-form .ff-btn'),
                                          array('property' => 'width', 'selector' => '+.contact-form .ff-btn'),
                                          array('property' => 'height', 'selector' => '+.contact-form .ff-btn'),
                                          array('property' => 'border', 'label' => 'Border', 'selector' => '+.contact-form .ff-btn'),
                                          array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+.contact-form .ff-btn'),
                                          array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.contact-form .ff-btn'),
                                          array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.contact-form .ff-btn'),
                                      ),

                                )
                            ) //End of options
                          )

                      ), //End of styling
                      'hover' => array(
                            array(
                                'name' => 'custom_css',
                                'type' => 'css',
                                'options' => array(
                                    array(
                                        'screens' => 'any,1024,999,767,479',
                                        'Background' => array(
                                            array('property' => 'background', 'label' => 'Background Color', 'selector' => '+.contact-form:hover'),
                                            array('property' => 'border', 'label' => 'Border', 'selector' => '+.contact-form:hover'),
                                            array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+.contact-form:hover'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.contact-form:hover'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.contact-form:hover'),
                                        ),
                                        'Label' => array(
                                            array('property' => 'color', 'label' => 'Text Color', 'selector' => '+.contact-form .ff-el-input--label label:hover'),
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.contact-form .ff-el-input--label label:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.contact-form .ff-el-input--label label:hover'),
                                            array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.contact-form .ff-el-input--label label:hover'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.contact-form .ff-el-input--label label:hover'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.contact-form .ff-el-input--label label:hover'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.contact-form .ff-el-input--label label:hover'),
                                            array('property' => 'text-align', 'label' => 'Align', 'selector' => '+.contact-form .ff-el-input--label label:hover'),
                                            array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+.contact-form .ff-el-input--label label:hover'),
                                            array('property' => 'display', 'label' => 'Display', 'selector' => '+.contact-form .ff-el-input--label label:hover'),
                                            array('property' => 'width', 'selector' => '+.contact-form .ff-el-input--label label:hover'),
                                            array('property' => 'height', 'selector' => '+.contact-form .ff-el-input--label label:hover'),
                                            array('property' => 'border', 'label' => 'Border', 'selector' => '+.contact-form .ff-el-input--label label:hover'),
                                            array('property' => 'border-color', 'label' => 'Border Color', 'selector' => '+.contact-form .ff-el-input--label label:hover'),
                                            array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+.contact-form .ff-el-input--label label:hover'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.contact-form .ff-el-input--label label:hover'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.contact-form .ff-el-input--label label:hover'),
                                        ),
                                        'Input' => array(
                                            array('property' => 'color', 'label' => 'Text Color', 'selector' => '+.contact-form input[type="text"]:hover, +.contact-form input[type="email"]:hover'),
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.contact-form input[type="text"]:hover, +.contact-form input[type="email"]:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.contact-form input[type="text"]:hover, +.contact-form input[type="email"]:hover'),
                                            array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.contact-form input[type="text"]:hover, +.contact-form input[type="email"]:hover'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.contact-form input[type="text"]:hover, +.contact-form input[type="email"]:hover'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.contact-form input[type="text"]:hover, +.contact-form input[type="email"]:hover'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.contact-form input[type="text"]:hover, +.contact-form input[type="email"]:hover'),
                                            array('property' => 'text-align', 'label' => 'Align', 'selector' => '+.contact-form input[type="text"]:hover, +.contact-form input[type="email"]:hover'),
                                            array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+.contact-form input[type="text"]:hover, +.contact-form input[type="email"]:hover'),
                                            array('property' => 'display', 'label' => 'Display', 'selector' => '+.contact-form input[type="text"]:hover, +.contact-form input[type="email"]:hover'),
                                            array('property' => 'width', 'selector' => '+.contact-form input[type="text"]:hover, +.contact-form input[type="email"]:hover'),
                                            array('property' => 'height', 'selector' => '+.contact-form input[type="text"]:hover, +.contact-form input[type="email"]:hover'),
                                            array('property' => 'border', 'label' => 'Border', 'selector' => '+.contact-form input[type="text"]:hover, +.contact-form input[type="email"]:hover'),
                                            array('property' => 'border-color', 'label' => 'Border Color', 'selector' => '+.contact-form input[type="text"]:hover, +.contact-form input[type="email"]:hover'),
                                            array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+.contact-form input[type="text"]:hover, +.contact-form input[type="email"]:hover'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.contact-form input[type="text"]:hover, +.contact-form input[type="email"]:hover'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.contact-form input[type="text"]:hover, +.contact-form input[type="email"]:hover'),
                                        ),
                                      'Textarea' => array(
                                            array('property' => 'color', 'label' => 'Text Color', 'selector' => '+.contact-form textarea:hover'),
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+.contact-form textarea:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.contact-form textarea:hover'),
                                            array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.contact-form textarea:hover'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.contact-form textarea:hover'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.contact-form textarea:hover'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.contact-form textarea:hover'),
                                            array('property' => 'text-align', 'label' => 'Align', 'selector' => '+.contact-form textarea:hover'),
                                            array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+.contact-form textarea:hover'),
                                            array('property' => 'display', 'label' => 'Display', 'selector' => '+.contact-form textarea:hover'),
                                            array('property' => 'width', 'selector' => '+.contact-form textarea:hover'),
                                            array('property' => 'height', 'selector' => '+.contact-form textarea:hover'),
                                            array('property' => 'border', 'label' => 'Border', 'selector' => '+.contact-form textarea:hover'),
                                            array('property' => 'border-color', 'label' => 'Border Color', 'selector' => '+.contact-form textarea:hover'),
                                            array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+.contact-form textarea:hover'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.contact-form textarea:hover'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.contact-form textarea:hover'),
                                        ),
                                      'Button' => array(
                                        array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+.contact-form .ff-btn:hover'),
                                        array('property' => 'color', 'label' => 'Text Color', 'selector'=>'+.contact-form .ff-btn:hover'),
                                        array('property' => 'background-color', 'label' => 'Background Color', 'selector'=>'+.contact-form .ff-btn:hover'),
                                        array('property' => 'border', 'label' => 'Border', 'selector' => '+.contact-form .ff-btn:hover'),
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

          ) // End Array

      ); // End add map

    } // End if

  } // End function

} // End if