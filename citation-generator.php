<?php
/**
 * Plugin Name: Citation Generator Pro
 * Plugin URI: https://github.com/yourusername/citation-generator-plugin
 * Description: Professional citation generator tool with Yelp-style UI. Supports APA, MLA, Chicago, IEEE, Harvard, Vancouver & BibTeX formats.
 * Version: 1.0.0
 * Author: Naresh
 * License: GPL v2 or later
 * Text Domain: citation-generator
 */

if (!defined('ABSPATH')) exit;

define('CG_VERSION', '1.0.0');
define('CG_PATH', plugin_dir_path(__FILE__));
define('CG_URL', plugin_dir_url(__FILE__));

class Citation_Generator_Pro {
    
    public static function init() {
        add_action('wp_enqueue_scripts', array(__class__, 'enqueue_assets'));
        add_shortcode('citation_generator', array(__class__, 'render'));
        add_filter('theme_page_templates', array(__class__, 'add_template'));
    }
    
    public static function enqueue_assets() {
        if (is_page_template('templates/citation-page.php')) {
            wp_enqueue_style('cg-style', CG_URL . 'assets/css/style.css', array(), CG_VERSION);
            wp_enqueue_script('cg-script', CG_URL . 'assets/js/script.js', array(), CG_VERSION, true);
        }
    }
    
    public static function render($atts) {
        ob_start();
        include CG_PATH . 'templates/citation-form.php';
        return ob_get_clean();
    }
    
    public static function add_template($templates) {
        $templates['templates/citation-page.php'] = __('Citation Generator', 'citation-generator');
        return $templates;
    }
}

Citation_Generator_Pro::init();
