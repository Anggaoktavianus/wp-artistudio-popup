<?php
/**
 * Plugin Name: wp-artistudio-popup
 * Plugin URI: https://github.com/Anggaoktavianus/wp-artistudio-popup.git
 * Description: Plugin untuk menampilkan pop-up di halaman tertentu dengan React dan REST API.
 * Version: 1.0.0
 * Author: Angga Oktavianus
 * Author URI: https://anggaoktavian.my.id
 * License: GPL v2 or later
 * Text Domain: wp-artistudio-popup
 */

if (!defined('ABSPATH')) {
    exit; // Keluar jika diakses langsung
}

// Memuat file utama plugin
require_once plugin_dir_path(__FILE__) . 'includes/class-popup.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-meta-box.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-api.php';


// Inisialisasi plugin
function wp_popup_plugin_init() {
    WordPress_Popup_Plugin::get_instance();
}
add_action('plugins_loaded', 'wp_popup_plugin_init');

// Load frontend script
function wp_popup_enqueue_scripts() {
    wp_enqueue_script(
        'wp-popup-script',
        plugin_dir_url(__FILE__) . 'assets/js/popup.js',
        array(),
        '1.0.0',
        true
    );

    // Menambahkan page ID ke body tag
    if (is_page()) {
        echo '<script>document.body.dataset.pageId = "' . get_the_ID() . '";</script>';
    }
}
add_action('wp_footer', 'wp_popup_enqueue_scripts');
