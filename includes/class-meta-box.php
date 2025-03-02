<?php
// includes/class-meta-box.php

if (!defined('ABSPATH')) {
    exit; // Keluar jika diakses langsung
}

class WP_Popup_Meta_Box {
    
    public function __construct() {
        add_action('add_meta_boxes', array($this, 'register_meta_box'));
        add_action('save_post', array($this, 'save_meta_box'));
    }

    public function register_meta_box() {
        add_meta_box(
            'popup_meta_box',
            __('Popup Settings', 'wp-artistudio-popup'),
            array($this, 'display_meta_box'),
            'popup',
            'side',
            'high'
        );
    }

    public function display_meta_box($post) {
        $selected_page = get_post_meta($post->ID, '_popup_page', true);
        $pages = get_pages();

        wp_nonce_field('popup_meta_box_nonce', 'popup_meta_box_nonce_field');

        echo '<label for="popup_page">'. __('Select Page:', 'wp-artistudio-popup') .'</label>';
        echo '<select id="popup_page" name="popup_page">';
        echo '<option value="">'. __('-- Select a Page --', 'wp-artistudio-popup') .'</option>';
        
        foreach ($pages as $page) {
            echo '<option value="'. esc_attr($page->ID) .'" '. selected($selected_page, $page->ID, false) .'>'. esc_html($page->post_title) .'</option>';
        }

        echo '</select>';
    }

    public function save_meta_box($post_id) {
        if (!isset($_POST['popup_meta_box_nonce_field']) || !wp_verify_nonce($_POST['popup_meta_box_nonce_field'], 'popup_meta_box_nonce')) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (isset($_POST['popup_page'])) {
            update_post_meta($post_id, '_popup_page', sanitize_text_field($_POST['popup_page']));
        }
    }
}

// Inisialisasi class
new WP_Popup_Meta_Box();
