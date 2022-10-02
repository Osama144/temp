<?php
    session_start();
    include('../includes/dbconn.php');
    include('../includes/check-login.php');
    check_login();
    if(isset($_POST['submit']))
    {
    //$regno=$_POST['regno'];
    $id=$_GET['news_id'];
    $news_name=$_POST['news_name'];
    $news_data=$_POST['news_data'];
    $news_type=$_POST['news_type'];
    $option=$_POST['option'];
    $udate=date('d-m-Y h:i:s', time());;
    $query="UPDATE news set news_name=?,news_data=?,news_type=?,udate=?,option=? where news_id=?";
    $stmt = $mysqli->prepare($query);
    $rc=$stmt->bind_param('ssssii',$news_name,$news_data,$news_type,$udate,$option,$id);
    $stmt->execute();
    echo"<script>alert('تم التحديث بنجاح');
    window.location.href='view-news.php';
    </script>";
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
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $icon; ?>">
    <title>تحديث بيانات الإعلانات والاخبار</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
 
    <!-- <script type="text/javascript">
    function valid(){
        if(document.registration.password.value!= document.registration.cpassword.value)
    {
        alert("Password and Confirm Password does not match");
        document.registration.cpassword.focus();
        return false;
    }
        return true;
    }
    </script> -->
    
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
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">تعديل بيانات الإعلانات والاخبار</h4>
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

                <form method="POST" name="registration" onSubmit="return valid(); ">

                    <div class="row">



                        <!-- <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">رقم تسجيل المستخدم</h4>
                                        <div class="form-group">
                                            <input type="text" name="regno" placeholder="رقم تسجيل الطالب" id="regno" class="form-control" required>
                                        </div>
                                    
                                </div>
                            </div>
                        </div> -->
                        <?php	
                        $id=$_GET['news_id'];
						$ret="SELECT * from news where news_id=?";
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
                                    <center><h4 class="card-title">العنوان</h4></center>
                                        <div class="form-group">
                                            <input type="text" name="news_name" value="<?php echo $row->news_name?>" id="news_name" placeholder="العنوان" required class="form-control">
                                        </div>
                                </div>
                            </div>
                        </div>

<!-- 
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">اسم الاب</h4>
                                        <div class="form-group">
                                            <input type="text" name="mname" value="<?php // echo $row->middleName;?>" id="mname" placeholder="اسم الاب" required class="form-control" disabled class="form-control">
                                        </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">اللقب</h4>
                                        <div class="form-group">
                                            <input type="text" name="lname" value="<?php // echo $row->lastName;?>" id="lname" placeholder="اللقب" required class="form-control" disabled class="form-control">
                                        </div>
                                </div>
                            </div>
                        </div> -->


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">الحالة</h4>
                                    <div class="form-group">
                                        <select name="option" class="form-control" required="required">
                                        <option value="0"><code>غير مفعل</code></option>
                                        <option value="1">مفعل</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">النوع</h4>
                                    <div class="form-group">
                                        <select name="news_type" class="form-control" required="required">
                                        <option value="إعلان"><code>إعلان</code></option>
                                        <option value="خبر">خبر</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">الوصف</h4>
                                        <div class="form-group">
                                        <textarea onkeyup="autoGrow(this);" type="text" name="news_data" id="news_data" placeholder="الوصف" required="required" class="form-control" rows="5" cols="50"><?php echo $row->news_data;?></textarea>
                                            <!-- <input type="text" name="news_data" value="<?php //echo $row->news_data;?>" id="news_data" placeholder="الوصف" required="required" class="form-control"> -->
                                        </div>
                                </div>
                            </div>
                        </div>



                        <?php } ?>

                    </div>
                

                        <div class="form-actions">
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-success">تحديث</button>
                                <button type="reset" class="btn btn-danger">الغاء</button>
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
    function checkAvailability() {

        $("#loaderIcon").show();
        jQuery.ajax({
        url: "check-availability.php",
        data:'emailid='+$("#email").val(),
        type: "POST",
        success:function(data){
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
            },
                error:function ()
            {
                event.preventDefault();
                alert('error');
            }
        });
    }
    </script>
</body>

</html>