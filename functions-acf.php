<?php

namespace DD8;

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5a0b66b98147e',
	'title' => 'Blocs',
	'fields' => array(
		array(
			'key' => 'field_5a0b66ebe8230',
			'label' => 'Blocs',
			'name' => 'blocs',
			'type' => 'flexible_content',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layouts' => array(
				'5a0b689664bbe' => array(
					'key' => '5a0b689664bbe',
					'name' => 'actualites',
					'label' => 'Actualités',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5a0b7a0ec3eca',
							'label' => 'Titre',
							'name' => 'titre',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
				'5a0b68b164bbf' => array(
					'key' => '5a0b68b164bbf',
					'name' => 'appel_a_action',
					'label' => 'Appel à action',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5a0b7a15c3ecb',
							'label' => 'Titre',
							'name' => 'titre',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5a0b7ef7284ad',
							'label' => 'Phrase',
							'name' => 'phrase',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5a0b7efd284ae',
							'label' => 'Lien',
							'name' => 'lien',
							'type' => 'link',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
						),
					),
					'min' => '',
					'max' => '',
				),
				'5a0b66f2c9a6f' => array(
					'key' => '5a0b66f2c9a6f',
					'name' => 'newsletter',
					'label' => 'Newsletter',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5a0b7a1cc3ecc',
							'label' => 'Titre',
							'name' => 'titre',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
				'5a0b674ee8233' => array(
					'key' => '5a0b674ee8233',
					'name' => 'encart_accueil',
					'label' => 'Encart accueil',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5a0b6cef412fa',
							'label' => 'Visuel',
							'name' => '',
							'type' => 'tab',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'placement' => 'top',
							'endpoint' => 0,
						),
						array(
							'key' => 'field_5a0b6d19412fc',
							'label' => 'Image',
							'name' => 'image',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
							'preview_size' => 'thumbnail',
							'library' => 'all',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
						),
						array(
							'key' => 'field_5a0b6d29412fd',
							'label' => 'Titre',
							'name' => 'titre',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5a0b6d53412fe',
							'label' => 'Baseline',
							'name' => 'baseline',
							'type' => 'textarea',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'maxlength' => '',
							'rows' => 2,
							'new_lines' => '',
						),
						array(
							'key' => 'field_5a0b6d6a412ff',
							'label' => 'Emphase',
							'name' => 'emphase',
							'type' => 'textarea',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'maxlength' => '',
							'rows' => 2,
							'new_lines' => '',
						),
						array(
							'key' => 'field_5a0b6d04412fb',
							'label' => 'Compteurs',
							'name' => '',
							'type' => 'tab',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'placement' => 'top',
							'endpoint' => 0,
						),
						array(
							'key' => 'field_5a0b6d8d41300',
							'label' => 'Compteurs',
							'name' => 'compteurs',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => '',
							'min' => 0,
							'max' => 0,
							'layout' => 'block',
							'button_label' => 'Ajouter un compteur',
							'sub_fields' => array(
								array(
									'key' => 'field_5a0b6dbe41301',
									'label' => 'Nombre',
									'name' => 'nombre',
									'type' => 'number',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '50',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'min' => '',
									'max' => '',
									'step' => '',
								),
								array(
									'key' => 'field_5a0b6ddc41302',
									'label' => 'Description',
									'name' => 'description',
									'type' => 'textarea',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '50',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'maxlength' => '',
									'rows' => 2,
									'new_lines' => '',
								),
							),
						),
					),
					'min' => '',
					'max' => '',
				),
				'5a0b688e64bbd' => array(
					'key' => '5a0b688e64bbd',
					'name' => 'services',
					'label' => 'Services',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5a0b7a22c3ecd',
							'label' => 'Titre',
							'name' => 'titre',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5a0c558cb1cc9',
							'label' => 'Services',
							'name' => 'services',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => '',
							'min' => 0,
							'max' => 0,
							'layout' => 'block',
							'button_label' => 'Ajouter un service',
							'sub_fields' => array(
								array(
									'key' => 'field_5a0c55a2b1cca',
									'label' => 'Titre',
									'name' => 'titre',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '80',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'maxlength' => '',
								),
								array(
									'key' => 'field_5a0c55b0b1ccb',
									'label' => 'Icone',
									'name' => 'icone',
									'type' => 'image',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '20',
										'class' => '',
										'id' => '',
									),
									'return_format' => 'array',
									'preview_size' => 'thumbnail',
									'library' => 'all',
									'min_width' => '',
									'min_height' => '',
									'min_size' => '',
									'max_width' => '',
									'max_height' => '',
									'max_size' => '',
									'mime_types' => '',
								),
								array(
									'key' => 'field_5a0c55bcb1ccc',
									'label' => 'Description',
									'name' => 'description',
									'type' => 'textarea',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'maxlength' => '',
									'rows' => 4,
									'new_lines' => '',
								),
							),
						),
					),
					'min' => '',
					'max' => '',
				),
				'5a0b6746e8232' => array(
					'key' => '5a0b6746e8232',
					'name' => 'testimoniaux',
					'label' => 'Testimoniaux',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5a0b7a2cc3ece',
							'label' => 'Titre',
							'name' => 'titre',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5a0c63c279cab',
							'label' => 'Témoignages',
							'name' => 'temoignages',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => '',
							'min' => 0,
							'max' => 0,
							'layout' => 'block',
							'button_label' => 'Ajouter un témoignage',
							'sub_fields' => array(
								array(
									'key' => 'field_5a0c63d479cac',
									'label' => 'Nom',
									'name' => 'nom',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '50',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'maxlength' => '',
								),
								array(
									'key' => 'field_5a0c63ff79cad',
									'label' => 'Rôle',
									'name' => 'role',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '50',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'maxlength' => '',
								),
								array(
									'key' => 'field_5a0c640c79cae',
									'label' => 'Texte',
									'name' => 'texte',
									'type' => 'textarea',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '60',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'maxlength' => '',
									'rows' => 6,
									'new_lines' => '',
								),
								array(
									'key' => 'field_5a0c656239601',
									'label' => 'Photo',
									'name' => 'photo',
									'type' => 'image',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '40',
										'class' => '',
										'id' => '',
									),
									'return_format' => 'array',
									'preview_size' => 'thumbnail',
									'library' => 'all',
									'min_width' => '',
									'min_height' => '',
									'min_size' => '',
									'max_width' => '',
									'max_height' => '',
									'max_size' => '',
									'mime_types' => '',
								),
							),
						),
					),
					'min' => '',
					'max' => '',
				),
				'5a1c23bb02a9c' => array(
					'key' => '5a1c23bb02a9c',
					'name' => 'texte',
					'label' => 'Texte simple',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5a1c23bb02a9d',
							'label' => 'Texte',
							'name' => 'texte',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
							'delay' => 0,
						),
					),
					'min' => '',
					'max' => '',
				),
			),
			'button_label' => 'Ajouter un bloc',
			'min' => '',
			'max' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
	),
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5a212cdda155c',
	'title' => 'Blocs articles',
	'fields' => array(
		array(
			'key' => 'field_5a212cdda61fb',
			'label' => 'Blocs',
			'name' => 'blocs',
			'type' => 'flexible_content',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layouts' => array(
				'5a0b689664bbe' => array(
					'key' => '5a0b689664bbe',
					'name' => 'actualites',
					'label' => 'Actualités',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5a212cdda7f7e',
							'label' => 'Titre',
							'name' => 'titre',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
				'5a0b68b164bbf' => array(
					'key' => '5a0b68b164bbf',
					'name' => 'appel_a_action',
					'label' => 'Appel à action',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5a212cdda7fc6',
							'label' => 'Titre',
							'name' => 'titre',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5a212cdda800a',
							'label' => 'Phrase',
							'name' => 'phrase',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5a212cdda804d',
							'label' => 'Lien',
							'name' => 'lien',
							'type' => 'link',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
						),
					),
					'min' => '',
					'max' => '',
				),
				'5a0b66f2c9a6f' => array(
					'key' => '5a0b66f2c9a6f',
					'name' => 'newsletter',
					'label' => 'Newsletter',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5a212cdda8090',
							'label' => 'Titre',
							'name' => 'titre',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
				'5a0b688e64bbd' => array(
					'key' => '5a0b688e64bbd',
					'name' => 'services',
					'label' => 'Services',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5a212cdda84c7',
							'label' => 'Titre',
							'name' => 'titre',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5a212cdda8575',
							'label' => 'Services',
							'name' => 'services',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => '',
							'min' => 0,
							'max' => 0,
							'layout' => 'block',
							'button_label' => 'Ajouter un service',
							'sub_fields' => array(
								array(
									'key' => 'field_5a212cddc21c8',
									'label' => 'Titre',
									'name' => 'titre',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '80',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'maxlength' => '',
								),
								array(
									'key' => 'field_5a212cddc220f',
									'label' => 'Icone',
									'name' => 'icone',
									'type' => 'image',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '20',
										'class' => '',
										'id' => '',
									),
									'return_format' => 'array',
									'preview_size' => 'thumbnail',
									'library' => 'all',
									'min_width' => '',
									'min_height' => '',
									'min_size' => '',
									'max_width' => '',
									'max_height' => '',
									'max_size' => '',
									'mime_types' => '',
								),
								array(
									'key' => 'field_5a212cddc2253',
									'label' => 'Description',
									'name' => 'description',
									'type' => 'textarea',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'maxlength' => '',
									'rows' => 4,
									'new_lines' => '',
								),
							),
						),
					),
					'min' => '',
					'max' => '',
				),
				'5a0b6746e8232' => array(
					'key' => '5a0b6746e8232',
					'name' => 'testimoniaux',
					'label' => 'Testimoniaux',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5a212cdda85f3',
							'label' => 'Titre',
							'name' => 'titre',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5a212cdda869f',
							'label' => 'Témoignages',
							'name' => 'temoignages',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => '',
							'min' => 0,
							'max' => 0,
							'layout' => 'block',
							'button_label' => 'Ajouter un témoignage',
							'sub_fields' => array(
								array(
									'key' => 'field_5a212cddc9f5b',
									'label' => 'Nom',
									'name' => 'nom',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '50',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'maxlength' => '',
								),
								array(
									'key' => 'field_5a212cddca00a',
									'label' => 'Rôle',
									'name' => 'role',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '50',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'maxlength' => '',
								),
								array(
									'key' => 'field_5a212cddca088',
									'label' => 'Texte',
									'name' => 'texte',
									'type' => 'textarea',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '60',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'maxlength' => '',
									'rows' => 6,
									'new_lines' => '',
								),
								array(
									'key' => 'field_5a212cddca144',
									'label' => 'Photo',
									'name' => 'photo',
									'type' => 'image',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '40',
										'class' => '',
										'id' => '',
									),
									'return_format' => 'array',
									'preview_size' => 'thumbnail',
									'library' => 'all',
									'min_width' => '',
									'min_height' => '',
									'min_size' => '',
									'max_width' => '',
									'max_height' => '',
									'max_size' => '',
									'mime_types' => '',
								),
							),
						),
					),
					'min' => '',
					'max' => '',
				),
				'5a1c23bb02a9c' => array(
					'key' => '5a1c23bb02a9c',
					'name' => 'texte',
					'label' => 'Texte simple',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5a212cdda874c',
							'label' => 'Texte',
							'name' => 'texte',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
							'delay' => 0,
						),
					),
					'min' => '',
					'max' => '',
				),
			),
			'button_label' => 'Ajouter un bloc',
			'min' => '',
			'max' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;