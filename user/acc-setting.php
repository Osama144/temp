<?php
    session_start();
    include('../includes/dbconn.php');
    date_default_timezone_set('America/Chicago');
    include('../includes/check-login.php');
    check_login();
    $ai=$_SESSION['user_id'];
    // code for change password
    if(isset($_POST['changepwd'])){
    $op=$_POST['oldpassword'];
    $op=md5($op);
    $np=$_POST['newpassword'];
    $np=md5($np);
    $udate=date('d-m-Y h:i:s', time());;
        $sql="SELECT password FROM userregistration where password=?";
        $chngpwd = $mysqli->prepare($sql);
        $chngpwd->bind_param('s',$op);
        $chngpwd->execute();
        $chngpwd->store_result(); 
        $row_cnt=$chngpwd->num_rows;;
        if($row_cnt>0){
            $con="update userregistration set password=?,passUdateDate=?  where user_id=?";
            $chngpwd1 = $mysqli->prepare($con);
            $chngpwd1->bind_param('ssi',$np,$udate,$ai);
            $chngpwd1->execute();
            $_SESSION['msg']="تم تعديل كلمة المرور بنجاح ";
        } else {
            $_SESSION['msg']="كلمة المرور القديمة غير متطابقة !!";
        }	

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
<!-- By CodeAstro - codeastro.com -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $icon; ?>">
    <title>الحساب</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">

    <script type="text/javascript">
    function valid(){
    if(document.changepwd.newpassword.value!= document.changepwd.cpassword.value){
        alert("New Password and Confirmation Password does not match");
        document.changepwd.cpassword.focus();
        return false;
     }
        return true;
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
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full" style='margin-right: 260px;margin-left: -260px;'>
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6" style='width: 115%;margin-right: -260px;'>
            <?php include '../includes/user-navigation.php'?>
        </header>
        <!-- By CodeAstro - codeastro.com -->
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
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">تغير كلمة السر</h4>
                </div>

                <div class="row">
                    

                <?php
                $ai=$_SESSION['user_id'];
                // echo $ai ;
                $result ="SELECT * FROM userregistration WHERE user_id=?";
                $stmt= $mysqli->prepare($ret) ;
                        $stmt->bind_param('i',$aid);
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        //$cnt=1;
                        while($row=$res->fetch_object())
                        { ?>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-subtitle">اخر تحديث : <code><?php echo $row->passUdateDate; ?></code> </h6>
                                </div>
                            </div>
                        </div>
                </div>
                <?php } ?>


                <?php if(isset($_POST['changepwd'])){ ?>
                        <div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show"
                                    role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>رسالة: </strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg']=""); ?>
                        </div> <?php } ?>

                <form method="POST" name="changepwd" id="change-pwd" onSubmit="return valid();">
                    <div class="row">

                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">كلمة السر الحالية</h4>
                                            <div class="form-group">
                                                <input type="password" name="oldpassword" id="oldpassword" value="" class="form-control" onBlur="checkpass()" required="required">
                                                <span id="password-availability-status" class="help-block m-b-none" style="font-size:12px;"></span>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">كلمة السر الجديدة</h4>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="newpassword" id="newpassword" value="" required="required">
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">تاكيد كلمة السر الجديدة<h4>
                                            <div class="form-group">
                                                <input type="password" class="form-control" value="" required="required" id="cpassword" name="cpassword">
                                            </div>
                                    </div>
                                </div>
                            </div>
                    
                    
                    </div>

                    
                    <div class="form-actions">
                                <div class="text-center">
                                    <button type="submit" name="changepwd" class="btn btn-success">تحديث</button>
                                    <button type="reset" class="btn btn-dark">الغاء</button>
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

    <!-- customs -->
    <script>
    function checkpass() {
        $("#loaderIcon").show();
        jQuery.ajax({
        url: "check-availability.php",
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