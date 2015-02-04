<?php
function obywie_attraction_create () {
$attraction_name = $_POST["attraction_name"];
$attraction_image = $_POST["attraction_image"];
$attraction_desc = $_POST["attraction_desc"];
//insert
if(isset($_POST['attraction_name'])){
	global $wpdb;
	$wpdb->insert(
		'wp_obywie_attraction', //table
		array('attraction_name' => $attraction_name,'attraction_image' => $attraction_image,'attraction_desc' => $attraction_desc), //data
		array('%s','%s') //data format			
	);
	$message.="Attration List inserted";
}
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/obywieattraction/style-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>Add New Attraction List</h2>
<?php if (isset($message)): ?><div class="updated"><p><?php echo $message;?></p></div><?php endif;?>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<p>Please fill the form Below...</p>
<table class='wp-list-table widefat fixed'>
<tr><th>Name</th><td><input type="text" name="attraction_name" value="<?php echo $attraction_name;?>"/></td></tr>
<tr><th>Image Link</th><td><input type="text" name="attraction_image" value="<?php echo $attraction_image;?>"/></td></tr>
<tr><th>Description</th><td>
<?php

$editor_id = 'attraction_desc';

wp_editor($attraction_desc, $editor_id );

?>
</td></tr>
</table>
<input type='submit' name="insert" value='Save' class='button'>
</form>
</div>
<?php
}