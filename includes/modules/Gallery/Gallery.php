<?php

class MOGD_Gallery extends ET_Builder_Module {

	public $slug       = 'mogd_gallery';
	public $vb_support = 'on';
	public $child_slug = 'mogd_image';

	protected $module_credits = array(
		'module_uri' => '',
		'author'     => 'Cédric Chevillard',
		'author_uri' => 'https://www.cedricchevillard.fr/',
	);

	public function init() {
		$this->name = esc_html__( 'Modern Gallery Divi', 'mogd-modern-gallery-divi' );
		$this->main_css_element = '%%order_class%%.mogd_gallery';

		$this->settings_modal_toggles = array(
			'general'	=> array(
				'toggles'	=> array(
					'gallery'	=> esc_html__( 'Gallery', 'mogd-modern-gallery-divi' ),
				),
			),
			'advanced'	=> array(
				'toggles'	=> array(
					'layout'	=> esc_html__( 'Layout', 'mogd-modern-gallery-divi' ),
					'fonts'		=> esc_html__( 'Text', 'mogd-modern-gallery-divi' ),
					'overlay'	=> esc_html__( 'Overlay', 'mogd-modern-gallery-divi' ),
					'image'		=> esc_html__( 'Image', 'mogd-modern-gallery-divi' )
				),
			),
		);

	}

	// Masquer certaines options advanced
	public function get_advanced_fields_config(){

		$advanced_fields 					= [];

		$advanced_fields['link_options'] 	= false;
		$advanced_fields['text'] 			= false;
		$advanced_fields['text_shadow'] 	= false;
		$advanced_fields['fonts'] 			= false;

		$advanced_fields['fonts'] = array(
			'text'	=> array(
				'label'				=> esc_html__( 'Text', 'mogd-modern-gallery-divi' ),
				'hide_text_shadow'	=> true,
				'depends_show_if'	=> 'on',
				'depends_on'		=> array(
					'show_text',
				),
				'css'				=> array(
					'main'	=> "{$this->main_css_element} .mogd_gallery_text",
				),
				'tab_slug'			=> 'advanced',
				'toggle_slug'		=> 'fonts',
			),
		);

		$advanced_fields['borders'] = array(
			'default'	=> array(
				'css'	=> array(
					'main'	=> array(
						'border_radii'	=> "{$this->main_css_element}",
						'border_styles'	=> "{$this->main_css_element}",
					),
				),
			),
			'image'	=> array(
				'label_prefix'		=> esc_html__( 'Image', 'mogd-modern-gallery-divi' ),
				'css'				=> array(
					'main'	=> array(
						'border_radii'	=> "{$this->main_css_element} .mogd_gallery_image",
						'border_styles'	=> "{$this->main_css_element} .mogd_gallery_image",
					)
				),
				'option_category'	=> 'basic_option',
				'tab_slug'			=> 'advanced',
				'toggle_slug'		=> 'image',
			),
		);

		$advanced_fields['box_shadow'] = array(
			'default'	=> array(
				'css'	=> array(
					'main'	=> "{$this->main_css_element}",
				),
			),
			'image'		=> array(
				'label'				=> esc_html__( 'Image Box Shadow', 'mogd-modern-gallery-divi' ),
				'css'				=> array(
					'main'		=> "{$this->main_css_element} .mogd_gallery_image",
					'overlay'	=> 'inset',
				),
				'default_on_fronts'	=> array(
					'color'		=> '',
					'position'	=> '',
				),
				'option_category'	=> 'basic_option',
				'tab_slug'			=> 'advanced',
				'toggle_slug'		=> 'image',
			),
		);

		return $advanced_fields;

	}

	public function get_fields() {
		
		$fields = [];

		$fields['order_by'] = array(
			'label'				=> esc_html__( 'Image Order', 'mogd-modern-gallery-divi' ),
			'description'		=> esc_html__( 'Select an ordering method for the gallery. This controls which gallery items appear first in the list.', 'mogd-modern-gallery-divi' ),
			'type'				=> 'select',
			'radio'				=> true,
			'options'			=> array(
				''		=> esc_html__( 'Default', 'mogd-modern-gallery-divi' ),
				'rand'	=> esc_html__( 'Random', 'mogd-modern-gallery-divi' ),
			),
			'default'			=> '',
			'option_category'	=> 'basic_option',
			'toggle_slug'		=> 'gallery',
		);

		$fields['mode'] = array(
			'label'				=> esc_html__( 'Mode', 'mogd-modern-gallery-divi' ),
			'description'		=> esc_html__( '', 'mogd-modern-gallery-divi' ),
			'type'				=> 'select',
			'radio'				=> true,
			'options'			=> array(
				'slider'	=> esc_html__( 'slider', 'mogd-modern-gallery-divi' ),
				'link' 		=> esc_html__( 'link', 'mogd-modern-gallery-divi' ),
			),
			'default'			=> 'slider',
			'option_category'	=> 'basic_option',
			'toggle_slug'		=> 'gallery',
		);

		$fields['show_text'] = array(
			'label'			=> esc_html__( 'Show Text', 'mogd-modern-gallery-divi' ),
			'type'			=> 'yes_no_button',
			'options'		=> array(
				'on'	=> esc_html__( 'Yes', 'mogd-modern-gallery-divi' ),
				'off'	=> esc_html__( 'No', 'mogd-modern-gallery-divi' ),
			),
			'affects'		=> array(
				'fonts_font',
				'fonts_text_align',
				'fonts_text_color',
				'fonts_font_size',
				'fonts_letter_spacing',
				'fonts_line_height',
				'fonts_text_shadow_style',
				'fonts_text_shadow_horizontal_length',
				'fonts_text_shadow_vertical_length',
				'fonts_text_shadow_blur_strength',
				'fonts_text_shadow_color'
			),
			'default'		=> 'on',
			'toggle_slug'	=> 'gallery',
		);

		$fields['show_icon'] = array(
			'label'				=> esc_html__( 'Show Icon', 'mogd-modern-gallery-divi' ),
			'description'		=> esc_html__( 'Whether or not to show the title and caption for images (if available).', 'mogd-modern-gallery-divi' ),
			'type'				=> 'yes_no_button',
			'options'			=> array(
				'on'	=> esc_html__( 'Yes', 'mogd-modern-gallery-divi' ),
				'off'	=> esc_html__( 'No', 'mogd-modern-gallery-divi' ),
			),
			'default_on_front'	=> 'on',
			'mobile_options'	=> true,
			'option_category'	=> 'basic_option',
			'toggle_slug'		=> 'gallery',
		);

		$fields['order_by_'] = array(
			'label'				=> esc_html__( 'Image Order', 'mogd-modern-gallery-divi' ),
			'description'		=> esc_html__( 'Select an ordering method for the gallery. This controls which gallery items appear first in the list.', 'mogd-modern-gallery-divi' ),
			'type'				=> 'select',
			'radio'				=> true,
			'options'			=> array(
				''		=> esc_html__( 'Default', 'mogd-modern-gallery-divi' ),
				'rand'	=> esc_html__( 'Random', 'mogd-modern-gallery-divi' ),
			),
			'default'			=> '',
			'option_category'	=> 'basic_option',
			'toggle_slug'		=> 'layout',
			'tab_slug'			=> 'advanced'
		);

		$fields['hover_overlay_background_color'] = array(
			'label'				=> esc_html__( 'Overlay Background Color', 'mogd-modern-gallery-divi' ),
			'description'		=> esc_html__( 'Here you can define a custom color for the overlay', 'mogd-modern-gallery-divi' ),
			'type'				=> 'color-alpha',
			'custom_color'		=> true,
			'tab_slug'			=> 'advanced',
			'toggle_slug'		=> 'overlay',
			'mobile_options'	=> true,
		);

		$fields['hover_overlay_icon_color'] = array(
			'label'				=> esc_html__( 'Overlay Icon Color', 'mogd-modern-gallery-divi' ),
			'description'		=> esc_html__( 'Here you can define a custom color for the zoom icon.', 'mogd-modern-gallery-divi' ),
			'type'				=> 'color-alpha',
			'custom_color'		=> true,
			'show_if'			=> [
				'show_icon'	=> 'on'
			],
			'option_category'	=> 'basic_option',
			'tab_slug'			=> 'advanced',
			'toggle_slug'		=> 'overlay',
			'mobile_options'	=> true,
		);

		$fields['hover_overlay_icon'] = array(
			'label'				=> esc_html__( 'Overlay Icon', 'mogd-modern-gallery-divi' ),
			'description'		=> esc_html__( 'Here you can define a custom icon for the overlay', 'mogd-modern-gallery-divi' ),
			'type'				=> 'select_icon',
			'class'				=> array( 'et-pb-font-icon' ),
			'show_if'			=> [
				'show_icon'	=> 'on'
			],
			'option_category'	=> 'basic_option',
			'tab_slug'			=> 'advanced',
			'toggle_slug'		=> 'overlay',
			'mobile_options'	=> true,
		);
		
		return $fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new MOGD_Gallery;
