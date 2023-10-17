<?php

/**
 * Plugin Name: Curl Plugin
 * Plugin URI: https://tysonlmao.dev
 * Version: 0.1.0
 * Description: Does a cURL request and displays its result in a shortcode.
 * Author: tysonlmao
 * Author URI: https://github.com/tysonlmao
 */

function fetch_pixelstats_data($api_url, $key)
{
    // Make a cURL request to the API.
    $response = wp_safe_remote_get($api_url);

    if (is_wp_error($response)) {
        return 'Error: Unable to fetch data from the API.';
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    if ($data && isset($data->$key)) {
        return $data->$key;
    } else {
        return 'Error: Key not found in the API response.';
    }
}

function pixelstats_shortcode($atts)
{
    // Extract attributes (parameters) from the shortcode.
    $atts = shortcode_atts(array(
        'api_url' => 'https://api.pixelstats.app',
        'key' => 'message',
    ), $atts);

    $message = fetch_pixelstats_data($atts['api_url'], $atts['key']);
    return '<h2 class="pixelstats-message">' . esc_html($message) . '</h2>';
}
add_shortcode('pixelstats', 'pixelstats_shortcode');
