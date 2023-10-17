<?php
/**
 * Plugin Name: Curl Plugin
 * Plugin URI: https://tysonlmao.dev
 * Version: 0.1.0
 * Description: Does a cURL request and displays its result in a shortcode.
 * Author: tysonlmao
 * Author URI: https://github.com/tysonlmao
 */

function fetch_pixelstats_data() {
    // Make a cURL request to the API.
    $api_url = 'https://api.pixelstats.app';
    $response = wp_safe_remote_get($api_url);

    if (is_wp_error($response)) {
        return 'Error: Unable to fetch data from the API.';
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    if ($data && isset($data->message)) {
        return $data->message;
    } else {
        return 'Error: No "message" found in the API response.';
    }
}

function pixelstats_shortcode() {
    $message = fetch_pixelstats_data();
    return '<h2 class="pixelstats-message">' . esc_html($message) . '</h2>';
}
add_shortcode('pixelstats', 'pixelstats_shortcode');
