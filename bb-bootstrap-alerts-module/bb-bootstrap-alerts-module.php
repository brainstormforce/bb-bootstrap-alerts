<?php

class BSFBBNotifications extends FLBuilderModule {
	public function __construct()
	{
		parent::__construct(array(
            'name'          => __('BB Bootstrap Alerts', 'fl-builder'),
            'description'   => __('Simple Bootstrap Alerts Modules', 'fl-builder'),
            'category'		=> __('Advanced Modules', 'fl-builder'),
            'dir'           => BB_NOTIFICATIONS_DIR . 'bb-bootstrap-alerts-module/',
            'url'           => BB_NOTIFICATIONS_URL . 'bb-bootstrap-alerts-module/',
        ));
        // Already registered
        $this->add_css('font-awesome');
        //enqueueing bootstrap
        //$this->add_css('bbn_boot', $this->url . 'css/bootstrap.min.css');
        $this->add_js('bbn_boot', $this->url . 'js/bootstrap_alerts.js', array(), '', true);
	}
}

FLBuilder::register_module( 'BSFBBNotifications', array(
	'general'       => array( // Tab
        'title'         => __('General', 'fl-builder'),
        'sections'      => array(
            'general'       => array( // Section
                'title'         => __('General', 'fl-builder'),
                'fields'        => array(

                    // message field
                    'bbn_textarea_field' => array(
                    'type'               => 'textarea',
                    'label'              => __('Message to display', 'fl-builder'),
                    'placeholder'        => __('Message', 'fl-builder'),
                    'rows'               => '5' 
                    ),

                    // closable button
                    'bbn_closable'   => array(
                    'type'           => 'select',
                    'label'          => __('Closable', 'fl-builder'),
                    'options'        => array(
                        'yes'           => __( 'Yes', 'fl-builder' ),                            
                        'no'            => __( 'No', 'fl-builder' )
                        ),
                    'default'       => 'yes',
                    'help'          => 'Alert will able to close if set to YES',
                    ),

                    // notification type dropdown
                    'bbn_dropdown_field' => array(
                    'type'          => 'select',
                    'label'         => __('Notification Type', 'fl-builder'),
                    'options'       => array(
                        'alert-success'      => __( 'Success', 'fl-builder' ),
                        'alert-info'         => __( 'Information', 'fl-builder' ),
                        'alert-warning'      => __( 'Warning', 'fl-builder' ),
                        'alert-danger'       => __( 'Danger', 'fl-builder' ),
                        'alert-custom'       => __( 'Custom', 'fl-builder' )
                        ),
                    'default'       => '',
                    'toggle'        => array(

                            // dependency fields on custom dropdown item
                            'alert-custom'    => array(
                            'fields'          => array( 'bbn_font_color','bbn_background_color','bbn_border_color','bbn_border_size','bbn_border_style','bbn_border_radius' ),
                            ),
                        'no'      => array()
                        )
                    ),

                    // custom font color
                    'bbn_font_color' => array(
                    'type'           => 'color',
                    'label'          => __('Custom Font Color', 'fl-builder'),
                    'show_reset'     => true,
                    ),

                    // custom background color
                    'bbn_background_color' => array(
                    'type'                 => 'color',
                    'label'                => __('Custom Background Color', 'fl-builder'),
                    'show_reset'           => true,
                    ),

                    // custom border color
                    'bbn_border_color' => array(
                    'type'             => 'color',
                    'label'            => __('Custom Border Color', 'fl-builder'),
                    'show_reset'       => true,
                    ),

                    // custom border size
                    'bbn_border_size'     => array(          
                    'type'          => 'text',
                    'label'         => __('Border Size', 'fl-builder'),
                    'maxlength'     => '2',
                    'size'          => '3',
                    'placeholder'   => '1',
                    'class'         => 'my-css-class',
                    'description'   => 'px',
                    'help'          => 'In Pixel Only',
                    ),  

                    // custom border style
                    'bbn_border_style' => array(
                    'type'          => 'select',
                    'label'         => __('Border Style', 'fl-builder'),
                    'options'       => array(
                        'solid'      => __( 'Solid', 'fl-builder' ),
                        'dotted'     => __( 'Dotted', 'fl-builder' ),
                        'dashed'     => __( 'Dashed', 'fl-builder' ),
                        'double'     => __( 'Double', 'fl-builder' ),
                        'groove'     => __( 'Groove', 'fl-builder' ),
                        'ridge'      => __( 'Ridge', 'fl-builder' ),
                        'inset'      => __( 'Inset', 'fl-builder' ),
                        'outset'     => __( 'Outset', 'fl-builder' ),
                        'none'       => __( 'None', 'fl-builder' )
                        ),
                    'default'       => 'solid',
                    'help'          => 'Style of the border',
                    ),

                    // custom border radius
                    'bbn_border_radius' => array(          
                        'type'          => 'text',
                        'label'         => __('Border Radius', 'fl-builder'),
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placeholder'   => '4',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                        'help'          => 'In Pixel Only',
                    ),           
                ), // fields
            ), // General end 

            // link section
            'bbn_link'       => array(
                'title'         => __('Link', 'fl-builder'),
                'fields'        => array(

                 // link dropdown
                'bbn_dropdown_link' => array(                  
                    'type'            => 'select',
                    'label'           => __('Link', 'fl-builder'),
                    'options'         => array(
                        'no'  => __( 'No', 'fl-builder' ),
                        'yes' => __( 'Yes', 'fl-builder' )
                        ),
                    'default'         => 'no',
                    'help'            => 'Alert box will able to redirect to the given link',
                    'toggle'          => array(
                        'yes'      => array(
                        'fields'   => array( 'bbn_navigation_link', 'bbn_navigation_target'),
                        ),
                    )
                ),

                // link
                'bbn_navigation_link' => array(                 
                    'type'          => 'link',
                    'label'         => __('Link Address', 'fl-builder'),
                    'placeholder'   => __('http://', 'fl-builder')
                    ),

                // link target
                'bbn_navigation_target' => array(
                    'type'          => 'select',
                    'label'         => __('Link Target', 'fl-builder'),
                    'options'       => array(
                        '_self'      => __( 'Same Window', 'fl-builder' ),
                        '_blank'     => __( 'New Window', 'fl-builder' )
                        ),
                'default'               => 'no',
                    ),
                ), // fields
            ),// link end

            // structure section
            'bbn_structure'       => array(
                'title'        => __('Structure', 'fl-builder'),
                'fields'       => array(
                    'bbn_text_align'    => array(
                        'type'          => 'select',
                        'label'         => __('Alignment', 'fl-builder'),
                        'default'       => 'left',
                        'options'       => array(
                            'left'      => __( 'Left', 'fl-builder' ),
                            'right'     => __( 'Right', 'fl-builder' ),
                            'center'    => __( 'Center', 'fl-builder' )
                        ),
                        'help'          => "Overall Alignment of the Structure",
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
                'title'         => __('Padding', 'fl-builder'),
                'fields'        => array(
                    'bbn_padding_top'     => array(                     // padding top
                        'type'          => 'text',
                        'label'         => __('Padding Top', 'fl-builder'),
                        'maxlength'     => '3',
                        'size'          => '3',
                        'placeholder'   => '20',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                    ),
                    'bbn_padding_bottom'  => array(               // padding bottom
                        'type'          => 'text',
                        'label'         => __('Padding Bottom', 'fl-builder'),
                        'maxlength'     => '3',
                        'size'          => '3',
                        'placeholder'   => '20',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                    ),
                    'bbn_padding_left'    => array(               // padding left
                        'type'          => 'text',
                        'label'         => __('Padding Left', 'fl-builder'),
                        'maxlength'     => '3',
                        'size'          => '3',
                        'placeholder'   => '20',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                    ),
                    'bbn_padding_right'   => array(               // padding right
                        'type'          => 'text',
                        'label'         => __('Padding Right', 'fl-builder'),
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
        'title'         => __('Icon', 'fl-builder'),
         'sections'      => array(
            'icon'       => array(
                'title'         => __('Icon', 'fl-builder'),
                'fields'        => array(
                    'bbn_icon_field' => array(                    // icon
                        'type'          => 'icon',
                        'label'         => __( 'Icon Field', 'fl-builder' ),
                        'show_remove'   => true,
                        'help'          => 'Select icon to display (Optional)'
                    ),
                        'bbn_icon_color'=> array(
                        'type'          => 'color',
                        'label'         => __('Icon Color (Optional)', 'fl-builder'),
                        'show_reset'    => true,
                        ),
                        'bbn_icon_align'=> array(
                            'type'          => 'select',
                            'label'         => __('Icon Position', 'fl-builder'),
                            'default'       => 'before',
                            'options'       => array(
                                'before'  => __( 'Before Text', 'fl-builder' ),
                                'after'   => __( 'After Text', 'fl-builder' ),
                            ),
                        ), 
                    ) // fields
                ) //icon
            ) //section
        ), //icon tab

    // typography tab
    'typography'       => array(
        'title'        => __('Typography', 'fl-builder'),
        'sections'    => array(
            'typography'       => array(
                'title'         => __('Typography', 'fl-builder'),
                'fields'        => array(

                    // typography
                    'bbn_font_field' => array(    
                        'type'          => 'font',
                        'label'         => __( 'Typography', 'fl-builder' ),
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
                        'label'         => __('Font Size', 'fl-builder'),
                        'placeholder'   => '18',
                        'maxlength'     => '3',
                        'size'          => '5',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                    ),

                    // Line Height
                    'bbn_line_height'     => array(
                        'type'          => 'text',
                        'label'         => __('Line Height', 'fl-builder'),
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