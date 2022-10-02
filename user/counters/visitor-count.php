                <div>
<?php
require_once('../includes/dbconn.php'); // Database connection file
require_once('../includes/functions.php');  // PHP functions file


    // $sql = "SELECT user_id FROM userregistration";
                // $query = $mysqli->query($sql);
                // echo "$query->num_rows"+150;

	
	$total_website_views = total_views($conn); // Returns total website views
	 echo "<strong></strong> " . $total_website_views;
	?>
</div>

