<?php 
/*
 * rushmore slides shortcode map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

add_action('init', 'rushmore_slider', 99 );

if ( !function_exists('rushmore_slider') ) {

    function rushmore_slider(){

        if (function_exists('kc_add_map')) { 
            kc_add_map(
                array(
                    'rushmore_slides' => array(
	                       'name' => esc_html__( 'Rushmore Slides', 'IMAQ' ),
	                       'icon' => 'sl-energy',
	                       'category' => esc_html__( 'IMAQ', 'IMAQ'),
	                       'params' => array(
	                       'general' => array(
	                       		array(
	                       			'name' => 'slides',
	                       			'label' => esc_html__( 'Sildes', 'IMAQ'),
	                       			'type' => 'group', 
	                       			'options' => array( 'add_text' => esc_html__(' Add new slide', 'IMAQ') ),
		                       		'value' => base64_encode( json_encode(array(
		                                '1' => array(
		                                    'image' => '',
		                                    'title' => '',
		                                    'slide_text' => '',
		                                    'btn_text' => '',
		                                    'btn_link' => ''
		                                ),
                             		) ) ),
                             		'params' => array(
		                                    array(
		                                        'name' => 'image',
		                                        'label' => esc_html__('Add Image', 'IMAQ'),
		                                        'description' => esc_html__( 'Upload your image', 'IMAQ' ),
		                                        'type' => 'attach_image',
		                                        'value' => '',
		                                    ),
		                                    array(
		                                       'name' => 'title',
		                                       'label' => esc_html__('Title', 'IMAQ'),
		                                       'description' => esc_html__( 'Write your title here.', 'IMAQ' ),
		                                       'type' => 'text',
		                                       'value' => '',
		                                    ),
		                                    array(
		                                       'name' => 'slide_text',
		                                       'label' => esc_html__( 'Content', 'IMAQ'),
		                                       'description' => esc_html__( 'Write your content here.', 'IMAQ' ),
		                                       'type' => 'textarea',
		                                       'value' => 'text',
		                                    ),   
		                                    array(
					                            'type' => 'text',
					                            'label' => esc_html__( 'Button Text', 'IMAQ' ),
					                            'name' => 'btn_text',
					                            'value' => esc_html__( 'read more', 'IMAQ' ),
					                            'description' => esc_html__( 'Write your button text here', 'IMAQ' )
					                        ),
					                        array(
					                            'type' => 'link',
					                            'label' => esc_html__( 'Add Link', 'IMAQ' ),
					                            'name' => 'btn_link',
					                            'description' => esc_html__( 'Add link to button', 'IMAQ' ),
					                        ),     
                                        ),
                                ),
                                array(
                                    'type' => 'radio',
                                    'label' => esc_html__( 'Enable AutoPlay?', 'IMAQ' ),
                                    'name' => 'slideautoplay',
                                    'options' => array( 
                                      'true' => 'Yes',
                                      'false' => 'No',
                                    ),
                                  
                                ),
                                array(
                                  'type' => 'dropdown',
                                  'label' => esc_html__( 'Slide Time', 'IMAQ' ),
                                  'name' => 'slideautoplayinterval',
                                  'value' => '3000',
                                  'options' => array(
                                     '1000' => esc_html__( '1 Second', 'IMAQ' ),
                                     '2000' => esc_html__( '2 Seconds', 'IMAQ' ),
                                     '3000' => esc_html__( '3 Seconds', 'IMAQ' ),
                                     '4000' => esc_html__( '4 Seconds', 'IMAQ' ),
                                     '5000' => esc_html__( '5 Seconds', 'IMAQ' ),
                                     '6000' => esc_html__( '6 Seconds', 'IMAQ' ),
                                     '7000' => esc_html__( '7 Seconds', 'IMAQ' ),
                                     '8000' => esc_html__( '8 Seconds', 'IMAQ' ),
                                     '9000' => esc_html__( '9 Seconds', 'IMAQ' ),
                                     '10000' => esc_html__( '10 Seconds', 'IMAQ' ),
                                     '11000' => esc_html__( '11 Seconds', 'IMAQ' ),
                                     '12000' => esc_html__( '12 Seconds', 'IMAQ' ),
                                     '13000' => esc_html__( '13 Seconds', 'IMAQ' ),
                                     '14000' => esc_html__( '14 Seconds', 'IMAQ' ),
                                     '15000' => esc_html__( '15 Seconds', 'IMAQ' ),
                                  ),
                                  'relation' => array(
                                     'parent' => 'slideautoplay',
                                     'show_when' => array('true'),
                                  ),
                                ),
                                array(
	                                'name' => 'custom_class',
	                                'label' => esc_html__('Extra Class Name', 'IMAQ'),
	                                'type' => 'text',
	                                'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'IMAQ' ),
	                             ),
	                       	), // end of general
	                       'styling' => array(
                            array(
                                'name' => 'custom_css',
                                'type' => 'css',
                                'options' => array(
                                    array(
                                        'screens' => 'any,1024,999,767,479',
                                        'Title' => array(
                                            array('property' => 'color', 'label' => 'Title Color', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-title'),
                                            array('property' => 'color', 'label' => 'Title Color Hover', 'selector' => '+:hover .seq--kawsa.seq-active .seq-content .seq-title'),
                                            array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-title'),
                                            array('property' => 'font-size', 'label' => 'Title Font Size', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-title'),
                                            array('property' => 'font-weight', 'label' => 'Title Font Weight', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-title'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-title'),
                                            array('property' => 'text-transform', 'label' => 'Title Text Transform', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-title'),
                                            array('property' => 'text-align', 'label' => 'Title Text Align', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-title'),
                                            array('property' => 'margin', 'label' => 'Title Margin', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-title'),
                                            array('property' => 'padding', 'label' => 'Title Padding', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-title'),
                                      ),
                                      'Desc' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-meta-text'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+:hover .seq--kawsa.seq-active .seq-content .seq-meta-text:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-meta-text'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-meta-text'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-meta-text'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-meta-text'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-meta-text'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-meta-text'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-meta-text'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-meta-text'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+ .seq--kawsa.seq-active .seq-content .seq-meta-text'),
                                      ),
                                      'Button' => array(
                                          array('property' => 'color', 'label' => 'Text Color', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link'),
                                          array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link'),
                                          array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link'),
                                          array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link'),
                                          array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link'),
                                          array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link'),
                                          array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link'),
                                          array('property' => 'text-align', 'label' => 'Align', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link'),
                                          array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link'),
                                          array('property' => 'display', 'label' => 'Display', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link'),
                                          array('property' => 'width', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link'),
                                          array('property' => 'height', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link'),
                                          array('property' => 'border', 'label' => 'Border', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link'),
                                          array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link'),
                                          array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link'),
                                          array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link'),
                                          array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link')

                                      ),
                                      'Button Mouse Hover' => array(
                                        array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link:hover'),
                                        array('property' => 'color', 'label' => 'Text Color', 'selector'=>'+ .seq--kawsa.seq-active .seq-content .btn-link:hover'),
                                        array('property' => 'background-color', 'label' => 'Background Color', 'selector'=>'+ .seq--kawsa.seq-active .seq-content .btn-link:hover'),
                                        array('property' => 'border', 'label' => 'Border', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link:hover'),
                                        array('property' => 'text-decoration', 'label' => 'Text Decoration', 'selector' => '+ .seq--kawsa.seq-active .seq-content .btn-link:hover')

                                      ),
                                      'Next Prev Button' => array(
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .sec-navigate-wrap .seq-next, .sec-navigate-wrap .seq-prev'),
                                            array('property' => 'background-color', 'label' => 'Background Color Hover', 'selector' => '+ .sec-navigate-wrap .seq-next:hover, .sec-navigate-wrap .seq-prev:hover'),
                                            array('property' => 'height', 'label' => 'Height', 'selector' => '+ .sec-navigate-wrap .seq-next, .sec-navigate-wrap .seq-prev'),
                                             array('property' => 'Width', 'label' => 'Width', 'selector' => '+ .sec-navigate-wrap .seq-next, .sec-navigate-wrap .seq-prev'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .sec-navigate-wrap .seq-next, .sec-navigate-wrap .seq-prev'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .sec-navigate-wrap .seq-next, .sec-navigate-wrap .seq-prev'),
                                       ),
                                      'Slider Box' => array(
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .seq--kawsa.seq-active .seq-content:before'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+ .seq--kawsa.seq-active .seq-content'),
                                            array('property' => 'height', 'label' => 'Height', 'selector' => '+ .seq--kawsa.seq-active .seq-content'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .seq--kawsa.seq-active .seq-content'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .seq--kawsa.seq-active .seq-content'),
                                         ),
                                        'Box' => array(
	                                        array('property' => 'height', 'label' => 'Height', 'selector' => '+ .seq--kawsa'),
	                                        array('property' => 'max-height', 'label' => 'Mx Height', 'selector' => '+ .seq--kawsa'),
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
        }
    }
}