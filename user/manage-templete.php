<?php
    session_start();
    include('../includes/dbconn.php');
    include('../includes/check-login.php');
    check_login();

    if(isset($_GET['del'])) {
        $id=intval($_GET['del']);
        $adn="DELETE from templetes where id=?";
            $stmt= $mysqli->prepare($adn);
            $stmt->bind_param('i',$id);
            $stmt->execute();
            $stmt->close();	   
            echo "<script>alert('تم الحذف بنجاح');</script>" ;
    }
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
    <title>صفحة القوالب</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
     <!-- This page plugin CSS -->
     <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">

    <script language="javascript" type="text/javascript">
    var popUpWin=0;
    function popUpWindow(URLStr, left, top, width, height){
        if(popUpWin) {
         if(!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
        }
    </script>

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
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">ادارة القوالب الخاصة بي</h4>
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

                <!-- Table Starts -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-subtitle"> قائمة القوالب الخاصة بي.</h6>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-hover table-bordered no-wrap">
                                    <thead class="thead-dark">
                                            <tr>
                                                <th>التسلسل</th>
                                                <th>اسم القالب</th>
                                                <th>الوصف</th>
                                                <th>الصورة</th>
                                                <th>المالك</th>
                                                <th>الحجم</th>
                                                <th>تاريخ الرفع</th>
                                                <th>القسم</th>
                                                <th>النوع</th>
                                                <th>الاجراءت</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      


                                        <?php	
                                        $aid=$_SESSION['user_id'];
                                        $ret="SELECT * from templetes where user_id=$aid";
                                        $stmt= $mysqli->prepare($ret) ;
                                        $stmt->execute() ;//ok
                                        $res=$stmt->get_result();
                                        $cnt=1;
                                        while($row=$res->fetch_object())
                                            {
                                                $mid=$row->m_cat_id;
                                                $uid=$row->user_id;
                                                $tid=$row->id;
                                                $size=$row->size;
                                                $image ="../uploaded/_templete_images\\".$row->image;
                                                ?>
                                        <tr><td><?php echo $cnt;;?></td>
                                        <td><?php echo $row->templete_name;?></td>
                                        <td><?php echo $row->templete_desc;?></td>
                                        <td><?php echo "<img src=' $image '  alt='user' width='40' height='40' >";?></td>
                                        <td><?php	
                                        $reet="SELECT * from userregistration WHERE user_id=$uid";
                                        $stmmt= $mysqli->prepare($reet) ;
                                        $stmmt->execute() ;//ok
                                        $ress=$stmmt->get_result();
                                        while($roow=$ress->fetch_object()){
                                                $user_name=$roow->firstName;}
                                             ?><?php echo $user_name;?></td>
                                        <td><?php echo $size;?></td>
                                        <td><?php echo $row->templete_date;?></td>
                                        
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

                                        <td><?php echo $cat_name;?></td>
                                        <td><?php echo $m_cat_name;?></td>
                                        
                                        <td>
                                        <a href="templete-data.php?id=<?php echo $tid;?>" title="عرض قالب"><i class="icon-size-fullscreen"></i></a>&nbsp;&nbsp;
                                        <a href="edit-templete.php?id=<?php echo $tid;?>" title="تعديل قالب"><i class="icon-note"></i></a>&nbsp;&nbsp;
                                        <a href="manage-templete.php?del=<?php echo $tid;?>" title="حذف قالب" onclick="return confirm('هل تريد حذف هذا');"><i class="icon-close" style="color:red;"></i></a></td>
                                        </tr>
                                            <?php
                                        $cnt=$cnt+1;
                                            } ?>
											
										
									</tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Table Ends -->

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
    <script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>

</body>

</html>