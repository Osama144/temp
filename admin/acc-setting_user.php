<?php
    session_start();
    include('../includes/dbconn.php');
    include('../includes/check-login.php');
    check_login();


    $ai=$_GET['user_id'];
    // code for change password
    if(isset($_POST['changepwd'])){
    $np=$_POST['newpassword'];
    $np=md5($np);
    $udate=date('d-m-Y h:i:s', time());;
            $con="update userregistration set password=?,admin_pass_updation_date=?  where user_id=?";
            $chngpwd1 = $mysqli->prepare($con);
            $chngpwd1->bind_param('ssi',$np,$udate,$ai);
            $chngpwd1->execute();
            $_SESSION['msg']="تم تعديل كلمة المرور بنجاح";
         }else {
            $_SESSION['msg']="لم يتم تعديل كلمة المرور";
        	

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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>تغير كلمة المرور</title>
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
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">تغير كلمة المرور</h4>
                        
                        
                        <?php if(isset($_POST['changepwd']))
                            { ?>
                                <div class="alert alert-secondary alert-dismissible bg-secondary text-white border-0 fade show"
                                    role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>رسالة - </strong> <?php echo htmlentities($_SESSION['msg']); ?> <?php echo htmlentities($_SESSION['msg']=""); ?>
                                </div>
						<?php } ?>

                            
                        
                        
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
                        $id=$_GET['user_id'];
                        $ret="SELECT * from userregistration where user_id=?";
                            $stmt= $mysqli->prepare($ret) ;
                        $stmt->bind_param('i',$id);
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        //$cnt=1;
                        while($row=$res->fetch_object())
                        {
                            ?>

                        
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <center><h4 class="card-title">الاسم</h4></center>
                                        <div class="form-group">
                                            <input type="text" name="fname" value="<?php echo $row->firstName, " " ,$row->middleName, " " ,$row->lastName;?>" id="fname" placeholder="اسم المستخدم" required class="form-control" disabled class="form-control">
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">البريد الالكتروني</h4>
                                        <div class="form-group">
                                            <input type="email" name="email" value="<?php echo $row->email;?>" id="email" placeholder="البريد الالكتروني للطالب" onBlur="checkAvailability()" required="required" class="form-control" disabled class="form-control">
                                            <span id="user-availability-status" style="font-size:12px;"></span>
                                        </div>
                                </div>
                            </div>
                        </div>

<!-- 
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">كلمة المرور الحالية</h4>
                                        <div class="form-group">
                                        <input type="password" value="" name="oldpassword" id="oldpassword" class="form-control" onBlur="checkpass()" required="required">
                                        <span id="password-availability-status" style="font-size:12px;"></span>
                                        </div>
                                    
                                </div>
                            </div>
                        </div> -->



                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">كلمة المرور الجديدة</h4>
                                        <div class="form-group">
                                        <input type="password" class="form-control" name="newpassword" id="newpassword" value="" required="required">
                                        </div>
                                    
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">تاكيد كلمة المرور</h4>
                                        <div class="form-group">
                                        <input type="password" class="form-control" value="" required="required" id="cpassword" name="cpassword" >
                                        </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="card-subtitle"><code>اخر تحديث: </code> <?php echo $row->updationDate; }?> </h6>



                    </div>


                        <div class="form-actions">
                            <div class="text-center">
                                <button type="submit" name="changepwd" class="btn btn-success">تغير</button>
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

    <script>
    function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check-availability-admin.php",
            data:'emailid='+$("#emailid").val(),
            type: "POST",
        success:function(data){
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
        },
        error:function (){}
        });
    }
    </script>

    <script>
    function checkpass() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check-availability-admin.php",
            data:'oldpassword='+$("#oldpassword").val(),
            type: "POST",
        success:function(data){
            $("#password-availability-status").html(data);
            $("#loaderIcon").hide();
        },
        error:function (){}
        });
    }
    </script>

</body>

</html>