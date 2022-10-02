<?php
session_start();
// if ($_SESSION['fristname']) {
    
// }else {
//     header("refresh:0;url=login.php");
// }
include '../config/connect.php';
$sql="select * from apps";
$ebb=mysqli_query($con,$sql);
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
<center>
    <input type="text" name="search_app" placeholder="Search ..." class="search_app" />
    <div class="items_area">
        <!--------------------------------------line------------------------------------------>
        <?php
        
        while($row=mysqli_fetch_array($ebb)){
            $imgcr="uploaded/apps_file\\".$row['app'];
            $id=$row['app_id'];
           echo  "<div class='item'>";
           echo "<a href='abaut.php'><img src=' $imgcr ' alt='Game' style='width:100px; height: 100px;' /></a>";
           echo "<h2>" .$row["app_name"].  "</h2>";
           echo "<p>" .$row["app_data"].  "</p>";
           $app_id=$row['app_id'];
           $s="select * from apps where app_id=$app_id";
           $as=mysqli_query($con,$s);
        // while($row=mysqli_fetch_array($as)){
        //    echo "<p>"  .$row["app_data"]. "</p>";
        //    }
           echo "<a href='$imgcr' class='download_btn' Download>تــــنــزيـل</a>";
         //  echo "<a href="a1.php?name= .php echo $value ['name'SELECT.  "class ="btn btn-info"> تنزيل </a> </td>"
           echo "</a></div>";
            
        }
?>

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