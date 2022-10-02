<?php
session_start();
// if ($_SESSION['fristname']) {
    
// }else {
//     header("refresh:0;url=login.php");
// }
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
<div class="news_articles">
<?php 
    $conn = new mysqli("localhost","root","","store2");
    $sql="select * from news";
    $ebb=mysqli_query($conn,$sql);//
    while($row=mysqli_fetch_array($ebb)){
        $news_image="../uploaded/_news_images\\".$row['news_image'];
        $id=$row['news_id'];
       $news_id=$row['news_id'];
        
    ?>
    <div class="article">
        <img src="<?php echo $news_image; ?>" alt="news" />
        <h5><span class="fa fa-clock-o"></span> Time : <?php echo $row["news_date"]; ?> <span class="fa fa-user"></span> Author : Munaf Aqeel Mahdi</h5>
        <h2> <?php echo $row["news_name"]; ?> </h2>
        <?php echo "<p>" .$row["news_data"]. "</p>";?>
        <a href="#">Read More..</a>
    </div>
    
    <?php 
    }
    ?>
    <!-- <div class="article">
        <img src="images/Smartphones.jpg" alt="news" />
        <h5><span class="fa fa-clock-o"></span> Time : 11:24 PM <span class="fa fa-user"></span> Author : Munaf Aqeel Mahdi</h5>
        <h2>Smart Phones</h2>
        <p>
            A smartphone is a mobile phone with an advanced mobile operating system which combines features of
            a personal computer operating system with other..
        </p>
        <a href="#">Read More..</a>
    </div>
    <div class="article">
        <img src="images/google_messenger.jpg" alt="news" />
        <h5><span class="fa fa-clock-o"></span> Time : 9:56 PM <span class="fa fa-user"></span> Author : Munaf Aqeel Mahdi</h5>
        <h2>Google Messenger</h2>
        <p>
            Stay in touch with friends and family. Messenger from Google is a
            communications app that helps you send and receive SMS and MMS messages to any phone.
        </p>
        <a href="#">Read More..</a>
    </div> -->
</div>
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
