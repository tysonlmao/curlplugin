# Curl Plugin

The Curl Plugin is a WordPress plugin that allows you to make cURL requests to an API and display the API response on your WordPress site using a shortcode.

## Installation

To install the Curl Plugin, follow these steps:

1. Download the plugin files or clone the repository to your local machine.

2. Upload the plugin folder to your WordPress site's `wp-content/plugins/` directory.

3. Activate the plugin through the WordPress admin dashboard.

## Usage

### Shortcode

You can use the `[curlplugin]` shortcode to make cURL requests and display the API response on your site. By default, it will make a request to `https://api.pixelstats.app` and display the "message" key from the JSON response.

You can customize the shortcode by specifying two parameters:

- `api_url`: The URL of the API you want to request data from. (Default: `https://api.pixelstats.app`)
- `key`: The key you want to extract from the JSON response. (Default: `message`)

To use the shortcode, insert it into a post or page like this:

```plaintext
[curlplugin api_url="https://api.example.com" key="message" class_list="css_classes"]

