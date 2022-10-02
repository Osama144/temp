<?php
// include '../config/user_session.php';
// include '../config/connect.php';
    session_start();
      include('../includes/dbconn.php');
      include('../includes/check-login.php');
    check_login();


// $email=$_SESSION['email'];
// $sql="select * from useres where `email`='$email'";
// $res=mysqli_query($con,$sql);
// $row=mysqli_fetch_assoc($res);
// $img_id=["app_id"];


    $user_id =  $_SESSION['user_id'];         // رقم المستخدم
                 //  النوع
    

    if(isset($_POST['submit'])){
      $templete_name=$_POST["templete_name"];   //  الاسم
      $templete_desc=$_POST["templete_desc"];   //  الوصف 
      $udate=date('d-m-Y h:i:s', time());;      //  تاريخ الرفع
      $m_cat_id=$_POST['m_cat_id'];             //  النوع
      echo"templete_name :".$templete_name;    
      echo "<br>templete_desc :".$templete_desc;
      echo "<br>uploud_date :".$udate;
      echo "<br>m_cat_id :".$m_cat_id;
      echo "<br>user_id :".$user_id;
    

     //الصورة

     if(!empty($_FILES['image']['name'])){
      
        $x=$_FILES['image'];
     echo "<pre>";
     echo "<br>";
   $o=array();
   $xz=explode("/",$x['type']);

   echo"<br>";
   
//التطبيق
if(!empty($_FILES['templete_name']['name'])){
  $w=$_FILES['templete_name'];
echo "<pre>";
echo "<br>";
$m=array();
$wz=explode("/",$w['type']);

echo"<br>";

    if(!empty($templete_name) && !empty($templete_desc) && empty($o) && empty($m)){
//تعريف الصورة      

      $r=rand();
      $image_new_name=$r.".".$xz[1];
      $ab=__DIR__."\..\uploaded\_templete_images\\" . $image_new_name;
//تعريف التطبيق   
      $s=rand();
      $file_new_name=$s.".".$wz[1];
      $ob=__DIR__."\..\uploaded\_templete_files\\" . $file_new_name;
      echo"templete_name :".$templete_name;
      echo $file_new_name;
      $t = "<br>size = ";
      $s = $x['size'] / 1024;
      echo $t, $s."Kb<br> "  ;
      $sql1="insert into templetes(templete_name,templete_desc,templete_file,image,templete_date,m_cat_id,size,user_id)values('$templete_name','$templete_desc','$file_new_name','$image_new_name','$udate','$m_cat_id','$s','$user_id')";
//الصورة,img_name,'$image_new_name'
      move_uploaded_file($x['tmp_name'],$ab);
   echo" تم رفع الصورة  ";
//التطبيق
      move_uploaded_file($w['tmp_name'],$ob);
   echo" تم رفع التطبيق  ";
    }      
      if(mysqli_query($mysqli,$sql1)){
        echo" تم رفع البيانات  ";    
        header("refresh:2;url=manage-templete.php");

    }else
    {
        echo "لم يتم رفع البيانات";
    }
         }

echo "<br>user_id :".$user_id;
        }
        
      }









?>