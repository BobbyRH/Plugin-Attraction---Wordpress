<?php
function obywie_attraction_list () {
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/obywieattraction/style-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>Attraction</h2><br/>
<a href="<?php echo admin_url('admin.php?page=obywie_attraction_create'); ?>" class="hide-if-no-js add-new-h2">Add New</a>
<?php
global $wpdb;
$rows = $wpdb->get_results("SELECT `attraction_id`,`attraction_name`,`attraction_desc`,`attraction_image` from wp_obywie_attraction");
echo "<table class='wp-list-table widefat fixed'>";
echo "<tr><th>ID</th><th>Name</th><th>Image</th><th>Action</th></tr>";
foreach ($rows as $row ){
	echo "<tr>";
	echo "<td>$row->attraction_id</td>";
	echo "<td>$row->attraction_name</td>";	
	echo "<td><img src=\"$row->attraction_image\" style=\"max-width:100px;\" /></td>";	
	echo "<td>
	<a href='".admin_url('admin.php?page=obywie_attraction_update&id='.$row->attraction_id)."' class=\"hide-if-no-js add-new-h2\">Update</a>
	<a href='".admin_url('admin.php?page=obywie_attraction_delete&id='.$row->attraction_id)."' class=\"hide-if-no-js add-new-h2\" onclick=\"return confirm('Are you sure for delete this content ?')\">Delete</a>
	</td>";
	echo "</tr>";}
echo "</table>";
?>
</div>
<?php
}