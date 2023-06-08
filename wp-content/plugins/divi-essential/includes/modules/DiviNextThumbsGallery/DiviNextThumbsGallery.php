<?php
include_once(DIVI_ESSENTIAL_PATH.'/includes/modules/base/Common.php');

class Divi_NextThumbsGallery extends ET_Builder_Module {
	public $slug       = 'dnxte_thumbs_gallery_parent';
	public $vb_support = 'on';
	public $child_slug = 'dnxte_thumbs_gallery_child';

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-gallery-slider/',
        'author' => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

	public function init() {
		$this->name = esc_html__( 'Next Gallery Slider', 'et_builder' );
        $this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'dnext_thumbs_gallery_settings' => array(
                        'title' => esc_html__( 'Carousel Settings', 'et_builder'),
                        'sub_toggles'       => array(
                            'sub_toggle_top'   => array(
								'name' => esc_html__( 'Top Gallery', 'et_builder' )
                            ),
                            'sub_toggle_bottom'   => array(
								'name' => esc_html__( 'Bottom Gallery', 'et_builder' )
                            )
                        ),
                        'tabbed_subtoggles' => true,
                    ),
                    'dnext_thumbs_gallery_navigation' => array(
                        'title'          => esc_html__( 'Navigation Settings', 'et_builder'),
                        'sub_toggles'       => array(
                            'sub_toggle_top'   => array(
								'name' => esc_html__( 'Top Gallery', 'et_builder' )
                            ),
                            'sub_toggle_bottom'   => array(
								'name' => esc_html__( 'Bottom Gallery', 'et_builder' )
                            )
                        ),
                        'tabbed_subtoggles' => true,
                    ),
                    'dnext_thumbs_gallery_effect' => esc_html__( 'Effect Settings', 'et_builder'),
                )
            ),
            'advanced' => array(
                'toggles' => array(
                    'dnext_thumbs_gallery_image_box_shadow' => array(
                        'title' => esc_html__( 'Image Box Shadow', 'et_builder')
                    ),
                    'dnext_thumbs_gallery_color_settings' => array(
                        'title' => esc_html__( 'Color Settings', 'et_builder')
                    ),
                    'dnext_thumbs_gallery_arrow_settings' => array(
                        'title' => esc_html__( 'Arrow Settings', 'et_builder'),
                    ),
                )
            )
        );

        $this->custom_css_fields =  array(
            'image'              => array(
                'label'          => esc_html__( 'Image', 'et_builder'),
                'selector'       => '%%order_class%% .img-fluid'
            )
        );
	}

    public function get_advanced_fields_config() {
        return array(
            'background'            => array(
                'settings' => array(
                    'color' => 'alpha',
                ),
                'css'   => array(
                    'main' => "%%order_class%% .swiper-container",
                    'important' => true,
                ),
            ),
            'fonts' => false,
            'text'  => false,
            'borders' => array(
                'default' => array(
                    'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .swiper-container',
							'border_styles' => '%%order_class%% .swiper-container',
                        ),
                        'important' => 'all'
                    ),
                ),
            ),
            'box_shadow' => array(
                'default' => array(),
                'image_box_shadow' => array(
                    'css'          => array(
                        'main' => '%%order_class%% .img-fluid',
                        'important' => 'all'
                    ),
					'label_prefix' => esc_html__( 'Image', 'et_builder' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dnxt_logo_carousel_image_box_shadow',
                )
            ),
            'margin_padding' => array(
                'css' => array(
                    'main' => '%%order_class%% .swiper-container' 
                ),
                'important' => 'all'
            ),
            'max_width'  => false,
        );
    }

	public function get_fields() {
		return array(
			'dnext_thumbs_gallery_autoplay_show_hide' => array(
                'label'           => esc_html__( 'Autoplay', 'et_builder'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                    'off' => esc_html__( 'No', 'et_builder' ),
                ),
                'affects'         => array(
                    'dnext_thumbs_gallery_autoplay_delay',
                ),
                'default'          => 'on',
                'default_on_front' => 'on',
                'toggle_slug'      => 'dnext_thumbs_gallery_settings',
                'sub_toggle'       => 'sub_toggle_top',
            ),
            'dnext_thumbs_gallery_autoplay_delay' => array(
                'label'           => esc_html__('Autoplay Delay', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Adjust the autoplay delay in milliseconds (ms)', 'et_builder' ),                
                'default'         =>'2000',
                'depends_show_if' => 'on',
                'toggle_slug'      => 'dnext_thumbs_gallery_settings',
                'sub_toggle'       => 'sub_toggle_top',
                'show_if'         => array(
                    'dnext_thumbs_gallery_autoplay_show_hide' => 'on'
                )
            ),
            'dnext_thumbs_gallery_loop' => array(
                'label'           => esc_html__( 'Loop', 'et_builder'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                    'off' => esc_html__( 'No', 'et_builder' ),
                ),
                'default'          => 'off',
                'default_on_front' => 'off',
                'toggle_slug'      => 'dnext_thumbs_gallery_settings',
                'sub_toggle'       => 'sub_toggle_top'
            ),
            // bottom gallery
            'dnext_thumbs_gallery_bottom_autoplay_show_hide' => array(
                'label'           => esc_html__( 'Autoplay', 'et_builder'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                    'off' => esc_html__( 'No', 'et_builder' ),
                ),
                'affects'         => array(
                    'dnext_thumbs_gallery_autoplay_delay',
                ),
                'default'          => 'on',
                'default_on_front' => 'on',
                'toggle_slug'      => 'dnext_thumbs_gallery_settings',
                'sub_toggle'       => 'sub_toggle_bottom',
            ),
            'dnext_thumbs_gallery_bottom_autoplay_delay' => array(
                'label'           => esc_html__('Autoplay Delay', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),                
                'default'         =>'2000',
                'depends_show_if' => 'on',
                'toggle_slug'      => 'dnext_thumbs_gallery_settings',
                'sub_toggle'       => 'sub_toggle_bottom'
            ),
            'dnext_thumbs_gallery_bottom_loop' => array(
                'label'           => esc_html__( 'Loop', 'et_builder'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                    'off' => esc_html__( 'No', 'et_builder' ),
                ),
                'default'          => 'off',
                'default_on_front' => 'off',
                'toggle_slug'      => 'dnext_thumbs_gallery_settings',
                'sub_toggle'       => 'sub_toggle_bottom'
            ),
            // bottom settings end
            'dnext_thumbs_gallery_centered_slides' => array(
                'label'           => esc_html__( 'Center Slide', 'et_builder'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                    'off' => esc_html__( 'No', 'et_builder' ),
                ),
                'default'          => 'off',
                'default_on_front' => 'off',
                'toggle_slug'      => 'dnext_thumbs_gallery_settings',
                'sub_toggle'       => 'sub_toggle_top'
            ),
            'dnext_thumbs_gallery_grab' => array(
                'label'           => esc_html__( 'Use Grab Cursor', 'et_builder'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                    'off' => esc_html__( 'No', 'et_builder' ),
                ),
                'default'          => 'off',
                'default_on_front' => 'off',
                'toggle_slug'      => 'dnext_thumbs_gallery_navigation',
                'sub_toggle'       => 'sub_toggle_top'
            ),
            'dnext_thumbs_gallery_speed'   => array(
                'label'           => esc_html__( 'Speed', 'et_builder' ),
                'type'            => 'range',
                'option_category'=> 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 1000,
                ),
                'default'         => '400',
                'fixed_unit'      => '',
                'validate_unit'   => false,
                'unitless'        => true,
                'toggle_slug'      => 'dnext_thumbs_gallery_settings',
                'sub_toggle'       => 'sub_toggle_top'
            ),
            'dnext_thumbs_gallery_spacebetween'   => array(
                'label'           => esc_html__( 'Space Between', 'et_builder' ),
                'type'            => 'range',
                'option_category'=> 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 1000,
                ),
                'default'         => '10',
                'fixed_unit'      => '',
                'validate_unit'   => false,
                'unitless'        => true,
                'toggle_slug'      => 'dnext_thumbs_gallery_settings',
                'sub_toggle'       => 'sub_toggle_top'
            ),
            'dnext_thumbs_gallery_breakpoints_desktop' =>  array(
                'label'           => esc_html__('Slides Per View', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),
                'default'         => '1',
                'default_on_front' => '1',
                'mobile_options'   => true,
				'responsive'       => true,
                'toggle_slug'      => 'dnext_thumbs_gallery_settings',
                'sub_toggle'       => 'sub_toggle_top'
            ),
            // bottom gallery settings
            'dnext_thumbs_gallery_bottom_centered_slides' => array(
                'label'           => esc_html__( 'Center Slide', 'et_builder'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                    'off' => esc_html__( 'No', 'et_builder' ),
                ),
                'default'          => 'off',
                'default_on_front' => 'off',
                'toggle_slug'      => 'dnext_thumbs_gallery_settings',
                'sub_toggle'       => 'sub_toggle_bottom'
            ),
            'dnext_thumbs_gallery_bottom_speed'   => array(
                'label'           => esc_html__( 'Speed', 'et_builder' ),
                'type'            => 'range',
                'option_category'=> 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 1000,
                ),
                'default'         => '400',
                'fixed_unit'      => '',
                'validate_unit'   => false,
                'unitless'        => true,
                'toggle_slug'      => 'dnext_thumbs_gallery_settings',
                'sub_toggle'       => 'sub_toggle_bottom'
            ),
            'dnext_thumbs_gallery_bottom_spacebetween'   => array(
                'label'           => esc_html__( 'Space Between', 'et_builder' ),
                'type'            => 'range',
                'option_category'=> 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 1000,
                ),
                'default'         => '10',
                'fixed_unit'      => '',
                'validate_unit'   => false,
                'unitless'        => true,
                'toggle_slug'      => 'dnext_thumbs_gallery_settings',
                'sub_toggle'       => 'sub_toggle_bottom'
            ),
            'dnext_thumbs_gallery_bottom_breakpoints_desktop' =>  array(
                'label'           => esc_html__('Slides Per View', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),
                'default'         => '4',
                'mobile_options'   => true,
				'responsive'       => true,
                'toggle_slug'      => 'dnext_thumbs_gallery_settings',
                'sub_toggle'       => 'sub_toggle_bottom'
            ),
            'dnext_thumbs_gallery_bottom_grab' => array(
                'label'           => esc_html__( 'Use Grab Cursor', 'et_builder'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                    'off' => esc_html__( 'No', 'et_builder' ),
                ),
                'default'          => 'off',
                'default_on_front' => 'off',
                'toggle_slug'      => 'dnext_thumbs_gallery_navigation',
                'sub_toggle'       => 'sub_toggle_bottom'
            ),
            // bottom gallery settings end
            'dnext_thumbs_gallery_arrows' => array(
                'label'           => esc_html__( 'Use Arrow Navigation', 'et_builder'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                    'off' => esc_html__( 'No', 'et_builder' ),
                ),
                'default'          => 'off',
                'default_on_front' => 'off',
                'toggle_slug'      => 'dnext_thumbs_gallery_navigation',
                'sub_toggle'       => 'sub_toggle_top'
            ),
            'dnext_thumbs_gallery_keyboard_enable' => array(
                'label'           => esc_html__( 'Keyboard Navigation', 'et_builder'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Select on or off of control keyboard navigation.', 'et_builder' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                    'off' => esc_html__( 'No', 'et_builder' ),
                ),
                'default'          => 'on',
                'default_on_front' => 'on',
                'toggle_slug'      => 'dnext_thumbs_gallery_navigation',
                'sub_toggle'       => 'sub_toggle_top'
            ),
            'dnxt_top_gallery_mousewheel' => array(
                'label' => esc_html__('Use Mouse Wheel Navigation', 'et_builder'),
                'type' => 'yes_no_button',
                'description' => esc_html__('Choose enable to change the slide with mouse scroll.', 'et_builder'),
                'options' => array(
                    'on' => esc_html__('Yes', 'et_builder'),
                    'off' => esc_html__('No', 'et_builder'),
                ),
                'default' => 'off',
                'default_on_front' => 'off',
                'toggle_slug'      => 'dnext_thumbs_gallery_navigation',
                'sub_toggle'       => 'sub_toggle_top'
            ),
            'dnext_thumbs_gallery_pagination_type'    => array(
                'label'          => esc_html__('Type', 'et_builder'),
                'type'           => 'select',
                'option_category'=> 'basic_option',
                'options'        => array(
                    'none'       => esc_html__( 'None',  'et_builder' ),
                    'bullets' => esc_html__( 'Bullets',  'et_builder' ),
                    'fraction'   => esc_html__( 'Fraction', 'et_builder' ),
                    'progressbar'   => esc_html__( 'Progress Bar', 'et_builder' ),
                ),
                'default'        => 'bullets',
                'toggle_slug'      => 'dnext_thumbs_gallery_navigation',
                'sub_toggle'       => 'sub_toggle_top'
            ),
            'dnext_thumbs_gallery_pagination_bullets' => array(
                'label'           => esc_html__( 'Dynamic Bullets', 'et_builder'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                    'off' => esc_html__( 'No', 'et_builder' ),
                ),
                'default_on_front' => 'on',
                'toggle_slug'      => 'dnext_thumbs_gallery_navigation',
                'sub_toggle'       => 'sub_toggle_top',
                'show_if'          => array(
                    'dnext_thumbs_gallery_pagination_type' => 'bullets'
                ),
                'show_if_not'          => array(
                    'dnext_thumbs_gallery_pagination_type' => 'none'
                ),
            ),
            // bottom gallery settings start
            'dnext_thumbs_gallery_bottom_keyboard_enable' => array(
                'label'           => esc_html__( 'Keyboard Navigation', 'et_builder'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Select on or off of control keyboard navigation.', 'et_builder' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                    'off' => esc_html__( 'No', 'et_builder' ),
                ),
                'default'          => 'on',
                'default_on_front' => 'on',
                'toggle_slug'      => 'dnext_thumbs_gallery_navigation',
                'sub_toggle'      => 'sub_toggle_bottom'
            ),
            'dnxt_bottom_gallery_mousewheel' => array(
                'label' => esc_html__('Use Mouse Wheel Navigation', 'et_builder'),
                'type' => 'yes_no_button',
                'description' => esc_html__('Choose enable to change the slide with mouse scroll.', 'et_builder'),
                'options' => array(
                    'on' => esc_html__('Yes', 'et_builder'),
                    'off' => esc_html__('No', 'et_builder'),
                ),
                'default' => 'off',
                'default_on_front' => 'off',
                'toggle_slug'      => 'dnext_thumbs_gallery_navigation',
                'sub_toggle'       => 'sub_toggle_bottom'
            ),
            // bottom gallery settins end
            'dnext_thumbs_gallery_arrow_color' => array(
                'label'        => esc_html__( 'Arrow Color', 'et_builder' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
                'default'      => '#0c71c3',
                'tab_slug'     => 'advanced',
                'toggle_slug'  => 'dnext_thumbs_gallery_color_settings',
            ),
            'dnext_thumbs_gallery_arrow_background_color' => array(
                'label'        => esc_html__( 'Arrow Background Color', 'et_builder' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
                'default'      => '#fff',
                'tab_slug'     => 'advanced',
                'toggle_slug'  => 'dnext_thumbs_gallery_color_settings',
            ),
            'dnext_thumbs_gallery_dots_color' => array(
                'label'        => esc_html__( 'Dots Color', 'et_builder' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
                'default'      => '#000',
                'tab_slug'     => 'advanced',
                'toggle_slug'  => 'dnext_thumbs_gallery_color_settings',
                'show_if'      => array(
                    'dnext_thumbs_gallery_pagination_type' => 'bullets'
                )
            ),
            'dnext_thumbs_gallery_dots_active_color' => array(
                'label'        => esc_html__( 'Dots Active Color', 'et_builder' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
                'default'      => '#0c71c3',
                'tab_slug'     => 'advanced',
                'toggle_slug'  => 'dnext_thumbs_gallery_color_settings',
                'show_if'      => array(
                    'dnext_thumbs_gallery_pagination_type' => 'bullets'
                )
            ),
            'dnext_thumbs_gallery_progressbar_fill_color' => array(
                'label'        => esc_html__( 'Progressbar Fill Color', 'et_builder' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
                'default'      => '#0c71c3',
                'tab_slug'     => 'advanced',
                'toggle_slug'  => 'dnext_thumbs_gallery_color_settings',
                'show_if'      => array(
                    'dnext_thumbs_gallery_pagination_type' => 'progressbar'
                )
            ),
            'dnext_thumbs_gallery_shadow_color' => array(
                'label'        => esc_html__( 'Shadow color', 'et_builder' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
                'default'      => '#000',
                'tab_slug'     => 'advanced',
                'toggle_slug'  => 'dnext_thumbs_gallery_color_settings',
            ),
            'dnext_thumbs_gallery_arrow_size'   => array(
                'label'           => esc_html__( 'Font Size', 'et_builder' ),
                'type'            => 'range',
                'option_category'=> 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '40',
                'fixed_unit'      => '',
                'validate_unit'   => false,
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'dnext_thumbs_gallery_arrow_settings'
            ),
            'dnext_thumbs_gallery_arrow_position'   => array(
				'label'           	=> esc_html__( 'Arrow Position', 'et_builder'),
				'type'            	=> 'select',
				'description'     	=> esc_html__( 'Select the types of arrow position', 'et_builder'),                
                'option_category'	=> 'basic_option',
                'tab_slug'        => 'advanced',
				'toggle_slug'    	=> 'dnext_thumbs_gallery_arrow_settings',
				'options'       	=> array(
                    'default'       => esc_html__(	'Default', 'et_builder' ),
					'inner'       => esc_html__(	'Inner', 'et_builder' ),
					'outer'         => esc_html__(	'Outer', 'et_builder' ),

				),
				'default'         => 'default',
            ),
            'dnext_thumbs_gallery_arrow_margin'	=> array(
				'label'           		=> esc_html__('Arrow Margin', 'et_builder'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
                'toggle_slug'     		=> 'margin_padding',
                'show_if'               => array(
                    'dnext_thumbs_gallery_arrows' => 'on'
                )
            ),
            'dnext_thumbs_gallery_arrow_padding'	=> array(
				'label'           		=> esc_html__('Arrow Padding', 'et_builder'),
                'type'            		=> 'custom_padding',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
                'toggle_slug'     		=> 'margin_padding',
                'show_if'               => array(
                    'dnext_thumbs_gallery_arrows' => 'on'
                )
            ),
            'dnext_thumbs_gallery_pause_on_hover' => array(
                'label'           => esc_html__( 'Pause On Hover', 'et_builder'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                    'off' => esc_html__( 'No', 'et_builder' ),
                ),
                'default'          => 'off',
                'default_on_front' => 'off',
                'toggle_slug'      => 'dnext_thumbs_gallery_settings',
                'sub_toggle'       => 'sub_toggle_top'
            ),
            // bottom gallery settings
            'dnext_thumbs_gallery_bottom_pause_on_hover' => array(
                'label'           => esc_html__( 'Pause On Hover', 'et_builder'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),                                                
                'options'               => array(
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                    'off' => esc_html__( 'No', 'et_builder' ),
                ),
                'default'          => 'off',
                'default_on_front' => 'off',
                'toggle_slug'      => 'dnext_thumbs_gallery_settings',
                'sub_toggle'       => 'sub_toggle_bottom'
            ),
		);
	}

	public function render( $attrs, $content, $render_slug ) {
        wp_enqueue_script( 'dnext_swiper_frontend' );
        wp_enqueue_style( 'dnext_swiper-min-css' );
        $content                      = $this->content;
        $dnxt_autplay_show_hide       = "on" === $this->props['dnext_thumbs_gallery_autoplay_show_hide'];
        $dnxt_autoplay_delay          = $this->props['dnext_thumbs_gallery_autoplay_delay'];
        $dnext_thumbs_gallery_loop           = $this->props['dnext_thumbs_gallery_loop'];
        $dnext_thumbs_gallery_speed          = $this->props['dnext_thumbs_gallery_speed'];
        $dnext_thumbs_gallery_keyboard          = $this->props['dnext_thumbs_gallery_keyboard_enable'];
        $dnext_thumbs_gallery_mouse          = $this->props['dnxt_top_gallery_mousewheel'];
        $dnext_thumbs_gallery_slides_perview_desktop = $this->props['dnext_thumbs_gallery_breakpoints_desktop'];
        $dnext_thumbs_gallery_slides_perview_desktop_tablet = $this->props['dnext_thumbs_gallery_breakpoints_desktop_tablet'];
        $dnext_thumbs_gallery_slides_perview_desktop_phone = $this->props['dnext_thumbs_gallery_breakpoints_desktop_phone'];
        $dnext_thumbs_gallery_slides_perview_desktop_last_edited = $this->props['dnext_thumbs_gallery_breakpoints_desktop_last_edited'];
        

        $dnext_thumbs_gallery_direction = "horizontal";
        $dnext_thumbs_gallery_pagination_type = $this->props['dnext_thumbs_gallery_pagination_type'];
        $dnext_thumbs_gallery_pagination_bullets = $dnext_thumbs_gallery_pagination_type === 'bullets' ? $this->props['dnext_thumbs_gallery_pagination_bullets'] : "off";
        $space_between = $this->props['dnext_thumbs_gallery_spacebetween'];
        $grab_cursor = $this->props['dnext_thumbs_gallery_grab'];
        $center_slide = $this->props['dnext_thumbs_gallery_centered_slides'];
        $pause_on_hover = "on" === $this->props['dnext_thumbs_gallery_pause_on_hover']; 
        
        // Bottom settings start
        $dnxt_autplay_bottom_show_hide       = "on" === $this->props['dnext_thumbs_gallery_bottom_autoplay_show_hide'];
        $dnxt_autoplay_bottom_delay          = $this->props['dnext_thumbs_gallery_bottom_autoplay_delay'];
        $dnext_thumbs_gallery_bottom_loop           = $this->props['dnext_thumbs_gallery_bottom_loop'];
        $dnext_thumbs_gallery_bottom_speed          = $this->props['dnext_thumbs_gallery_bottom_speed'];
        $dnext_thumbs_gallery_bottom_keyboard          = $this->props['dnext_thumbs_gallery_bottom_keyboard_enable'];
        $dnext_thumbs_gallery_bottom_mouse          = $this->props['dnxt_bottom_gallery_mousewheel'];
        $dnext_thumbs_gallery_bottom_slides_perview_desktop = $this->props['dnext_thumbs_gallery_bottom_breakpoints_desktop'];
        $dnext_thumbs_gallery_bottom_slides_perview_desktop_tablet = $this->props['dnext_thumbs_gallery_bottom_breakpoints_desktop_tablet'];
        $dnext_thumbs_gallery_bottom_slides_perview_desktop_phone = $this->props['dnext_thumbs_gallery_bottom_breakpoints_desktop_phone'];
        $dnext_thumbs_gallery_bottom_slides_perview_desktop_last_edited = $this->props['dnext_thumbs_gallery_bottom_breakpoints_desktop_last_edited'];
        

        $dnext_thumbs_gallery_bottom_direction = "horizontal";
        
        $space_between_bottom = $this->props['dnext_thumbs_gallery_bottom_spacebetween'];
        $grab_cursor_bottom = $this->props['dnext_thumbs_gallery_bottom_grab'];
        $center_slide_bottom = $this->props['dnext_thumbs_gallery_bottom_centered_slides'];
        $pause_on_hover_bottom = "on" === $this->props['dnext_thumbs_gallery_bottom_pause_on_hover']; 
        // Bottom Settings end

        if ( '' !== $dnext_thumbs_gallery_slides_perview_desktop_tablet || '' !== $dnext_thumbs_gallery_slides_perview_desktop_phone || '' !== $dnext_thumbs_gallery_slides_perview_desktop ) {
			$is_responsive = et_pb_get_responsive_status( $dnext_thumbs_gallery_slides_perview_desktop_last_edited );

			$slide_to_show_values = array(
				'desktop' => $dnext_thumbs_gallery_slides_perview_desktop,
				'tablet'  => $is_responsive ? $dnext_thumbs_gallery_slides_perview_desktop_tablet : '',
				'phone'   => $is_responsive ? $dnext_thumbs_gallery_slides_perview_desktop_phone : '',
			);
		}

        // USE ARROW CLASSES
        $arrowsClass = "";
        if("off" !== $this->props['dnext_thumbs_gallery_arrows']) {
            if($this->props['dnext_thumbs_gallery_arrow_position'] === 'inner'){
                $arrowsClass = sprintf(
                    '<div class="swiper-button-prev dnext_thumbs_gallery_arrows_inner_left" data-icon="4"></div>
                    <div class="swiper-button-next dnext_thumbs_gallery_arrows_inner_right" data-icon="5"></div>'
                ); 
            }else if($this->props['dnext_thumbs_gallery_arrow_position'] === 'outer') {
                $arrowsClass = sprintf(
                    '<div class="swiper-button-prev dnext_thumbs_gallery_arrows_outer_left" data-icon="4"></div>
                    <div class="swiper-button-next dnext_thumbs_gallery_arrows_outer_right" data-icon="5"></div>'
                );
            }else{
                $arrowsClass = sprintf(
                  '<div class="swiper-button-prev dnext_thumbs_gallery_arrows_default_left" data-icon="4"></div>
                  <div class="swiper-button-next dnext_thumbs_gallery_arrows_default_right" data-icon="5"></div>'
              );
            }
        }
        // PAGINATION CLASSES
        $pagination_class = "swiper-pagination ";
        if( $dnext_thumbs_gallery_pagination_type === "bullets" && $dnext_thumbs_gallery_pagination_bullets === "on"){
            $pagination_class .= "swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-bullets-dynamic";
        }else if($dnext_thumbs_gallery_pagination_type === "bullets") {
            $pagination_class .= "swiper-pagination-clickable swiper-pagination-bullets mt-10";
        }else if($dnext_thumbs_gallery_pagination_type === "fraction") {
            $pagination_class .= "swiper-pagination-fraction";
        }else if($dnext_thumbs_gallery_pagination_type === "progressbar") {
            $pagination_class .= "swiper-pagination-progressbar";
        }

        // ARROW COLOR 

       $dnext_thumbs_gallery_arrow_color = $this->props['dnext_thumbs_gallery_arrow_color'];
       $dnext_thumbs_gallery_arrow_background_color = $this->props['dnext_thumbs_gallery_arrow_background_color'];

       $dnext_thumbs_gallery_arrow_color_style = sprintf('color: %1$s !important; background-color: %2$s !important;', esc_attr($dnext_thumbs_gallery_arrow_color), esc_attr($dnext_thumbs_gallery_arrow_background_color));

       ET_Builder_Element::set_style( $render_slug, array(
        'selector'    => "%%order_class%% .swiper-button-prev,%%order_class%% .swiper-button-next",
        'declaration' => $dnext_thumbs_gallery_arrow_color_style,
        ) );

        // ARROW COLOR END

        // DOTS COLOR START

        $dnext_thumbs_gallery_dots_color = $this->props['dnext_thumbs_gallery_dots_color'];
        $dnext_thumbs_gallery_dots_active_color = $this->props['dnext_thumbs_gallery_dots_active_color'];

        $dnext_thumbs_gallery_dots_color_style = sprintf('background-color: %1$s !important;', esc_attr($dnext_thumbs_gallery_dots_color));
        $dnext_thumbs_gallery_dots_active_color_style = sprintf('background-color: %1$s !important;', esc_attr($dnext_thumbs_gallery_dots_active_color));


        ET_Builder_Element::set_style( $render_slug, array(
        'selector'    => "%%order_class%% .swiper-pagination .swiper-pagination-bullet",
        'declaration' => $dnext_thumbs_gallery_dots_color_style,
        ) );
        
        ET_Builder_Element::set_style( $render_slug, array(
        'selector'    => "%%order_class%% .swiper-pagination .swiper-pagination-bullet-active",
        'declaration' => $dnext_thumbs_gallery_dots_active_color_style,
        ) );
        
        // PROGRESSBAR FILL COLOR START
        
        $dnext_thumbs_gallery_progressbar_color = $this->props['dnext_thumbs_gallery_progressbar_fill_color'];
        $dnext_thumbs_gallery_progressbar_color_style = sprintf('background-color: %1$s !important;', esc_attr($dnext_thumbs_gallery_progressbar_color));
        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => "%%order_class%% .swiper-pagination-progressbar .swiper-pagination-progressbar-fill",
            'declaration' => $dnext_thumbs_gallery_progressbar_color_style,
        ) );

        $dnext_thumbs_gallery_arrow_size = (int) $this->props['dnext_thumbs_gallery_arrow_size'];
        $arrow_width = $dnext_thumbs_gallery_arrow_size+10;
        $dnext_thumbs_gallery_arrow_size_style = sprintf('font-size: %1$spx', esc_attr($dnext_thumbs_gallery_arrow_size));
        $dnext_thumbs_gallery_arrow_background_width_height = sprintf('width: %1$spx !important;height:%1$spx !important', esc_attr($arrow_width));

        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => "%%order_class%% .swiper-button-prev:after,%%order_class%% .swiper-button-next:after",
            'declaration' => $dnext_thumbs_gallery_arrow_size_style,
        ) );
        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => "%%order_class%% .swiper-button-prev,%%order_class%% .swiper-button-next",
            'declaration' => $dnext_thumbs_gallery_arrow_background_width_height,
        ) );

        // Bottom settings start
        if ( '' !== $dnext_thumbs_gallery_bottom_slides_perview_desktop_tablet || '' !== $dnext_thumbs_gallery_bottom_slides_perview_desktop_phone || '' !== $dnext_thumbs_gallery_bottom_slides_perview_desktop ) {
			$is_responsive_bottom = et_pb_get_responsive_status( $dnext_thumbs_gallery_bottom_slides_perview_desktop_last_edited );

			$slide_to_show_values_bottom = array(
				'desktop' => $dnext_thumbs_gallery_bottom_slides_perview_desktop,
				'tablet'  => $is_responsive_bottom ? $dnext_thumbs_gallery_bottom_slides_perview_desktop_tablet : '',
				'phone'   => $is_responsive_bottom ? $dnext_thumbs_gallery_bottom_slides_perview_desktop_phone : '',
			);
		}


            $galleryThumbs = sprintf(
                '<div class="swiper-container dnext-thumbs-gallery-bottom swiper-container-initialized swiper-container-horizontal" data-autoplay="%2$s" data-delay="%3$s" data-direction="%9$s" data-speed="%5$s" data-loop="%4$s"  data-breakpoints="%6$s|%7$s|%8$s" data-spacing="%10$s" data-grab="%11$s" data-center="%12$s" data-pauseonhover="%13$s" data-keyboard="%14$s" data-mouse="%15$s">
                    <div class="swiper-wrapper dnext-thumbs-gallery-active">
                        %1$s
                    </div>
                </div>',
                $content,
                esc_attr( $dnxt_autplay_bottom_show_hide ),
                esc_attr( $dnxt_autoplay_bottom_delay ),
                esc_attr( $dnext_thumbs_gallery_bottom_loop ),
                esc_attr( $dnext_thumbs_gallery_bottom_speed ),
                esc_attr( $dnext_thumbs_gallery_bottom_slides_perview_desktop ), // #5
                '' !== $slide_to_show_values_bottom['tablet'] ? esc_attr( $slide_to_show_values_bottom['tablet'] ) : $slide_to_show_values_bottom['desktop'],
                '' !== $slide_to_show_values_bottom['phone'] ? esc_attr( $slide_to_show_values_bottom['phone'] ) : $slide_to_show_values_bottom['desktop'],
                esc_attr( $dnext_thumbs_gallery_bottom_direction ),
                esc_attr( $space_between_bottom ),
                esc_attr( $grab_cursor_bottom ), // #10
                esc_attr( $center_slide_bottom ),
                esc_attr( $pause_on_hover_bottom ),
                esc_attr( $dnext_thumbs_gallery_bottom_keyboard ),
                esc_attr( $dnext_thumbs_gallery_bottom_mouse )
            );


        $galleryTop = sprintf(
            '<div class="swiper-container dnext-thumbs-gallery-top swiper-container-initialized swiper-container-horizontal" data-autoplay="%2$s" data-delay="%3$s" data-direction="%9$s" data-speed="%5$s" data-loop="%4$s" data-pagination-type="%10$s" data-pagination-bullets="%11$s" data-breakpoints="%6$s|%7$s|%8$s" data-spacing="%14$s" data-grab="%15$s" data-center="%16$s" data-pauseonhover="%17$s" data-keyboard="%18$s" data-mouse="%19$s">
                <div class="swiper-wrapper dnext-thumbs-gallery-active">
                    %1$s
                </div>
                <div class="%13$s"></div>
            </div>
            %12$s',
            $content,
            esc_attr( $dnxt_autplay_show_hide ),
            esc_attr( $dnxt_autoplay_delay ),
            esc_attr( $dnext_thumbs_gallery_loop ),
            esc_attr( $dnext_thumbs_gallery_speed ),
            esc_attr($dnext_thumbs_gallery_slides_perview_desktop), // #5
            '' !== $slide_to_show_values['tablet'] ? esc_attr( $slide_to_show_values['tablet'] ) : 1,
			'' !== $slide_to_show_values['phone'] ? esc_attr( $slide_to_show_values['phone'] ) : '1',
            esc_attr( $dnext_thumbs_gallery_direction ),
            esc_attr( $dnext_thumbs_gallery_pagination_type ),
            esc_attr( $dnext_thumbs_gallery_pagination_bullets ), // #10
            $arrowsClass,
            $pagination_class,
            esc_attr( $space_between ),
            esc_attr( $grab_cursor ),
            esc_attr( $center_slide ), // #15
            esc_attr( $pause_on_hover ),
            esc_attr( $dnext_thumbs_gallery_keyboard ),
            esc_attr( $dnext_thumbs_gallery_mouse )
        );

        $output = sprintf('<div class="dnext_thumbs_gallery_top_holder">%1$s</div> %2$s ',$galleryTop,$galleryThumbs );

        $this->apply_css($render_slug);
		return $this->_render_module_wrapper($output, $render_slug);
    }

    public function apply_css($render_slug){

        /**
         * Custom Padding Margin Output
         *
        */
        Common::dnxt_set_style($render_slug, $this->props, "dnext_thumbs_gallery_arrow_margin", "%%order_class%% .swiper-button-next,%%order_class%% .swiper-button-prev", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "dnext_thumbs_gallery_arrow_padding", "%%order_class%% .swiper-button-next, %%order_class%% .swiper-button-prev", "padding");
}

}

new Divi_NextThumbsGallery;
