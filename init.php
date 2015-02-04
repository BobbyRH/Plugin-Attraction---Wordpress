<?PHP
/*
Plugin Name: Attraction List
Plugin URI: http://www.obywie.com/
Description: Please mention the nearest attraction.
Author: Bobby Rahman Hakim
Autor URI: http://www.obywie.com/
Version: 0.2
Text Domain: obywieattr
*/

register_activation_hook(__FILE__,'obywieattr_activate');
add_action('admin_menu','obywie_attraction_modifymenu');

function obywieattr_activate(){
	global $wpdb;
	
	$table_name = $wpdb -> prefix . "obywie_attraction";
	if($wpdb -> get_var("SHOW TABLES LIKE '". $table_name."'") != $table_name)
	{
		$sql = 'CREATE TABLE '.$table_name.' (
		attraction_id INT(20) UNSIGNED AUTO_INCREMENT,
		attraction_name VARCHAR(200),
		attraction_desc TEXT,
		attraction_image VARCHAR(200),
		PRIMARY KEY (attraction_id)
		)';
		
		require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		
		add_option('obywieattr_database_version','1.0');
	}
}
function obywie_attraction_modifymenu() {
	
	//this is the main item for the menu
	add_menu_page(
	'Attraction', //page title
	'Attraction', //menu title
	'manage_options', //capabilities
	'obywie_attraction_list', //menu slug
	obywie_attraction_list, //function
	WP_PLUGIN_URL.'/obywieattraction/img/icon_attraction.png' //icon
	);
	
	//this is a submenu
	add_submenu_page(
	'obywie_attraction_list', //parent slug
	'Add New Attraction', //page title
	'Add New', //menu title
	'manage_options', //capability
	'obywie_attraction_create', //menu slug
	'obywie_attraction_create'
	); //function
	
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(
	null, //parent slug
	'Update Attraction', //page title
	'Update', //menu title
	'manage_options', //capability
	'obywie_attraction_update', //menu slug
	'obywie_attraction_update'
	); //function	
	
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(
	null, //parent slug
	'Delete Attraction', //page title
	'Delete', //menu title
	'manage_options', //capability
	'obywie_attraction_delete', //menu slug
	'obywie_attraction_delete'
	); //function
}
define('ROOTDIR2', plugin_dir_path(__FILE__));
require_once(ROOTDIR2 . 'obywieattr-list.php');
require_once(ROOTDIR2 . 'obywieattr-create.php');
require_once(ROOTDIR2 . 'obywieattr-update.php');
require_once(ROOTDIR2 . 'obywieattr-delete.php');
?>

