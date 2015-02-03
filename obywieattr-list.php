<?php
function obywie_attraction_list () {
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/obywieattraction/style-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>Attraction List</h2>
<a href="<?php echo admin_url('admin.php?page=obywie_attraction_create'); ?>">Add New</a>
<?php
global $wpdb;
$rows = $wpdb->get_results("SELECT attraction_id,attraction_name,attraction_desc,attraction_image from wp_obywie_attraction");
echo "<table class='wp-list-table widefat fixed'>";
echo "<tr><th>ID</th><th>Name</th><th>&nbsp;</th></tr>";
foreach ($rows as $row ){
	echo "<tr>";
	echo "<td>$row->id</td>";
	echo "<td>$row->name</td>";	
	echo "<td><a href='".admin_url('admin.php?page=obywie_attraction_update&id='.$row->id)."'>Update</a></td>";
	echo "</tr>";}
echo "</table>";
?>
</div>
<?php
}