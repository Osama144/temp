
<?php
session_start();
require_once('../includes/dbconn.php'); // Database connection file
require_once('../includes/functions.php');  // PHP functions file

$page_id = 1;
$visitor_ip = $_SERVER['REMOTE_ADDR']; // stores IP address of visitor in variable

?>
<!-- Designed and programmed by : Munaf Aqeel Mahdi - Web , Android and Java developer -->
<!DOCTYPE html>
<html>
<?php
include '../config/head.php';
?>
<body>
<!--||||||||||||||||||||||||||||||||||||||||||||||||||Div NavBar|||||||||||||||||||||||||||||||||||||||||||||||||||||-->
<div id="navbar">
    <ul>
        <li id="index"><a href="index.php">الرئيسية</a></li>
        <li id="login"><a href="login.php">تسجيل الدخول</a></li>
        <li id="singup"><a href="singup.php">انشاء حساب جديد</a></li>
    </ul>
</div>
<!--||||||||||||||||||||||||||||||||||||||||||||||||||Div Mobile NavBar|||||||||||||||||||||||||||||||||||||||||||||||||||||-->
    <div id="m_navbar">
<a href="login.php" ><span class="fa fa-login"></span></a> <!--login-->
<a href="singup.php" ><span class="fa fa-singup"></span></a> <!--singup-->
    </div>
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
                <input class="contact_fields" type="text" name="firstName" placeholder="الاسم الاول" required="required"/></p>
                <p> 
                <input class="contact_fields" type="text" name="middleName" placeholder="الاسم الاوسط" required="required"/></p>
                <p> 
                <input class="contact_fields" type="text" name="lastName" placeholder="الاسم الاخير(الكنية)" required="required"/></p>
                <p> 
                <input class="contact_fields" type="file" name="image" placeholder=" (الصورة الشخصي)" required="required"/></p>
                <p>
                <select  class="contact_fields"  id="gender" name="gender"  required="required">
                    <option selected>اختر الجنس...</option>
                    <option value="ذكر">ذكر</option>
                    <option value="انثئ">انثئ</option>
                </select></p>
                <p> 
                <input class="contact_fields" type="email" name="email" placeholder="البريد الإلكتروني" required="required"/></p>
                <p> 
            <input class="contact_fields" type="password" name="password" placeholder="كلمة السر"  minlength="9" required="required"/></p>
            <p> 
            <input class="contact_fields" type="password" name="password2" placeholder="اعد كلمة السر"  minlength="9" required="required"/></p>
                <!-- <p>  -->
                <!-- <input class="contact_fields" type="password" name="password2" placeholder="Your password again" /></p> -->
            <p><input class="contact_btn" type="submit" name="submit" value="انشاء حساب" /></p>
        </form>
    </div>
</center>

<?php
$con=new mysqli("localhost","root","","store2");

if(isset($_POST['submit'])){
    $firstName=$_POST['firstName'];
    $middleName=$_POST['middleName'];
    $lastName=$_POST['lastName'];//
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $password=$_POST['password'];
     $password2=$_POST['password2'];
     
    //  $type='user';
    if ($password == $password2) {
        # code...
    $password = md5($password);


    if(!empty($_FILES['image']['name'])){
      
        $x=$_FILES['image'];
     echo "<pre>";
     echo "<br>";
   $o=array();
   $xz=explode("/",$x['type']);

   echo"<br>";
   //تعريف الصورة      

   $r=rand();
   $image_new_name=$r.".".$xz[1];
   $ab=__DIR__."\..\assets\images\users\\" . $image_new_name;
     $sql="insert into userregistration(firstName,middleName,lastName,email,gender,image,password)values('$firstName' , '$middleName' , '$lastName' , '$email' , '$gender' , '$image_new_name' , '$password')";
      //الصورة,img_name,'$image_new_name'
      move_uploaded_file($x['tmp_name'],$ab);
   echo" تم رفع الصورة  ";
    }

if(mysqli_query($con,$sql)){
    echo" تم رفع البيانات  ";    
    header("refresh:2;url=login.php");

}else
{
    echo "لم يتم رفع البيانات";
}
}else {
    echo"كلمة المرور غير متطابقة";    
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