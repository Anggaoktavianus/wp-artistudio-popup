<?php
// includes/class-popup.php

if (!defined('ABSPATH')) {
    exit; // Keluar jika diakses langsung
}

class WordPress_Popup_Plugin {
    private static $instance = null;

    private function __construct() {
        add_action('init', array($this, 'register_popup_cpt'));
    }

    public static function get_instance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function register_popup_cpt() {
        $labels = array(
            'name' => __('Popups', 'wp-artistudio-popup'),
            'singular_name' => __('Popup', 'wp-artistudio-popup'),
        );

        $args = array(
            'label' => __('Popups', 'wp-artistudio-popup'),
            'public' => true,
            'show_ui' => true,
            'supports' => array('title', 'editor'),
            'menu_icon' => 'dashicons-format-image',
        );

        register_post_type('popup', $args);
    }
}
