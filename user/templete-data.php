<?php
    session_start();
    include('../includes/dbconn.php');
    include('../includes/check-login.php');
    check_login();
?>


<?php
$ret = "select * from about_us ";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($row = $res->fetch_object()) //
{
    $image = "../assets/images/web_profile\\" . $row->image; //    استدعاء الصورة
    $icon = "../assets/images/fav_icon\\" . $row->icon; //    استدعاء الايقونة

?>

<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $icon; ?>">
    <title>تفاصيل القالب</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">

    
</head>
<?php } ?>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full" style='margin-right: 260px;margin-left: -200px;'>
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6" style='width: 115%;margin-right: -260px;'>
            <?php include '../includes/user-navigation.php'?>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6" style='margin-right: -260px;'>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <?php include '../includes/user-sidebar.php'?>
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">


                    <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">تفاصيل القالب  كاملة</h4>
                        <div class="d-flex align-items-center">
                            <!-- <nav aria-label="breadcrumb">
                                
                            </nav> -->
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <!--Table Column -->
                
                <div class="card">
                 
                 <div class="card-body">
                 
                    <div class="row">
                    
                    <div class="table-responsive">
                        <center>
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
                    
                    
                    </div>
                 
                 
                 </div>
               
               
               </div>

              <!-- Table column end -->

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include '../includes/footer.php' ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>

</body>

</html>