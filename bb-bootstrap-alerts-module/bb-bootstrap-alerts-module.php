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
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
/** 
         * Use these methods to enqueue css and js already
         * registered or to register and enqueue your own.
         */
        // Already registered
        $this->add_css('font-awesome');

        //enqueueing bootstrap
                // Register and enqueue your own
        $this->add_css('bbn_boot', $this->url . 'css/bootstrap.min.css');
        $this->add_js('bbn_boot', $this->url . 'js/bootstrap.min.js', array(), '', true);
	}
    /*public function render_bbn_icon() {
        echo '<i class="'.$settings->bbn_icon_field.'"></i>';
    }*/
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module( 'BSFBBNotifications', array(
	'general'       => array( // Tab
        'title'         => __('General', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('General', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'bbn_textarea_field' => array(
                        'type'          => 'textarea',
                        'label'         => __('Message to display', 'fl-builder'),
                        'placeholder'   => __('Message', 'fl-builder'),
                        'rows'          => '5',
                    ),
                    'bbn_closable' => array(
                        'type'          => 'select',
                        'label'         => __('Closable', 'fl-builder'),
                        'options'       => array(
                            'yes'      => __( 'Yes', 'fl-builder' ),
                            'no'      => __( 'No', 'fl-builder' )
                        ),
                        'default'       => 'yes',
                        'help'          => 'Alert will able to close if set to YES',
                    ),
                        'bbn_dropdown_field' => array(
                        'type'          => 'select',
                        'label'         => __('Notification Type', 'fl-builder'),
                        'options'       => array(
                            'alert-success'      => __( 'Success', 'fl-builder' ),
                            'alert-info'      => __( 'Information', 'fl-builder' ),
                            'alert-warning'      => __( 'Warning', 'fl-builder' ),
                            'alert-danger'      => __( 'Danger', 'fl-builder' ),
                            'alert-custom'      => __( 'Custom', 'fl-builder' )
                        ),
                        'default'       => '',
                        'toggle'        => array(
                            'alert-custom'      => array(
                                'fields'        => array( 'bbn_font_color','bbn_background_color','bbn_border_color','bbn_border_size','bbn_border_style','bbn_border_radius' ),
                               //'sections'      => array( 'my_section' ),
                                //'tabs'          => array( 'my_tab' )
                            ),
                            'no'      => array()
                        )
                    ),
                        'bbn_font_color' => array(
                        'type'          => 'color',
                        'label'         => __('Custom Font Color', 'fl-builder'),
                        'preview'       => array(
                            'type'          => 'css',
                            'rules'           => array(
                                array(
                                    'selector'     => '.bb-bootstrap-alerts-common .alert-custom',
                                    'property'     => 'color'
                                ),    
                            )
                        )
                    ),
                        'bbn_background_color' => array(
                        'type'          => 'color',
                        'label'         => __('Custom Background Color', 'fl-builder'),
                        'preview'       => array(
                            'type'          => 'css',
                            'rules'           => array(
                                array(
                                    'selector'     => '.bb-bootstrap-alerts-common .alert-custom',
                                    'property'     => 'background-color'
                                ),    
                            )
                        )
                    ),
                        'bbn_border_color' => array(
                        'type'          => 'color',
                        'label'         => __('Custom Border Color', 'fl-builder'),
                        'preview'       => array(
                            'type'          => 'css',
                            'rules'           => array(
                                array(
                                    'selector'     => '.bb-bootstrap-alerts-common .alert-custom',
                                    'property'     => 'border-color'
                                ),    
                            )
                        )
                    ),
                        'bbn_border_size'     => array(          
                        'type'          => 'text',
                        'label'         => __('Border Size', 'fl-builder'),
                        'maxlength'     => '2',
                        'size'          => '3',
                        'placeholder'   => '1',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                        'help'          => 'In Pixel Only',
                        'preview'         => array(
                            'type'             => 'css',
                            'selector'         => '.bb-bootstrap-alerts-common .alert-custom',
                            'property'         => 'border-width',
                            'unit'             => 'px'
                        )
                    ),  
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
                        'preview'         => array(
                            'type'             => 'css',
                            'selector'         => '.bb-bootstrap-alerts-common .alert-custom',
                            'property'         => 'border-style',
                        )
                    ),
                        'bbn_border_radius'     => array(          
                        'type'          => 'text',
                        'label'         => __('Border Radius', 'fl-builder'),
                        'maxlength'     => '3',
                        'size'          => '4',
                        'placeholder'   => '4',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                        'help'          => 'In Pixel Only',
                        'preview'         => array(
                            'type'             => 'css',
                            'selector'         => '.bb-bootstrap-alerts-common .alert-custom',
                            'property'         => 'border-radius',
                            'unit'             => 'px'
                        )
                    ),

                        
                        
                ),
            
            ),
                'bbn_link'       => array( // Section
                'title'         => __('Link', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields

                    'bbn_dropdown_link' => array(                   // link dropdown
                        'type'          => 'select',
                        'label'         => __('Link', 'fl-builder'),
                        'options'       => array(
                            'no'      => __( 'No', 'fl-builder' ),
                            'yes'      => __( 'Yes', 'fl-builder' )
                        ),
                        'default'       => 'no',
                        'help'          => 'Alert box will able to redirect to the given link',
                        'toggle'        => array(
                            'yes'      => array(
                                'fields'        => array( 'bbn_navigation_link', 'bbn_navigation_target'),
                               //'sections'      => array( 'my_section' ),
                                //'tabs'          => array( 'my_tab' )
                            ),
                            'no'      => array()
                        )
                    ),
                    'bbn_navigation_link' => array(                 // link
                        'type'          => 'link',
                        'label'         => __('Link Address', 'fl-builder'),
                        'placeholder'   => __('http://', 'fl-builder')
                    ),
                        'bbn_navigation_target' => array(
                        'type'          => 'select',
                        'label'         => __('Link Target', 'fl-builder'),
                        'options'       => array(
                            '_self'      => __( 'Same Window', 'fl-builder' ),
                            '_blank'      => __( 'New Window', 'fl-builder' )
                        ),
                        'default'       => 'no',
                    ),

                ),  
            ),
                'bbn_structure'       => array( // Section
                'title'         => __('Structure', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'bbn_text_align'     => array(
                        'type'          => 'select',
                        'label'         => __('Alignment', 'fl-builder'),
                        'default'       => 'left',
                        'options'       => array(
                            'left'      => __( 'Left', 'fl-builder' ),
                            'right'      => __( 'Right', 'fl-builder' ),
                            'center'      => __( 'Center', 'fl-builder' )
                        ),
                        'help'            => "Overall Alignment of the Structure",
                        'preview'         => array(
                            'type'             => 'css',
                            'selector'         => '.bb-bootstrap-alerts-common',
                            'property'         => 'text-align',
                        )
                    ),

                ),  
            ),
                'bbn_padding'       => array( // Section
                'title'         => __('Padding', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'bbn_padding_top'     => array(                     // padding top
                        'type'          => 'text',
                        'label'         => __('Padding Top', 'fl-builder'),
                        'maxlength'     => '3',
                        'size'          => '3',
                        'placeholder'   => '0',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                    ),
                    'bbn_padding_bottom'     => array(               // padding bottom
                        'type'          => 'text',
                        'label'         => __('Padding Bottom', 'fl-builder'),
                        'maxlength'     => '3',
                        'size'          => '3',
                        'placeholder'   => '0',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                    ),
                    'bbn_padding_left'     => array(               // padding left
                        'type'          => 'text',
                        'label'         => __('Padding Left', 'fl-builder'),
                        'maxlength'     => '3',
                        'size'          => '3',
                        'placeholder'   => '0',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                    ),
                    'bbn_padding_right'     => array(               // padding right
                        'type'          => 'text',
                        'label'         => __('Padding Right', 'fl-builder'),
                        'maxlength'     => '3',
                        'size'          => '3',
                        'placeholder'   => '0',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                    ),
                ),  
            )
        ),
    ),
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
                            'bbn_icon_color' => array(
                            'type'          => 'color',
                            'label'         => __('Icon Color (Optional)', 'fl-builder'),
                           /* 'preview'       => array(
                                'type'          => 'css',
                                'rules'           => array(
                                    array(
                                        'selector'     => '.bb-bootstrap-alerts-common i.fa',
                                        'property'     => 'color'
                                    ),    
                                )
                            )*/
                        ),
                            'bbn_icon_align'     => array(
                                'type'          => 'select',
                                'label'         => __('Icon Position', 'fl-builder'),
                                'default'       => 'before',
                                'options'       => array(
                                    'before'      => __( 'Before Text', 'fl-builder' ),
                                    'after'      => __( 'After Text', 'fl-builder' ),
                                ),
                        ), 
                    )
                ) //icon
            ) //section
        ), //icon
    'typography'       => array(
        'title'         => __('Typography', 'fl-builder'),
         'sections'      => array(
            'typography'       => array(
                'title'         => __('Typography', 'fl-builder'),
                'fields'        => array(
                    'bbn_font_field' => array(          // Typography
                            'type'          => 'font',
                            'label'         => __( 'Typography', 'fl-builder' ),
                            'default'       => array(
                                'family'        => 'Defaults',
                                'weight'        => 'Defaults'
                            ),
                            'preview'         => array(
                            'type'             => 'font',
                            'selector'         => '.bb-bootstrap-alerts-common'  
                        )
                    ),
                        'bbn_font_size'     => array(           // Font Size
                        'type'          => 'text',
                        'label'         => __('Font Size', 'fl-builder'),
                        'placeholder'   => '18',
                        'maxlength'     => '3',
                        'size'          => '5',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                    ),
                        'bbn_line_height'     => array(         // Line Height
                        'type'          => 'text',
                        'label'         => __('Line Height', 'fl-builder'),
                        'placeholder'   => '22',
                        'maxlength'     => '3',
                        'size'          => '5',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                    ),
                    )
                ) //icon
            ) //section
        ) //icon
) );