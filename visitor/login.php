<?php
session_start();

//$con=new mysqli("localhost","root","","store2") or die ("error");
session_start();
require_once('../includes/dbconn.php'); // Database connection file
require_once('../includes/functions.php');  // PHP functions file

$page_id = 1;
$visitor_ip = $_SERVER['REMOTE_ADDR']; // stores IP address of visitor in variable

add_view($conn, $visitor_ip, $page_id);
if(isset($_POST['submit']))
    {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password = md5($password);
    $stmt=$mysqli->prepare("SELECT email,password,user_id FROM userregistration WHERE email=? and password=? ");
        $stmt->bind_param('ss',$email,$password);
        $stmt->execute();
        $stmt -> bind_result($email,$password,$id);
        $rs=$stmt->fetch();
         $stmt->close();
        $_SESSION['user_id']=$id;
        $_SESSION['login']=$email;
        $uip=$_SERVER['REMOTE_ADDR'];
        $ldate=date('d/m/Y h:i:s', time());
         if($rs){
            $uid=$_SESSION['user_id'];
            $uemail=$_SESSION['login'];
        $ip=$_SERVER['REMOTE_ADDR'];
        $geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
        $addrDetailsArr = unserialize(file_get_contents($geopluginURL));
        $city = $addrDetailsArr['geoplugin_city'];
        $country = $addrDetailsArr['geoplugin_countryName'];
        $log="insert into userLog(userId,userEmail,userIp,city,country) values('$uid','$uemail','$ip','$city','$country')";
        $mysqli->query($log);
        if($log){
            header("location:../user/dashboard.php");
                 }
        } else {
            echo "<script>alert('عذرا ، البريد الإلكتروني أو كلمة المرور غير صالحة!');</script>";
               }
   }

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
        <form action="" method="POST">
            <p> 
                <input class="contact_fields" type="email" name="email" placeholder="ادخل الايميل" required="required"/></p>
            <p> 
                <input class="contact_fields" type="password" name="password" placeholder="ادخل كلمة المرور" required="required"/></p>
            <p><input class="contact_btn" type="submit" name="submit" value="تسجل الدخول" /></p>
        </form>
    </div>
</center>
    <!--||||||||||||||||||||||||||||||||||||||||||||news_dropdownmenu||||||||||||||||||||||||||||||||||||||||||||||||||||-->
        <?php
           include '../config/dropdownmenu.php';
 


    // if(isset($_POST['submit'])){  //if 1
    //     $email=$_POST['email'];
    //     $pass=$_POST['password'];
    //     $pass = md5($pass);
    //     if(!empty($email) && !empty($pass)){  // if 2              
    //         $sql="select * from userregistration where `email`='$email' and `password`='$pass'";
    //         $res=mysqli_query($con,$sql);
    //         $row=mysqli_fetch_assoc($res);
           
    //         if(
    //             !empty($row) && 
    //             $_POST['email']==$row['email'] && 
    //             $_POST['password']==$row['password']){ // if 3
    //             // echo"<CENTER>";
    //             // echo "<div style='background:#767' size:80>"  . $user . "مرحبا بك</CENTER> </div>";
    //             $user = $row['fristName'];
    //             echo
    //             "<a href='#' style='
    //             color:white; 
    //             border-radius: 14px; 
    //             background: rgb(116, 255, 181); 
    //             padding: 10px 50px 10px 50px;
    //             border: none;
    //             margin: 15px;
    //             font-size: 22px;
    //             font-family: andalus;
    //             transition: all 0.5s;
    //             text-decoration: none;
    //             display: inline-block;
    //             '>" . $user . "مرحباً بك</a>";
                
    //             $image = $row['image'];
    //             // $type = $row['type'];
    //             $user_id = $row['user_id'];
    //             $_SESSION['email']=$email;
    //             $_SESSION['user_id']=$user_id;
    //             $_SESSION['fristname']=$user;
    //             $_SESSION['password']=$pass;
    //             $_SESSION['type']=$type;
    //             $_SESSION['image']=$image;

    //             header("refresh:3;url=../user/dashboard.php");

    //             // if($type == "admin"){ // if 4
    //             //     # code... برنامج ادمن
                    
    //             //     header("refresh:3;url=../admin/dashboard.php");
    
    //             // } // if 4
    //             //  else {
    //             //     # code... برنامج يوزر    
             
    //             // }

                
    //          } // if 3
    //          else{
    //             echo
    //             "<a href='#' style='
    //             color:white; 
    //             border-radius: 14px; 
    //             background: rgb(255, 116, 116); 
    //             padding: 10px 50px 10px 50px;
    //             border: none;
    //             margin: 15px;
    //             font-size: 22px;
    //             font-family: andalus;
    //             transition: all 0.5s;
    //             text-decoration: none;
    //             display: inline-block;
    //             '> غير موجود </a>";
                
            
    //          }
    //      }// if 2
    //    else {
    //     ?>
    <!-- //             <a href="#" style="
    //             color:white; 
    //             border-radius: 14px; 
    //             background: rgb(255, 116, 116); 
    //             padding: 10px 50px 10px 50px;
    //             border: none;
    //             margin: 15px;
    //             font-size: 22px;
    //             font-family: andalus;
    //             transition: all 0.5s;
    //             text-decoration: none;
    //             display: inline-block;
    //             "> -->
    <?php //echo"هناك حقول فارغة";?> </a>
                 <?php
    //     }
    // } // if 1
//////////////////////////////////////////////////////About Dialog//////////////////////////////////////////
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