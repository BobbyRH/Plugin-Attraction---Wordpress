<?php
function obywie_attraction_update () {
global $wpdb;
$attraction_id = $_GET["id"];
//update
if(isset($_GET['id'])){	

	$attraction_id = $_GET["id"];
	$attraction_name = $_POST["attraction_name"];
	$attraction_image = $_POST["attraction_image"];
	$attraction_desc = $_POST["attraction_desc"];
	$wpdb->update(
		'wp_obywie_attraction', //table
		array('attraction_name' => $attraction_name,'attraction_image' => $attraction_image,'attraction_desc' => $attraction_desc), //data
		array( 'attraction_id' => $attraction_id ), //where
		array('%s','%s','%s'), //data format
		array('%s') //where format
	);	
	$alert = "Updated Success <a href=\"/admin.php?page=obywie_attraction_list\">Back To List</a>";
}
else{//selecting value to update	
	$schools = $wpdb->get_results($wpdb->prepare("SELECT * from wp_obywie_attraction where attraction_id=%d",$attraction_id));
	foreach ($schools as $s ){
		$attraction_id=$s->attraction_id;
		$attraction_name=$s->attraction_name;
		$attraction_image=$s->attraction_image;
		$attraction_desc=$s->attraction_desc;
	}
	$alert = "Please fill the form below...";
}
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/obywieattraction/style-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>Attraction Update</h2>
<p><?=$alert;?></p>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
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
<input type='submit' name="update" value='Save' class='button'>
</form>

</div>
<?php
}