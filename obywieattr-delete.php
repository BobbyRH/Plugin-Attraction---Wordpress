<?php
function obywie_attraction_delete () {
global $wpdb;
$id = $_GET["id"];
$error_found = FALSE;
	//delete
	if(isset($_GET['id'])){	
		$wpdb->query($wpdb->prepare("DELETE FROM wp_obywie_attraction WHERE attraction_id = %d",$id));
		
 
		//  Some input field checking
	 
		if ($error_found == FALSE)
		{
			//  Use the wp redirect function
			wp_redirect(get_option('siteurl').'/wp-admin/admin.php?page=obywie_attraction_list&delete=success') ;
		}
		else
		{
			//  Some errors were found, so let's output the header since we are staying on this page
			if (isset($_GET['noheader']))
				require_once(ABSPATH . 'wp-admin/admin-header.php');
		}
		exit;
	}else{		
		//  Some input field checking
	 
		if ($error_found == FALSE)
		{
			//  Use the wp redirect function
			wp_redirect(get_option('siteurl').'/wp-admin/admin.php?page=obywie_attraction_list&delete=failed') ;
		}
		else
		{
			//  Some errors were found, so let's output the header since we are staying on this page
			if (isset($_GET['noheader']))
				require_once(ABSPATH . 'wp-admin/admin-header.php');
		}
		exit;
	}
}