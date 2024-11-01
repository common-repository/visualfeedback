<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://visualfeedback.com
 * @since      1.0.0
 *
 * @package    Visualfeedback
 * @subpackage Visualfeedback/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Visualfeedback
 * @subpackage Visualfeedback/admin
 * @author     VisualFeedback <support@visualfeedback.com>
 */
class Visualfeedback_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/visualfeedback-admin.css', array(), $this->version, 'all' );

	}
//
//	/**
//	 * Register the JavaScript for the admin area.
//	 *
//	 * @since    1.0.0
//	 */
//	public function enqueue_scripts() {

//		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/visualfeedback-admin.js', array( 'jquery' ), $this->version, false );
//
//	}


    public function create_plugin_settings_page() {
        $page_title = 'VisualFeedback Settings';
        $menu_title = 'VisualFeedback';
        $capability = 'manage_options';
        $slug = 'visualfeedback_settings';
        $callback = array( $this, 'plugin_settings_page_content' );

        add_submenu_page( 'options-general.php', $page_title, $menu_title, $capability, $slug, $callback );
    }

    public function plugin_settings_page_content() {
        require plugin_dir_path( __FILE__ ) . 'partials/visualfeedback-admin-display.php';
    }

    public function setup_sections() {
	    $title = null;
        add_settings_section( 'visualfeedback_site_section', $title, array( $this, 'section_callback' ), 'visualfeedback_settings_fields' );
    }

    public function section_callback( $arguments ) {
//        switch( $arguments['id'] ){
//            case 'visualfeedback_site_section':
//                echo 'This is the first description here!';
//                break;
//        }
    }

    public function setup_fields() {
        $fields = array(
            array(
                'uid' => 'visualfeedback_site_uid',
                'label' => 'Website ID',
                'section' => 'visualfeedback_site_section',
                'type' => 'text',
                'options' => false,
                'placeholder' => '',
                'helper' => '',
                //'supplemental' => 'I am underneath!',
                'default' => ''
            )
        );


        foreach( $fields as $field ){
            add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'visualfeedback_settings_fields', $field['section'], $field );
            register_setting( 'visualfeedback_settings_fields', $field['uid'] );
        }
	}

    public function field_callback( $arguments ) {
        $value = get_option( $arguments['uid'] ); // Get the current value, if there is one
        if( ! $value ) { // If no value exists
            $value = $arguments['default']; // Set to our default
        }

        // Check which type of field we want
        switch( $arguments['type'] ){
            case 'text': // If it is a text field
                printf( '<input class="regular-text" name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );
                break;
        }

        // If there is help text
        if( $helper = $arguments['helper'] ){
            printf( '<span class="helper"> %s</span>', $helper ); // Show it
        }

        // If there is supplemental text
        if( $supplimental = $arguments['supplemental'] ){
            printf( '<p class="description">%s</p>', $supplimental ); // Show it
        }
    }
}
