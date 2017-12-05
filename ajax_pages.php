<?php
if(!defined('IN_GS')){ die('you cannot load this page directly.'); }

/*
Plugin Name: AJAX Pages
Description: Allows to get the pages as JSON via AJAX
Version: 0.1
Author: Rusanov Feodor
Author URI: http://feodor.me/
*/

# get correct id for plugin

define('AJAX_PAGES_FILE', basename(__FILE__, ".php"));
define('AJAX_PAGES_NAME', 'AJAX Pages');
define('AJAX_PAGES_VERSION', '0.1');

register_plugin(
	AJAX_PAGES_FILE, //Plugin id
	AJAX_PAGES_NAME, 	//Plugin name
	AJAX_PAGES_VERSION, 		//Plugin version
	'Rusanov Feodor',  //Plugin author
	'http://feodor.me/', //author website
	'Allows to get the pages as JSON via AJAX', //Plugin description
	'plugins', //page type - on which admin tab to display
	'ajax_pages_admin'  //main function (administration)
);

add_action('index-pretemplate','ajax_pages_main');

function ajax_pages_admin() {
	echo '
    <p>Hello World</p>
  ';
}

function ajax_pages_main() {
	global $data_index;
  if (isset($_GET['get_in_json']) or isset($_POST['get_in_json'])) {
    echo json_encode($data_index, JSON_PRETTY_PRINT);
    die();
  }
}
?>
