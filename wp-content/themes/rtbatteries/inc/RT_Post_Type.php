<?php
/**
 * Custom post types and taxonomies
 */

class RT_Post_Type
{
	public string $name;
	public string $icon;
	public string $position;
	public array $labels;
	public array $args;

	public function __construct(array $post_type) {
		$this->init($post_type);
	}

	public function init($post_type) {
		$this->set_name($post_type);
		$this->set_icon($post_type);
		$this->set_position($post_type);
		$this->set_labels();

		add_action( 'init', [$this, 'register'], 0 );
	}

	public function set_name($post_type) {
		$this->name = $post_type['name'];
	}

	public function set_icon($post_type) {
		$this->icon =  isset($post_type['icon']) ? $post_type['icon'] : 'dashicons-portfolio';
	}

	public function set_position($post_type) {
		$this->position = isset($post_type['position']) ? $post_type['position'] : '21';
	}

	public function set_labels() {
		$name = $this->name;

		$this->labels = [
			'name'              => $name,
			'singular_name'     => $name,
			'add_new'           => $name,
			'add_new_item'      => 'Add new '. $name,
			'edit_item'         => 'Edit ' . $name,
			'new_item'          => 'New ' . $name,
			'all_items'         => 'All ' . $name,
			'view_item'         => 'View ' . $name,
			'search_items'      => 'Search ' . $name,
			'not_found'         => 'not found.',
			'not_found_in_trash' => 'not found.',
			'menu_name'         => $name . 's'
		];
	}

	public function get_args() {
		return [
			'labels'        => $this->labels,
			'public'        => true,
			'show_ui'       => true,
			'show_in_rest'  => true,
			'has_archive'   => true,
			'hierarchical'  => true,
			'menu_icon'     => $this->icon,
			'menu_position' => $this->position,
			'supports'      => [ 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats', 'revisions'],
		];
	}

	public function register() {
		register_post_type( $this->name, $this->get_args() );
	}
}