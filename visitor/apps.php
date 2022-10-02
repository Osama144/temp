<?php
session_start();
// if ($_SESSION['fristname']) {
    
// }else {
//     header("refresh:0;url=login.php");
// }
require_once('../includes/dbconn.php'); // Database connection file
require_once('../includes/functions.php');  // PHP functions file

$page_id = 1;
$visitor_ip = $_SERVER['REMOTE_ADDR']; // stores IP address of visitor in variable

add_view($conn, $visitor_ip, $page_id);

?>

<!-- Designed and programmed by : Munaf Aqeel Mahdi - Web , Android and Java developer -->
<!DOCTYPE html>
<html>
<?php
include '../config/head.php';
?>
<body>
<!--||||||||||||||||||||||||||||||||||||||||||||||||||Div NavBar|||||||||||||||||||||||||||||||||||||||||||||||||||||-->
<?php
include '../config/navbar.php';
/////////////////////////////////////////////////////Div Mobile NavBar////////////////////////

include '../config/m_navbar.php'; //download_apps.php

?>
<!--||||||||||||||||||||||||||||||||||||||||||||||||||Div Header|||||||||||||||||||||||||||||||||||||||||||||||||||||-->
<div id="header" align="center" style="padding-top: 100px;padding-bottom:100px;">
<center>
    
<div>
	<?php
	$total_page_views = total_views($conn, $page_id); // Returns total views of this page
	// echo "<strong>Total Views of this Page:</strong> " . $total_page_views ."<br> page_id ". $page_id . "<br>visitor_ip " . $visitor_ip;
    // include 'download_apps.php'; //download_apps.php
    // echo $downloads_count ;

	?>
</div>

    <input type="text" name="search_app" placeholder="Search ..." class="search_app" />
    <div class="items_area">
        <!--------------------------------------line------------------------------------------>
        <?php
        // echo $downloads_count ;

$con = new mysqli("localhost","root","","store2");
$sql="select * from templetes";
$ebb=mysqli_query($con,$sql);
        
while($row=mysqli_fetch_array($ebb)){
    $imgcr="../uploaded/_templete_images\\".$row['image'];
    $file_url="../uploaded/_templete_files\\".$row['templete_file'];
    $tid=$row['id'];
   echo  "<div class='item'>";
   echo "<a href='about.php?id=$tid'><img src=' $imgcr ' alt='Game' style='width:100px; height: 100px;' /></a>";
   echo "<h2>" .$row["templete_name"].  "</h2>";
   echo "<p>" .$row["templete_desc"].  "</p>";
   $templete_id=$row['id'];
   $s="select * from templetes where id=$templete_id";
  
   $as=mysqli_query($con,$s);
// while($row=mysqli_fetch_array($as)){
//    echo "<p>"  .$row["app_data"]. "</p>";
//    }
   echo "<a href='download_apps.php?templete_file=.$row[templete_file]' class='download_btn' Download>تــــنــزيـل</a>";
 //  echo "<a href="a1.php?name= .php echo $value ['name'SELECT.  "class ="btn btn-info"> تنزيل </a> </td>"
   echo "</a></div>";
    
}


?>

        
    </div>
</center>
    <!--||||||||||||||||||||||||||||||||||||||||||||news_dropdownmenu||||||||||||||||||||||||||||||||||||||||||||||||||||-->
    <?php
include '../config/dropdownmenu.php';
/////////////////////////////////////////////////////////About Dialog/////////////////////////////////////////////

include '../config/bout_dialog.php';
    ?>
</div>
<?php 
//////////////////////////////////////////////////////Div Footer//////////////////////////////////////////
include '../config/footer.php';
?>
<!--|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
</body>
</html>
<!-- Designed and programmed by : Munaf Aqeel Mahdi - Web , Android and Java developer -->