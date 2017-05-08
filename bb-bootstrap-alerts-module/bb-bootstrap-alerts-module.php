<?php

class BSFBBNotifications extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
            'name'          => __('Bootstrap Alerts for Beaver Builder', 'bb-bootstrap-alerts'),
            'description'   => __('Simple Bootstrap Alerts Modules', 'bb-bootstrap-alerts'),
            'category'		=> __('Advanced Modules', 'bb-bootstrap-alerts'),
            'dir'           => BB_BALERTS_DIR . 'bb-bootstrap-alerts-module/',
            'url'           => BB_BALERTS_URL . 'bb-bootstrap-alerts-module/',
        ));
        // Already registered
        $this->add_css('font-awesome');
        //enqueueing bootstrap and cookie js
        $this->add_js('bbn_boot', $this->url . 'js/bootstrap_alerts.js', array(), '', true);
        $this->add_js('bbn_cookie', $this->url . 'js/js_cookie.js', array(), '', true);
	}
}

FLBuilder::register_module( 'BSFBBNotifications', array(
	'general'       => array( // Tab
        'title'         => __('General', 'bb-bootstrap-alerts'),
        'sections'      => array(
            'general'       => array( // Section
                'title'         => __('Message', 'bb-bootstrap-alerts'),
                'fields'        => array(

                    // message field
                    'bbn_textarea_field' => array(
                    'type'               => 'editor',
                    'media_buttons' => false,
                    'rows'               => '5',
                    'connections'   => array( 'string', 'html' ) 
                    ),

                    // closable button
                    'bbn_closable'   => array(
                    'type'           => 'select',
                    'label'          => __('Closable', 'bb-bootstrap-alerts'),
                    'options'        => array(
                        'yes'           => __( 'Yes', 'bb-bootstrap-alerts' ),                            
                        'no'            => __( 'No', 'bb-bootstrap-alerts' )
                        ),
                    'default'       => 'yes',
                    'help'          => __('Alert will able to close if set to YES','bb-bootstrap-alerts'),
                    'toggle'        => array(

                            // dependency fields on custom dropdown item
                            'yes'    => array(
                            'fields'          => array( 'bbn_appearance','bbn_close_btn_size'),
                            ),
                        'no'      => array()
                        )
                    ),
                    // appereance effect
                    'bbn_appearance'     => array(          
                    'type'          => 'text',
                    'label'         => __('Appearance Duration', 'bb-bootstrap-alerts'),
                    'maxlength'     => '3',
                    'size'          => '3',
                    'placeholder'   => '0',
                    'description'   => 'Days',
                    'help'          => __('Appearance Duration of Alert Box After Close', 'bb-bootstrap-alerts'),
                    ),
                    // close button size
                    'bbn_close_btn_size'     => array(          
                    'type'          => 'text',
                    'label'         => __('Close Button Size (Optional)', 'bb-bootstrap-alerts'),
                    'maxlength'     => '2',
                    'size'          => '3',
                    'placeholder'   => '21',
                    'class'         => 'my-css-class',
                    'description'   => 'px',
                    'help'          => __('Set only if it required', 'bb-bootstrap-alerts'),
                    ),

                    // notification type dropdown
                    'bbn_dropdown_field' => array(
                    'type'          => 'select',
                    'label'         => __('Notification Type', 'bb-bootstrap-alerts'),
                    'options'       => array(
                        'alert-success'      => __( 'Success', 'bb-bootstrap-alerts' ),
                        'alert-info'         => __( 'Information', 'bb-bootstrap-alerts' ),
                        'alert-warning'      => __( 'Warning', 'bb-bootstrap-alerts' ),
                        'alert-danger'       => __( 'Danger', 'bb-bootstrap-alerts' ),
                        'alert-custom'       => __( 'Custom', 'bb-bootstrap-alerts' )
                        ),
                    'default'       => '',
                    'help'          => __("If you want to change colors select 'Custom' option in dropdown. Default colors are as per Bootstrap",'bb-bootstrap-alerts'),
                    'toggle'        => array(

                            // dependency fields on custom dropdown item
                            'alert-custom'    => array(
                            'fields'          => array( 'bbn_font_color','bbn_background_color','bbn_border_style','bbn_border_radius' ),
                            ),
                        'no'      => array()
                        )
                    ),

                    // custom font color
                    'bbn_font_color' => array(
                    'type'           => 'color',
                    'label'          => __('Custom Font Color', 'bb-bootstrap-alerts'),
                    'show_reset'     => true,
                    ),

                    // custom background color
                    'bbn_background_color' => array(
                    'type'                 => 'color',
                    'label'                => __('Custom Background Color', 'bb-bootstrap-alerts'),
                    'show_reset'           => true,
                    ),

                    // custom border style
                    'bbn_border_style' => array(
                    'type'          => 'select',
                    'label'         => __('Border Style', 'bb-bootstrap-alerts'),
                    'options'       => array(
                        'solid'      => __( 'Solid', 'bb-bootstrap-alerts' ),
                        'dotted'     => __( 'Dotted', 'bb-bootstrap-alerts' ),
                        'dashed'     => __( 'Dashed', 'bb-bootstrap-alerts' ),
                        'double'     => __( 'Double', 'bb-bootstrap-alerts' ),
                        'groove'     => __( 'Groove', 'bb-bootstrap-alerts' ),
                        'ridge'      => __( 'Ridge', 'bb-bootstrap-alerts' ),
                        'inset'      => __( 'Inset', 'bb-bootstrap-alerts' ),
                        'outset'     => __( 'Outset', 'bb-bootstrap-alerts' ),
                        'none'       => __( 'None', 'bb-bootstrap-alerts' )
                        ),
                    'default'       => 'none',
                    'help'          => __('Style of the border','bb-bootstrap-alerts'),
                    'toggle'        => array(
                            'solid'    => array('fields'=> array('bbn_border_color','bbn_border_size' )),
                            'dotted'    => array('fields'=> array('bbn_border_color','bbn_border_size' )),
                            'dashed'    => array('fields'=> array('bbn_border_color','bbn_border_size' )),
                            'double'    => array('fields'=> array('bbn_border_color','bbn_border_size' )),
                            'groove'    => array('fields'=> array('bbn_border_color','bbn_border_size' )),
                            'ridge'    => array('fields'=> array('bbn_border_color','bbn_border_size' )),
                            'inset'    => array('fields'=> array('bbn_border_color','bbn_border_size' )),
                            'outset'    => array('fields'=> array('bbn_border_color','bbn_border_size' )),
                        )
                    ),

                    // custom border color
                    'bbn_border_color' => array(
                    'type'             => 'color',
                    'label'            => __('Custom Border Color', 'bb-bootstrap-alerts'),
                    'show_reset'       => true,
                    ),

                    // custom border size
                    'bbn_border_size'     => array(          
                    'type'          => 'text',
                    'label'         => __('Border Size', 'bb-bootstrap-alerts'),
                    'maxlength'     => '2',
                    'size'          => '3',
                    'placeholder'   => '1',
                    'class'         => 'my-css-class',
                    'description'   => 'px',
                    'help'          => __('In Pixel Only','bb-bootstrap-alerts'),
                    ),  

                    // custom border radius
                    'bbn_border_radius' => array(          
                        'type'          => 'text',
                        'label'         => __('Corner Radius', 'bb-bootstrap-alerts'),
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placeholder'   => '4',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                        'help'          => __('In Pixel Only','bb-bootstrap-alerts'),
                    ),           
                ), // fields
            ), // General end 

            // link section
            'bbn_link'       => array(
                'title'         => __('Link', 'bb-bootstrap-alerts'),
                'fields'        => array(

                 // link dropdown
                'bbn_dropdown_link' => array(                  
                    'type'            => 'select',
                    'label'           => __('Link', 'bb-bootstrap-alerts'),
                    'options'         => array(
                        'no'  => __( 'No', 'bb-bootstrap-alerts' ),
                        'yes' => __( 'Yes', 'bb-bootstrap-alerts' )
                        ),
                    'default'         => 'no',
                    'help'            => __('Alert box will able to redirect to the given link','bb-bootstrap-alerts'),
                    'toggle'          => array(
                        'yes'      => array(
                        'fields'   => array( 'bbn_navigation_link', 'bbn_navigation_target'),
                        ),
                    )
                ),

                // link
                'bbn_navigation_link' => array(                 
                    'type'          => 'link',
                    'label'         => __('Link Address', 'bb-bootstrap-alerts'),
                    'placeholder'   => __('http://', 'bb-bootstrap-alerts')
                    ),

                // link target
                'bbn_navigation_target' => array(
                    'type'          => 'select',
                    'label'         => __('Link Target', 'bb-bootstrap-alerts'),
                    'options'       => array(
                        '_self'      => __( 'Same Window', 'bb-bootstrap-alerts' ),
                        '_blank'     => __( 'New Window', 'bb-bootstrap-alerts' )
                        ),
                'default'               => 'no',
                    ),
                ), // fields
            ),// link end

            // structure section
            'bbn_structure'       => array(
                'title'        => __('Structure', 'bb-bootstrap-alerts'),
                'fields'       => array(
                    'bbn_text_align'    => array(
                        'type'          => 'select',
                        'label'         => __('Alignment', 'bb-bootstrap-alerts'),
                        'default'       => 'left',
                        'options'       => array(
                            'left'      => __( 'Left', 'bb-bootstrap-alerts' ),
                            'right'     => __( 'Right', 'bb-bootstrap-alerts' ),
                            'center'    => __( 'Center', 'bb-bootstrap-alerts' )
                        ),
                        'help'          => __("Overall Alignment of the Structure",'bb-bootstrap-alerts'),
                        'preview'       => array(
                            'type'        => 'css',
                            'selector'    => '.bb-bootstrap-alerts',
                            'property'    => 'text-align',
                        )
                    ),
                ),//fields
            ),// structure end

            // padding section
            'bbn_padding'       => array(
                'title'         => __('Padding', 'bb-bootstrap-alerts'),
                'fields'        => array(
                    'bbn_padding_top'     => array(                     // padding top
                        'type'          => 'text',
                        'label'         => __('Padding Top', 'bb-bootstrap-alerts'),
                        'maxlength'     => '3',
                        'size'          => '3',
                        'placeholder'   => '20',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                    ),
                    'bbn_padding_bottom'  => array(               // padding bottom
                        'type'          => 'text',
                        'label'         => __('Padding Bottom', 'bb-bootstrap-alerts'),
                        'maxlength'     => '3',
                        'size'          => '3',
                        'placeholder'   => '20',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                    ),
                    'bbn_padding_left'    => array(               // padding left
                        'type'          => 'text',
                        'label'         => __('Padding Left', 'bb-bootstrap-alerts'),
                        'maxlength'     => '3',
                        'size'          => '3',
                        'placeholder'   => '20',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                    ),
                    'bbn_padding_right'   => array(               // padding right
                        'type'          => 'text',
                        'label'         => __('Padding Right', 'bb-bootstrap-alerts'),
                        'maxlength'     => '3',
                        'size'          => '3',
                        'placeholder'   => '20',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                    ),
                ),  
            )// fields
        ),// padding section end
    ),// general tab

    // icon tab
    'icon'       => array(
        'title'         => __('Icon', 'bb-bootstrap-alerts'),
         'sections'      => array(
            'icon'       => array(
                'title'         => __('Icon', 'bb-bootstrap-alerts'),
                'fields'        => array(
                    'bbn_icon_field' => array(                    // icon
                        'type'          => 'icon',
                        'label'         => __( 'Icon Field', 'bb-bootstrap-alerts' ),
                        'show_remove'   => true,
                        'help'          => __('Select icon to display (Optional)','bb-bootstrap-alerts')
                    ),
                        'bbn_icon_color'=> array(
                        'type'          => 'color',
                        'label'         => __('Icon Color (Optional)', 'bb-bootstrap-alerts'),
                        'show_reset'    => true,
                        ),
                        'bbn_icon_align'=> array(
                            'type'          => 'select',
                            'label'         => __('Icon Position', 'bb-bootstrap-alerts'),
                            'default'       => 'before',
                            'options'       => array(
                                'before'  => __( 'Before Text', 'bb-bootstrap-alerts' ),
                                'after'   => __( 'After Text', 'bb-bootstrap-alerts' ),
                            ),
                        ), 
                    ) // fields
                ) //icon
            ) //section
        ), //icon tab

    // typography tab
    'typography'       => array(
        'title'        => __('Typography', 'bb-bootstrap-alerts'),
        'sections'    => array(
            'typography'       => array(
                'title'         => __('Typography', 'bb-bootstrap-alerts'),
                'fields'        => array(

                    // typography
                    'bbn_font_field' => array(    
                        'type'          => 'font',
                        'label'         => __( 'Typography', 'bb-bootstrap-alerts' ),
                        'default'       => array(
                            'family'        => 'Defaults',
                            'weight'        => 'Defaults'
                            ),
                        'preview'       => array(
                            'type'          => 'font',
                            'selector'      => '.bb-bootstrap-alerts'  
                        )
                    ),

                    // Font Size
                        'bbn_font_size'     => array(
                        'type'          => 'text',
                        'label'         => __('Font Size', 'bb-bootstrap-alerts'),
                        'placeholder'   => '18',
                        'maxlength'     => '3',
                        'size'          => '5',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                    ),

                    // Line Height
                    'bbn_line_height'     => array(
                        'type'          => 'text',
                        'label'         => __('Line Height', 'bb-bootstrap-alerts'),
                        'placeholder'   => '22',
                        'maxlength'     => '3',
                        'size'          => '5',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                    ),
                )// fields
            ) 
        ) 
    )
) );