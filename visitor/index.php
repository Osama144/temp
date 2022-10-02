                               <!--admin bage-->


<?PHP
session_start();
// if ($_SESSION['fristname']) {
    
// }else {
//     header("refresh:0;url=login.php");
// }
require_once('../includes/dbconn.php'); // Database connection file
require_once('../includes/functions.php');  // PHP functions file

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

include '../config/m_navbar.php';

?>


<!--||||||||||||||||||||||||||||||||||||||||||||||||||Div Header|||||||||||||||||||||||||||||||||||||||||||||||||||||-->
<div id="header" align="center" style="padding-top: 100px;padding-bottom:100px;">
   <p align="center" style="margin:0;"><img id="main_img" src="../images/apps_games_main.png" /></p>
   
<div>
	<?php
	$total_website_views = total_views($conn); // Returns total website views
	// echo "<strong>Total Website Views:</strong> " . $total_website_views;
	?>
</div>

    <h1 id="main_title" style="text-shadow: 3px 3px 1px rgb(215, 215, 215);margin:2px;">TEMPLETE تمبلت - Your Guide Of Templetes</h1>
<a href="index.php" class="btn" style="background: #3479AB;color: rgb(255, 255, 255);" onmouseover="btn_title_show('القائمة الرئيسية') " onmouseout="btn_title_show('')"><span style="font-size: 50px;" class="fa fa-home"></span><br>الرئيسية</a>
<a href="#" class="btn" style="background: #4CAF50;color: rgb(255, 255, 255);" onmouseover="btn_title_show('عدد الزوار <?php echo $total_website_views; ?>')" onmouseout="btn_title_show('')">
    <span style="font-size: 50px;color: rgb(255, 255, 255);" class="fa fa-rocket"></span><br><?php echo " عدد الزوار " . $total_website_views; ?></a>
<a href="apps.php" class="btn" style="background: #E91E63;color: rgb(255, 255, 255);"color="green" onmouseover="btn_title_show('قوالب مجانية ')" onmouseout="btn_title_show('')">
    <span style="font-size: 50px;color: rgb(255, 255, 255);" class="fa fa-gamepad"></span><br>القوالب</a>
<a href="news.php" class="btn" style="background: #673AB7;color: rgb(255, 255, 255);" onmouseover="btn_title_show('شاهد اخر اخبار التقنية والتكنولوجيا')" onmouseout="btn_title_show('')"><span style="font-size: 50px;color: rgb(255, 255, 255);" class="fa fa-newspaper-o"></span><br>أخبار</a>
<a href="#" class="btn" style="background: #FF9800;color: rgb(255, 255, 255);" onmouseover="btn_title_show('هل تعلم ماهو موقع تمبلت Templet')" onmouseout="btn_title_show('')" onclick="about_dialog_show()"><span style="font-size: 50px;color: rgb(255, 255, 255);" class="fa fa-user"></span><br>حول</a>
<p id="btn_title" style="position: absolute;left: 100px;right: 100px;"></p>
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
    