<?php 
/*
 * rushmore conference list shortcode map
 * Author: IMAQ
 * Author URI: https://imaqpress.com/team/dr-muhammad-irfan-maqsood/
 * Devs: Utpol Deb Nath
 * Devs URI: https://www.facebook.com/
 * Version: 1.1.0
 */

add_action('init', 'rushmore_conference_list', 99 );

if ( !function_exists('rushmore_conference_list') ) {

    function rushmore_conference_list(){

        if (function_exists('kc_add_map')) { 
            kc_add_map(
                array(
                    'rushmore_conference_list' => array(
	                       'name' => esc_html__( 'Conference List', 'IMAQ' ),
	                       'icon' => 'sl-energy',
	                       'category' => esc_html__( 'IMAQ', 'IMAQ'),
	                       'params' => array(
	                       'general' => array(
	                       		array(
	                       			'name' => 'conference_list',
	                       			'label' => esc_html__( 'Conference List', 'IMAQ'),
	                       			'type' => 'group', 
	                       			'options' => array( 'add_text' => esc_html__(' Add new conference', 'IMAQ') ),
		                       		'value' => base64_encode( json_encode(array(
		                                '1' => array(
		                                    'date'        => '',
		                                    'time'        => '',
		                                    'location'    => '',
		                                    'title'       => '',
		                                    'link'        => '',
		                                    'content' => ''
		                                ),
                             		) ) ),
                             		'params' => array(
			                                array(
				                                'name' => 'date',
				                                'label' => esc_html__('Date', 'IMAQ'),
				                                'description' => esc_html__( 'Add your conference date here. Example( 2018 1st August)', 'IMAQ' ),
				                                'type' => 'text',
				                                'value' => '',
			                                ),
		                                    array(
		                                       'name' => 'time',
		                                       'label' => esc_html__('Time', 'IMAQ'),
		                                       'description' => esc_html__( 'Write your conference time here.', 'IMAQ' ),
		                                       'type' => 'text',
		                                       'value' => '',
		                                    ),
		                                    array(
		                                       'name' => 'location',
		                                       'label' => esc_html__('Location', 'IMAQ'),
		                                       'description' => esc_html__( 'Write your conference location here.', 'IMAQ' ),
		                                       'type' => 'text',
		                                       'value' => '',
		                                    ),
		                                    array(
		                                       'name' => 'title',
		                                       'label' => esc_html__('Title', 'IMAQ'),
		                                       'description' => esc_html__( 'Write your conference title here.', 'IMAQ' ),
		                                       'type' => 'text',
		                                       'value' => '',
		                                    ),
		                                    array(
		                                       'name' => 'link',
		                                       'label' => esc_html__('Add Link', 'IMAQ'),
		                                       'description' => esc_html__( 'Add link to title', 'IMAQ' ),
		                                       'type' => 'link',
		                                       'value' => '#',
		                                    ),
		                                    array(
		                                       'name' => 'content',
		                                       'label' => esc_html__( 'Content', 'IMAQ'),
		                                       'description' => esc_html__( 'Write your conference content here.', 'IMAQ' ),
		                                       'type' => 'textarea',
		                                       'value' => '',
		                                    ),        
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
                                            array('property' => 'color', 'label' => 'Title Color', 'selector' => '+ .timeline-meta .staff-title a'),
                                            array('property' => 'color', 'label' => 'Title Color Hover', 'selector' => '+:hover .timeline-meta .staff-title a'),
                                            array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => '+ .timeline-meta .staff-title a'),
                                            array('property' => 'font-size', 'label' => 'Title Font Size', 'selector' => '+ .timeline-meta .staff-title a'),
                                            array('property' => 'font-weight', 'label' => 'Title Font Weight', 'selector' => '+ .timeline-meta .staff-title a'),
                                            array('property' => 'line-height', 'label' => 'Title Line Height', 'selector' => '+ .timeline-meta .staff-title a'),
                                            array('property' => 'text-transform', 'label' => 'Title Text Transform', 'selector' => '+ .timeline-meta .staff-title a'),
                                            array('property' => 'text-align', 'label' => 'Title Text Align', 'selector' => '+ .timeline-meta .staff-title a'),
                                            array('property' => 'margin', 'label' => 'Title Margin', 'selector' => '+ .timeline-meta .staff-title a'),
                                            array('property' => 'padding', 'label' => 'Title Padding', 'selector' => '+ .timeline-meta .staff-title a'),
                                      ),
                                      'Time' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+ .timeline-meta .__time'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+ .timeline-meta .__time:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .timeline-meta .__time'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .timeline-meta .__time'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .timeline-meta .__time'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .timeline-meta .__time'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .timeline-meta .__time'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .timeline-meta .__time'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .timeline-meta .__time'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .timeline-meta .__time'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+ .timeline-meta .__time'),
                                      ),
                                      'Location' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+ .timeline-meta .__loc'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+ .timeline-meta .__loc:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .timeline-meta .__loc'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .timeline-meta .__loc'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .timeline-meta .__loc'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .timeline-meta .__loc'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .timeline-meta .__loc'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .timeline-meta .__loc'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .timeline-meta .__loc'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .timeline-meta .__loc'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+ .timeline-meta .__loc'),
                                      ),
                                      'Date Year' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                      ),
                                      'Date Month' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+ .auth-deff_timeline > li .time-span .time-year,  .auth-deff_timeline > li .time-span .time-month'),
                                      ),
                                      'Desc' => array(
                                            array('property' => 'color', 'label' => 'Color', 'selector' => '+ .timeline-meta p.meta-text'),
                                            array('property' => 'color', 'label' => 'Color Hover', 'selector' => '+ .timeline-meta p.meta-text:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .timeline-meta p.meta-text'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .timeline-meta p.meta-text'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .timeline-meta p.meta-text'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .timeline-meta p.meta-text'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .timeline-meta p.meta-text'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .timeline-meta p.meta-text'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .timeline-meta p.meta-text'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .timeline-meta p.meta-text'),
                                            array('property' => 'width', 'label' => 'Width', 'selector' => '+ .timeline-meta p.meta-text'),
                                      ),

                                      'Date Wrapper' => array(
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .auth-deff_timeline > li .time-span'),
                                            array('property' => 'background-color', 'label' => 'Background Color Hover', 'selector' => '+ .auth-deff_timeline > li .time-span:hover'),
                                            array('property' => 'color', 'label' => 'Font Color', 'selector' => '+ .auth-deff_timeline > li .time-span'),
                                            array('property' => 'color', 'label' => 'Font Color Hover', 'selector' => '+ .auth-deff_timeline > li .time-span:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .auth-deff_timeline > li .time-span'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .auth-deff_timeline > li .time-span'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .auth-deff_timeline > li .time-span'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .auth-deff_timeline > li .time-span'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .auth-deff_timeline > li .time-span'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .auth-deff_timeline > li .time-span'),
                                            array('property' => 'border', 'label' => 'Border', 'selector' => '+ .auth-deff_timeline > li .time-span'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .auth-deff_timeline > li .time-span'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .auth-deff_timeline > li .time-span'),
                                        ),
                                      'Content Wrapper' => array(
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .auth-deff_timeline > li .timeline-meta'),
                                            array('property' => 'background-color', 'label' => 'Background Color Hover', 'selector' => '+ .auth-deff_timeline > li .timeline-meta:hover'),
                                            array('property' => 'color', 'label' => 'Font Color', 'selector' => '+ .auth-deff_timeline > li .timeline-meta'),
                                            array('property' => 'color', 'label' => 'Font Color Hover', 'selector' => '+ .auth-deff_timeline > li .timeline-meta:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .auth-deff_timeline > li .timeline-meta'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .auth-deff_timeline > li .timeline-meta'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .auth-deff_timeline > li .timeline-meta'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .auth-deff_timeline > li .timeline-meta'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .auth-deff_timeline > li .timeline-meta'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .auth-deff_timeline > li .timeline-meta'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .auth-deff_timeline > li .timeline-meta'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .auth-deff_timeline > li .timeline-meta'),
                                       ),
                                      'Box' => array(
                                            array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .auth-deff_timeline > li'),
                                            array('property' => 'background-color', 'label' => 'Background Color Hover', 'selector' => '+ .auth-deff_timeline > li:hover'),
                                            array('property' => 'color', 'label' => 'Font Color', 'selector' => '+ .auth-deff_timeline > li'),
                                            array('property' => 'color', 'label' => 'Font Color Hover', 'selector' => '+ .auth-deff_timeline > li:hover'),
                                            array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .auth-deff_timeline > li'),
                                            array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .auth-deff_timeline > li'),
                                            array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .auth-deff_timeline > li'),
                                            array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .auth-deff_timeline > li'),
                                            array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .auth-deff_timeline > li'),
                                            array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .auth-deff_timeline > li'),
                                            array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .auth-deff_timeline > li'),
                                            array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .auth-deff_timeline > li'),
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