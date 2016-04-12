<?php
  if ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) { require_once  __DIR__ . '/CMB2/init.php'; }
  add_action( 'cmb2_admin_init', 'dd_metaboxes' );

  function dd_metaboxes() {
    // Start with an underscore to hide fields from custom fields list
    $prefix = '_cmb_';

    $cmb_homehero = new_cmb2_box( array(
      'id'            => 'homehero_metabox',
      'title'         => __( 'Hero', 'cmb2' ),
      'object_types'  => array( 'page'), // Post type
      'show_on'      => array( 'key' => 'page-template', 'value' => 'tmpl-home.php' ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true, // Show field names on the left
      // 'cmb_styles' => false, // false to disable the CMB stylesheet
      'closed'     => false, // Keep the metabox closed by default
    ) );

   $homegroup_slider_id = $cmb_homehero->add_field( array(
      'id'          => 'homepage_hero',
      'type'        => 'group',
      'description' => __( 'Slider', 'cmb2' ),
      'options'     => array(
          'group_title'   => __( 'Slide {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
          'add_button'    => __( 'Új slide hozzáadása', 'cmb2' ),
          'remove_button' => __( 'Slide törlése', 'cmb2' ),
          'sortable'      => true, // beta
      ),
    ) );
    $cmb_homehero->add_group_field( $homegroup_slider_id, array(
      'id' => 'si_title',
      'name' => 'Slide title',
      'type' => 'text',
    ) );
    $cmb_homehero->add_group_field( $homegroup_slider_id, array(
        'name'    => 'Image',
        'id'      => 'si_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
    ) );
    $cmb_homehero->add_group_field( $homegroup_slider_id, array(
      'id' => 'si_btntext',
      'name' => 'Button text',
      'type' => 'text',
    ) );
    $cmb_homehero->add_group_field( $homegroup_slider_id, array(
      'id' => 'si_btnurl',
      'name' => 'Target url',
      'type' => 'text_url',
    ) );


    $cmb_homepage = new_cmb2_box( array(
      'id'            => 'homecontent_metabox',
      'title'         => __( 'Hompage elements', 'cmb2' ),
      'object_types'  => array( 'page'), // Post type
      'show_on'      => array( 'key' => 'page-template', 'value' => 'tmpl-home.php' ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true, // Show field names on the left
      // 'cmb_styles' => false, // false to disable the CMB stylesheet
      'closed'     => false, // Keep the metabox closed by default
    ) );

    $cmb_homepage->add_field( array(
        'name' => 'Gallery',
        'id'   => 'home_gallery',
        'type' => 'file_list',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
    ) );



}
