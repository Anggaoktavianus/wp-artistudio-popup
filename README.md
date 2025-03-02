WordPress Pop-Up Plugin

Overview

This WordPress plugin allows users to create and display pop-ups on selected pages using Custom Post Types (CPT) and WordPress REST API. The front-end is built using React and styled with SASS for a modern user experience.

Features

Custom Post Type (CPT) "Popups" for managing pop-up content

Custom fields to specify title, description, and target page

REST API endpoint: /wp-json/artistudio/v1/popup (accessible only to logged-in users)

React-based pop-up display with animations

SASS-based styling for a sleek UI

Uses the Singleton pattern and PHP namespaces for optimized code structure

Installation

Prerequisites

WordPress installed on a local or remote server

Node.js and npm installed for React and Webpack

Steps

Clone the repository:

git clone https://github.com/yourusername/wp-artistudio-popup.git

Navigate to the plugin directory:

cd wp-artistudio-popup

Install dependencies:

npm install

Build the JavaScript bundle:

npx webpack --mode=production

Upload the plugin folder to WordPress:

Copy wp-artistudio-popup/ to wp-content/plugins/

Activate the Plugin:

Go to WordPress Dashboard > Plugins and activate "WordPress Pop-Up Plugin"

Usage

Create a Pop-Up:

Navigate to Popups > Add New

Enter the Title and Description

Select the target page where the pop-up should be displayed

Publish the pop-up

Test the Pop-Up:

Open the target page (while logged in) and verify that the pop-up appears

REST API Endpoint

Endpoint: /wp-json/artistudio/v1/popup

Method: GET

Authentication: Required (only logged-in users can access data)

Response Format:

[
  {
    "id": 1,
    "title": "Example Pop-Up",
    "content": "This is a test pop-up.",
    "page_id": 5
  }
]

Code Structure

wp-artistudio-popup/
│── assets/
│   ├── js/popup.js       # Compiled React bundle
│── includes/
│   ├── class-popup.php   # Pop-Up CPT definition
│   ├── rest-api.php      # Custom REST API endpoint
│── src/
│   ├── components/
│   │   ├── Popup.jsx     # React component for pop-up
│   ├── styles/
│   │   ├── popup.scss    # SASS styles for pop-up
│   ├── App.jsx           # React app entry point
│── wp-artistudio-popup.php # Main plugin file
│── webpack.config.js     # Webpack configuration

Contributing

If you wish to contribute, feel free to fork the repository and submit a pull request.

License

This project is open-source and licensed under the MIT License.

