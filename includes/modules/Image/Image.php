<?php

class MOGD_Image extends ET_Builder_Module {

	public $slug       					= 'mogd_image';
	public $vb_support 					= 'on';

	public $type 						= 'child';
	public $child_title_var 			= "image_text";
	public $child_title_fallback_var 	= "image_upload";

	protected $module_credits = array(
		'module_uri'	=> '',
		'author'		=> 'Cédric Chevillard',
		'author_uri'	=> 'https://www.cedricchevillard.fr/',
	);

	public function init() {
		$this->name				= esc_html__( 'Modern Gallery Divi', 'mogd-modern-gallery-divi' );
		$this->main_css_element	= '%%order_class%%.mogd_gallery_image';

		$this->settings_modal_toggles = array(
			'general'	=> array(
				'toggles'	=> array(
					'image'		=> esc_html__( 'image', 'mogd-modern-gallery-divi' ),
				),
			),
			'advanced'	=> array(
				'toggles'	=> array(
					'fonts'		=> esc_html__( 'Fonts', 'mogd-modern-gallery-divi' ),
					'overlay'	=> esc_html__( 'Overlay', 'mogd-modern-gallery-divi' ),
				),
			),
		);

	}

	// Masquer certaines options advanced
	public function get_advanced_fields_config(){

		$advanced_fields					= [];
		$advanced_fields['link_options']	= false;
		$advanced_fields['text']			= false;
		$advanced_fields['text_shadow'] 	= false;
		$advanced_fields['fonts'] 			= false;

		$advanced_fields['fonts'] = array(
			'text'	=> array(
				'label'				=> esc_html__( 'Text', 'mogd-modern-gallery-divi' ),
				'hide_text_shadow'	=> true,
				'depends_show_if'	=> 'on',
				'depends_on'	=> array(
					'parentModule:show_text',
				),
				'css'				=> array(
					'main'	=> "{$this->main_css_element} .mogd_gallery_text",
				),
				'tab_slug'			=> 'advanced',
				'toggle_slug'		=> 'fonts',
			),
		);

		return $advanced_fields;

	}

	public function get_fields() {
		
		$fields = [];

		$fields['image_upload'] = array(
			'label'					=> esc_html__( 'Image', 'mogd-modern-gallery-divi' ),
			'description'			=> esc_html__( 'Select entered here will appear inside the module.', 'mogd-modern-gallery-divi' ),
			'type'					=> 'upload',
			'upload_button_text'	=> 'Bouton upload',
			'choose_text'			=> 'Choisir son image',
			'update_text'			=> 'Mettre à jour son image',
			'data_type'				=> 'image',
			'option_category'		=> 'basic_option',
			'toggle_slug'			=> 'image',
		);

		$fields['image_text'] = array(
			'label'				=> esc_html__( 'Text', 'mogd-modern-gallery-divi' ),
			'description'		=> esc_html__( 'text entered here will appear inside the module.', 'mogd-modern-gallery-divi' ),
			'type'				=> 'text',
			'hover'				=> 'tabs',
			'option_category'	=> 'basic_option',
			'toggle_slug'		=> 'image',
		);

		$fields['url'] = array(
			'label'				=> esc_html__( 'Title Link URL', 'mogd-modern-gallery-divi' ),
			'description'		=> esc_html__( 'If you would like to make your blurb a link, input your destination URL here.', 'mogd-modern-gallery-divi' ),
			'type'				=> 'text',
			'dynamic_content'	=> 'url',
			'show_if'			=> [
				'parentModule:mode'	=> 'link'
			],
			'option_category'	=> 'basic_option',
			'toggle_slug'		=> 'image',
		);

		$fields['url_new_window'] = array(
			'label'				=> esc_html__( 'Title Link Target', 'mogd-modern-gallery-divi' ),
			'description'		=> esc_html__( 'Here you can choose whether or not your link opens in a new window', 'mogd-modern-gallery-divi' ),
			'type'				=> 'yes_no_button',
			'options'			=> array(
				'on'	=> esc_html__( 'In The New Tab', 'mogd-modern-gallery-divi' ),
				'off'	=> esc_html__( 'In The Same Window', 'mogd-modern-gallery-divi' ),
			),
			'default'			=> 'off',
			'show_if'			=> [
				'parentModule:mode'	=> 'link'
			],
			'option_category'	=> 'basic_option',
			'toggle_slug'		=> 'image',
		);
		
		/*
		Next step : Overlay specific for one image
		$fields['overlay_hover_color'] = array(
			'label'				=> esc_html__( 'Overlay Background Color', 'mogd-modern-gallery-divi' ),
			'description'		=> esc_html__( 'Here you can define a custom color for the overlay', 'mogd-modern-gallery-divi' ),
			'type'				=> 'color-alpha',
			'custom_color'		=> true,
			'tab_slug'			=> 'advanced',
			'toggle_slug'		=> 'overlay'
		);

		$fields['overlay_icon'] = array(
			'label'				=> esc_html__( 'Overlay Icon Color', 'mogd-modern-gallery-divi' ),
			'description'		=> esc_html__( 'Here you can define a custom color for the zoom icon.', 'mogd-modern-gallery-divi' ),
			'type'				=> 'color-alpha',
			'custom_color'		=> true,
			'show_if'			=> [
				'parentModule:show_icon'	=> 'on'
			],
			'option_category'	=> 'basic_option',
			'tab_slug'			=> 'advanced',
			'toggle_slug'		=> 'overlay',
		);

		$fields['overlay_hover_icon'] = array(
			'label'				=> esc_html__( 'Overlay Icon', 'mogd-modern-gallery-divi' ),
			'description'		=> esc_html__( 'Here you can define a custom icon for the overlay', 'mogd-modern-gallery-divi' ),
			'type' 				=> 'select_icon',
			'class'				=> array( 'et-pb-font-icon' ),
			'show_if'			=> [
				'parentModule:show_icon'	=> 'on'
			],
			'option_category'	=> 'basic_option',
			'tab_slug'			=> 'advanced',
			'toggle_slug'		=> 'overlay',
		);
		*/

		return $fields;
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new MOGD_Image;
