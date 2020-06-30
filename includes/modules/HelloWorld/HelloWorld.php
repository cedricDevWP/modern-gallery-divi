<?php

class MOGD_HelloWorld extends ET_Builder_Module {

	public $slug       = 'mogd_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => '',
		'author'     => 'https://www.cedricchevillard.fr/',
		'author_uri' => 'https://www.cedricchevillard.fr/',
	);

	public function init() {
		$this->name = esc_html__( 'Hello World', 'mogd-modern-gallery-divi' );
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'mogd-modern-gallery-divi' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'mogd-modern-gallery-divi' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new MOGD_HelloWorld;
