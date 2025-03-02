<?php
// includes/class-api.php

if (!defined('ABSPATH')) {
    exit; // Keluar jika diakses langsung
}

class WP_Popup_API {

    public function __construct() {
        add_action('rest_api_init', array($this, 'register_api_routes'));
    }

    public function register_api_routes() {
        register_rest_route('artistudio/v1', '/popup', array(
            'methods'  => 'GET',
            'callback' => array($this, 'get_popups'),
            'permission_callback' => function () {
                return is_user_logged_in(); // Hanya untuk user yang login
            }
        ));
    }

    public function get_popups($request) {
        $args = array(
            'post_type'      => 'popup',
            'posts_per_page' => -1,
        );

        $query = new WP_Query($args);
        $popups = array();

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $popups[] = array(
                    'id'          => get_the_ID(),
                    'title'       => get_the_title(),
                    'content'     => get_the_content(),
                    'page_id'     => get_post_meta(get_the_ID(), '_popup_page', true),
                );
            }
            wp_reset_postdata();
        }

        return rest_ensure_response($popups);
    }
}

// Inisialisasi API
new WP_Popup_API();
