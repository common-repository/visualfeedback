<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://visualfeedback.com
 * @since      1.0.0
 *
 * @package    Visualfeedback
 * @subpackage Visualfeedback/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Visualfeedback
 * @subpackage Visualfeedback/public
 * @author     VisualFeedback <support@visualfeedback.com>
 */
class Visualfeedback_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}


    public function write_vf_script_snippet() {

        $siteUid = get_option('visualfeedback_site_uid');

        if ($siteUid != false) {
            $scriptBaseUrl = "//s.visualfeedback.com/sites/";

            echo "\n<!-- VisualFeedback Snippet -->\n";
            echo "<script>(function(v,f,b,a,c,k){v.VisualFeedbackObject=c;v[c]=v[c]||function(){(v[c].q=v[c].q||[]).push(arguments)};\n";
            echo "s=f.createElement(b);m=f.getElementsByTagName(b)[0];s.async=1;s.src=a;m.parentNode.insertBefore(s,m)})\n";
            echo "(window,document,'script','" . $scriptBaseUrl . $siteUid . "','vf');</script>\n";
            echo "<!-- End VisualFeedback Snippet -->\n\n";
        }
    }
}
