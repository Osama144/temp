    <div id="about_dialog_bg">
        <div id="about_dialog">
            <p onclick="about_dialog_hide()" style="color:white;"><span id="close_dialog"></span></p>
            <?php	
                include('../includes/dbconn.php');
                                        $aid=$_SESSION['user_id'];
                                        $ret="SELECT * from about_us";
                                        $stmt= $mysqli->prepare($ret) ;
                                        $stmt->execute() ;//ok
                                        $res=$stmt->get_result();
                                        while($row=$res->fetch_object())
                                            {
                                                ?>
            <h2 align="center"> <?php echo $row->name;?> موقع </h2>
            <p>تم التطوير من قبل  فريق مبرمجو تمبلت</p>
            <h3>سياسة الخصوصية</h3>
            <p><?php echo $row->privacy_policy;?></p>
            <h3>تاريخ تحديث سياسة الخصوصية</h3>
            <p><?php echo $row->date;?></p>
            <h3>عن الموقع</h3>
            <p>موقع تمبلت هوموقع مميز يتيح تنزيل قوالب مجانا واخر اخبار التقنية والتكنولوجياوغيرها من المميزات.</p>
            <h3>الإصدار</h3>
            <p><?php echo $row->version;?></p>
            <hr style="width: 350px;border: 1px solid rgba(255, 255, 255, 0.6);border-radius: 100%;">
            <a href="http://www.facebook.com/munafaqeelmahdi.official/"><span class="fa fa-facebook-official"></span> فيسبوك </a>
            <a href="http://www.facebook.com/manaf.almamori.1"><span class="fa fa-facebook-official"></span> تلقرام </a>
            <a href="http://twitter.com/munaf_mahdi"><span class="fa fa-twitter"></span> تويتر</a>
            <?php } ?>
        </div>
    </div>