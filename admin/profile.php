<?php
    session_start();
    include('../includes/dbconn.php');
    include('../includes/check-login.php');
    check_login();

    if(isset($_POST['update'])){
        $email=$_POST['emailid'];
        $aid=$_SESSION['user_id'];
        $udate=date('Y-m-d');
        $query="UPDATE admin set email=?,updation_date=? where id=?";
        $stmt = $mysqli->prepare($query);
        $rc=$stmt->bind_param('ssi',$email,$udate,$aid);
        $stmt->execute();
        echo"<script>alert('تم تحديث البريد الالكتروني بنجاح');</script>";
    }

?>






<?php 
if (isset($_POST['upphoto'])) {
//   unlink('../assets/images/users\\'.$row->image);
  $aid=$_SESSION['user_id'];
  $photofile = $_FILES['userphoto']['tmp_name'];
  $upphoto =$_FILES['userphoto']['name'];
  $update = "UPDATE `admin` SET `image` = '$upphoto' WHERE `admin`.`id` = '$aid'";
    move_uploaded_file($photofile, '../assets/images/users\\'.$upphoto);
  if (mysqli_query($mysqli,$update )) {
    echo "تم تحديث صورتك بنجاح";
    header('refresh:2;url= profile.php');
    // header('Location:profile.php');
  }else{
    echo "لم يتم تحديث صورتك";
  }
  
}
// 
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
    <title>الملف الشخصي</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
     <!-- This page plugin CSS -->
     <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
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
            <?php include 'includes/navigation.php'?>
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
                <?php include 'includes/sidebar.php'?>
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
            <div class="page-breadcrumb"> <hr>
            <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">الملف الشخصي</h4>
                    </div> <hr>
            <?php	
                        $aid=$_SESSION['user_id'];
                        $ret="select * from admin where id=?";
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->bind_param('i',$aid);
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();

                        //$cnt=1;
                        while($row=$res->fetch_object())//
                        {
                            $image="../assets/images/users\\".$row->image; //
                            ?> 
                            <center>
                            <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                            <?php echo "<img src=' $image '  alt='user' class='rounded-circle' width='200' height='200' >"; ?>
                                            <h4 class="card-title">الصورة الشخصية</h4>
                                            <!-- <input type="text" value=""  required readonly> -->
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
<br>
<form method="POST" enctype="multipart/form-data">
<input type="file" name="userphoto" required="" id="image"><br>
<input class="btn btn-info" type="submit" name="upphoto" value="تحديث الصورة">
</form>

                        <hr>
                        </center>

                <div class="row">
                                        <div class="d-flex align-items-center">
                            <h6 class="card-subtitle"><code>لا يمكنك إجراء تغييرات في اسم المستخدم وتاريخ التسجيل!</code> </h6> 
                        
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

                <form method="POST">

                    <div class="row">


                    <?php	
                    $aid=$_SESSION['user_id'];
                        $ret="SELECT * from admin where id=?";
                            $stmt= $mysqli->prepare($ret) ;
                        $stmt->bind_param('i',$aid);
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        //$cnt=1;
                        while($row=$res->fetch_object())
                        {
                            ?>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">اسم المستخدم</h4>
                                        <div class="form-group">
                                            <input type="text" value="<?php echo $row->username;?>" disabled class="form-control">
                                        </div>
                                    
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">البريد الالكتروني</h4>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="emailid" id="emailid" value="<?php echo $row->email;?>" required="required" >
                                        </div>
                                    
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">تاريخ التسجيل</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="<?php echo $row->reg_date;?>" disabled>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="card-subtitle"><code>اخر تحديث: </code> <?php echo $row->updation_date;?> </h6>

                        <?php } ?>

                    </div>


                        <div class="form-actions">
                            <div class="text-center">
                                <button type="submit" name="update" class="btn btn-success">تحديث</button>
                                <button type="reset" class="btn btn-danger">حذف</button>
                            </div>
                        </div>

                 
                 </form>
                 
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