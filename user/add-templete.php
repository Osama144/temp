<?php
    session_start();
    include('../includes/dbconn.php');
    include('../includes/check-login.php');
    check_login();

    if(isset($_POST['submit'])){
        $user_id=$_SESSION['user_id'];
        $templete_name=$_POST['templete_name'];
        $templete_desc=$_POST['templete_desc'];
        $m_cat_id=$_POST['m_cat_id'];
        $udate=date('d-m-Y h:i:s', time());;
        $query="INSERT into  templetes (user_id,m_cat_id,templete_name,templete_desc,templete_date) values(?,?,?,?,?)";
        $stmt = $mysqli->prepare($query);
        $rc=$stmt->bind_param('iisss',$user_id,$m_cat_id,$templete_name,$templete_desc,$udate);
        $stmt->execute();
                echo"<script>alert('  تمت إضافة القالب . $templete_name.' );</script>";
        
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
    <title>اضافة قالب جديد</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    


    <script>
    function getCategorize(val) {
        $.ajax({
        type: "POST",
        url: "get-categorize.php",
        data:'catid='+val,
        success: function(data){
        //alert(data);
        $('#m_cat_name').val(data)=$nm;
        }
        });

        $.ajax({
        type: "POST",
        url: "get-categorize.php",
        data:'cateid='+val,
        success: function(data){
        //alert(data);
        $('#m_cat_id').val(data)=$nm;
        }
        });

        $.ajax({
        type: "POST",
        url: "get-seater.php",
        data:'rid='+val,
        success: function(data){
        //alert(data);
        $('#fpm').val(data);
        }
        });
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
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">اضافة قالب جديد</h4>
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
               
            
            
            <?php if(isset($_POST['submit']))
            { ?>
            <p style="color: red"><?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg']=""); ?></p>
            <?php } ?>

            <div class="container-fluid">

                <form method="POST" action="upload.php" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">اسم القالب</h4>
                                        <div class="form-group">
                                            <input type="text" name="templete_name" placeholder="اكتب اسم القالب" id="templete_name" class="form-control" required>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">ملف القالب</h4>
                                        <div class="form-group">
                                        <h3> ادخــــــل الـتـطـبـيـق<input type="file" class="contact_fields" name="templete_name" style="display:inline;"></h3><br><br>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">صورة القالب</h4>
                                        <div class="form-group">
                                        <h3> ادخل صورة التطبيق<input type="file" class="contact_fields" name="image"></h3><br><br>
                                        </div>
                                </div>
                            </div>
                        </div>

           

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">النوع</h4>
                                        <div class="form-group mb-4">
                                            <select class="custom-select mr-sm-2" id="m_cat_id" name="m_cat_id" required="required">
                                            <option selected> اختر ... </option>
                                                <?php
                                                $user_id=$_SESSION['user_id'];
                                                $ret="SELECT * from main_categorize";
                                                $stmt= $mysqli->prepare($ret) ;
                                                // $stmt->bind_param('i',$user_id);
                                                $stmt->execute() ;//ok
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($row=$res->fetch_object()){
                                                    $m_cat_id=$row->m_cat_id;
                                                    $m_cat_name=$row->m_cat_name;
                                                ?>
                                                <option value="<?php echo $m_cat_id; ?>"> <?php echo $m_cat_name; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                </div>
                            </div>
                        </div>
                     

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">وصف التطبيق</h4>
                                        <div class="form-group">
                                        <textarea class="contact_fields" style="height: 100px;resize: none;" name="templete_desc" placeholder="وصف التتطبيق"></textarea>
                                        </div>
                                </div>
                            </div>
                        </div>



                    </div>
                

                        <div class="form-actions">
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-success">اضافة</button>
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

</body>

</html>