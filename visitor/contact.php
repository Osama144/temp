<?php
session_start();
// if ($_SESSION['fristname']) {
    
// }else {
//     header("refresh:1;url=login.php");
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

include '../config/m_navbar.php';

?>
<!--||||||||||||||||||||||||||||||||||||||||||||||||||Div Header|||||||||||||||||||||||||||||||||||||||||||||||||||||-->
<div id="header" align="center" style="padding-top: 100px;padding-bottom:100px;">
<center>
    
<div>
	<?php
	$total_page_views = total_views($conn, $page_id); // Returns total views of this page
	// echo "<strong>Total Views of this Page:</strong> " . $total_page_views ."<br> page_id ". $page_id . "<br>visitor_ip " . $visitor_ip;
	?>
</div>

    <div class="contact_div">
        <form action="" method="POST" enctype="multipart/form-data">
            <p> 
                <input class="contact_fields" type="text" name="fullname" placeholder="Your Name" /></p>
            <p> 
                <input class="contact_fields" type="email" name="email" placeholder="Your Email Address" /></p>
            <p> 
                <input class="contact_fields" type="text" name="Subject" placeholder="Your Subject" /></p>
            <p>
                <textarea class="contact_fields" style="height: 150px;resize: none;" type="text" name="message" placeholder="Your Message ..."></textarea>
            </p>
            <p><input class="contact_btn" type="submit" name="submit" value="submit" /></p>
        </form>
    </div>
    
</center>

<?php
$con=new mysqli("localhost","root","","store");

if(isset($_POST['submit'])){
     $fullname=$_POST['fullname'];
	 $email=$_POST['email'];
     $Subject=$_POST['Subject'];
     $message=$_POST['message'];
     $sql="insert into contact(fullname,email,Subject,data)values('$fullname' , '$email' , '$Subject' , '$message')";
      

if(mysqli_query($con,$sql)){
    echo" تم رفع البيانات  ";    
    header("refresh:2;url=contact.php");

}else
{
    echo "لم يتم رفع البيانات";
}
}
?>

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



