<?php
    // session_start();
    require_once('../includes/dbconn.php'); // Database connection file
    require_once('../includes/functions.php');  // PHP functions file

    $page_id = 1;
    $visitor_ip = $_SERVER['REMOTE_ADDR']; // stores IP address of visitor in variable
    
    add_view($conn, $visitor_ip, $page_id);
            // include('../includes/check-login.php');
    // check_login();
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

        <!--------------------------------------line------------------------------------------>
        <center>
        <div>
	<?php
	$total_page_views = total_views($conn, $page_id); // Returns total views of this page
	// echo "<strong>Total Views of this Page:</strong> " . $total_page_views ."<br> page_id ". $page_id . "<br>visitor_ip " . $visitor_ip;
	?>
</div>

                                  <table id="zctb" class="table table-striped table-bordered no-wrap">

                                      <tbody>

                                      <?php	
                                      
                                      $tid=$_GET['id'];
                                        $ret="SELECT * from templetes where id=?";
                                        $stmt= $mysqli->prepare($ret) ;
                                    $stmt->bind_param('i',$tid);
                                    $stmt->execute() ;//ok
                                    $res=$stmt->get_result();
                                    //$cnt=1;
                                    while($row=$res->fetch_object())
                                    {
                                        $image="../uploaded/_templete_images\\".$row->image;
                                        //$image="../assets/images/users\\".$row->image;
                                        $mid =$row->m_cat_id;
                                        $uid=$row->user_id;
                                        $tdsc=$row->templete_desc;
                                            	
                          // echo "<img src=' $image ' alt='user' class='rounded-circle' width='35'>";
                                
                                              ?>
                                        
                                          <tr>
                                              <td colspan="6" align='center' ><?php  echo "<img src=' $image '  alt='user' class='rounded-circle' width='200' height='200' >" ?></td>
                                              
                                          </tr>

                                          <tr>
                                          <td colspan="2"><b>اسم القالب </b></td>
                                          <td colspan="2"><?php echo $row->templete_name;?></td>
                                          <td><b>تاريخ الرفع </b></td>
                                          <td><?php echo $row->templete_date;?></td>
                                          </tr>


                                          <tr>
                                          <td><b>المالك</b></td>
                                          <td><?php
                                          $reet="SELECT * from userregistration WHERE user_id=$uid";
                                          $stmmt= $mysqli->prepare($reet) ;
                                          $stmmt->execute() ;//ok
                                          $ress=$stmmt->get_result();
                                          while($roow=$ress->fetch_object()){
                                                  $user_name=$roow->firstName;}
                                               ?><?php echo $user_name;?></td>
                                          <td><b>الحجم</b></td>
                                          <td><?php echo $row->size;?></td>
                                          <td><b>ملف القالب</b></td>
                                          <td><?php echo $row->templete_file;?>
                                          </tr>


                                          <tr>
                                            
                                        <?php	
                                        $reet="SELECT * from main_categorize WHERE m_cat_id=$mid";
                                        $stmmt= $mysqli->prepare($reet) ;
                                        $stmmt->execute() ;//ok
                                        $resss=$stmmt->get_result();
                                        while($row=$resss->fetch_object())
                                            {
                                                $cat_id=$row->cat_id;
                                                $m_cat_name=$row->m_cat_name;}
                                             ?>
                                        
                                        <?php	
                                        $rrett="SELECT * from categorize WHERE cat_id=$cat_id";
                                        $sstmtt= $mysqli->prepare($rrett) ;
                                        $sstmtt->execute() ;//ok
                                        $rress=$sstmtt->get_result();
                                        while($rooww=$rress->fetch_object())
                                            {
                                                $cat_name=$rooww->cat_name;
                                            }
                                            ?>

                                        
                                        
                                       
                                          <td colspan="2"><b>القسم</b></td>
                                          <td colspan="2"><?php echo $cat_name;?></td>

                                          <td><b>النوع</b></td>
                                          <td><?php echo $m_cat_name;?></td>
                                          </tr>

                                          <tr>
                                          <td colspan="6"><b>   الوصف  </b>
                                          <br><?php echo $tdsc;?></td>
                                          
                                          </tr>
                                          


                                          


                                          <?php } ?>

                                      </tbody>
                                  </table>
                                        </center>
                                 

        
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