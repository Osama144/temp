<?php
session_start();
include('../includes/dbconn.php');
include('../includes/check-login.php');
check_login();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $date = date('Y-m-d');
    $version = $_POST['version'];
    $privacy_policy = $_POST['privacy_policy'];
    $id = $_GET['id'];
    $query = "UPDATE about_us set name=?,date=?,version=?,privacy_policy=? where id=?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssi', $name, $date, $version, $privacy_policy, $id);
    $stmt->execute();
    echo "<script>alert('تم التحديث بنجاح');
    window.location.href='about_us.php';
    </script>";
}

?>



<!-- تعديل شعار الموقع -->
<?php
if (isset($_POST['upphoto'])) {
    //   unlink('../assets/images/web_profile\\'.$row->image);
    //   $id=$_GET['id'];
    $photofile = $_FILES['webphoto']['tmp_name'];
    $upphoto = $_FILES['webphoto']['name'];
    $up_photo_date = "UPDATE `about_us` SET `image` = '$upphoto'";
    move_uploaded_file($photofile, '../assets/images/web_profile\\' . $upphoto);
    if (mysqli_query($mysqli, $up_photo_date)) {
        echo "تم تحديث صورة الموقع بنجاح";
        header('refresh:2;url= edit-about_us.php');
        // header('Location:profile.php');
    } else {
        echo "لم يتم تحديث الصورة";
    }
}
// 
?>



<!-- تعديل ايقونة الموقع المصغرة -->
<?php
if (isset($_POST['upicon'])) {
    //   unlink('../assets/images/web_profile\\'.$row->image);
    //   $id=$_GET['id'];
    $iconfile = $_FILES['webicon']['tmp_name'];
    $upicon = $_FILES['webicon']['name'];
    $up_icon_date = "UPDATE `about_us` SET `icon` = '$upicon'";
    move_uploaded_file($iconfile, '../assets/images/fav_icon\\' . $upicon);
    if (mysqli_query($mysqli, $up_icon_date)) {
        echo "تم تحديث ايقونة الموقع المصغرة بنجاح";
        header('refresh:2;url= edit-about_us.php');
        // header('Location:profile.php');
    } else {
        echo "لم يتم تحديث الايقونة المصغرة";
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
        <title>تحديث سياسةالخصوصية</title>
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
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full" style='margin-right: 260px;margin-left: -200px;'>
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6" style='width: 115%;margin-right: -260px;'>
            <?php include 'includes/navigation.php' ?>
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
                <?php include 'includes/sidebar.php' ?>
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
            <center>
                <!-- <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div> -->
                <h1 class="page-title text-truncate text-dark font-weight-medium mb-1">تحديث بيانات الموقع وسياسةالخصوصية</h1>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <hr>
                <?php
                // $id=$_GET['id'];
                $ret = "select * from about_us ";
                $stmt = $mysqli->prepare($ret);
                // $stmt->bind_param('i',$id);
                $stmt->execute(); //ok
                $res = $stmt->get_result();

                //$cnt=1;
                while ($row = $res->fetch_object()) //
                {
                    $image = "../assets/images/web_profile\\" . $row->image; //    استدعاء الصورة
                    $icon = "../assets/images/fav_icon\\" . $row->icon; //    استدعاء الايقونة

                ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">شعار الموقع</h4>
                                    <hr>
                                    <div class="form-group">
                                        <!-- class='rounded-circle' -->
                                        <?php echo "<img src=' $image '  alt='profile'  width='250' height='50' >"; ?>

                                        <!-- <input type="text" value=""  required readonly> -->


                                    </div>
                                </div>
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="file" name="webphoto" required="" id="image"><br>
                                    <input class="btn btn-info" type="submit" name="upphoto" value="تحديث الصورة">
                                </form><br>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">الإيقونة المصغرة</h4>
                                    <hr>
                                    <div class="form-group">
                                        <!-- class='rounded-circle' -->
                                        <?php echo "<img src=' $icon '  alt='icon'  width='50' height='50' >"; ?>

                                        <!-- <input type="text" value=""  required readonly> -->
                                    <?php } ?>
                                    </div>
                                </div>

                                <form method="POST" enctype="multipart/form-data">
                                    <input type="file" name="webicon" required="" id="icon"><br>
                                    <input class="btn btn-info" type="submit" name="upicon" value="تحديث الإيقونة">
                                </form><br>
                            </div>
                        </div>

                        <br>

                    </div>
                    <hr>
            </center>



            <div class="container-fluid">

                <form method="POST">

                    <div class="row">


                        <?php
                        // $id=$_GET['id'];
                        $ret = "SELECT * from about_us";
                        $stmt = $mysqli->prepare($ret);
                        // $stmt->bind_param('i',$id);
                        $stmt->execute(); //ok
                        $res = $stmt->get_result();
                        //$cnt=1;
                        while ($row = $res->fetch_object()) {
                        ?>




                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">اسم الموقع</h4>
                                        <div class="form-group">
                                            <input type="text" name="name" value="<?php echo $row->name; ?>" id="name" class="form-control" required>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">سياسة الخصوصية</h4>
                                        <div class="form-group">
                                            <input type="text" name="privacy_policy" id="privacy_policy" value="<?php echo $row->privacy_policy; ?>" required="required" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">الإصدار</h4>
                                        <div class="form-group">
                                            <input type="text" name="version" id="version" value="<?php echo $row->version; ?>" required="required" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">الوصف</h4>
                                        <div class="form-group">
                                            <input type="text" name="about" id="about" value="<?php echo $row->about; ?>" placeholder="<?php echo $row->about; ?>" required="required" class="form-control">
                                            <!-- <textarea  type="text" name="about" id="about" value="<?php //echo $row->about;
                                                                                                        ?>" placeholder="<?php //echo $row->about;
                                                                                                                                                    ?>" required="required" class="form-control"></textarea> -->
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

</body>

    </html>