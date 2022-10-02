<footer class="footer text-center text-muted">
<?php	
                        // $id=$_GET['id'];
                        $ret="select * from about_us ";
                        $stmt= $mysqli->prepare($ret) ;
                        // $stmt->bind_param('i',$id);
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();

                        //$cnt=1;
                        while($row=$res->fetch_object())//
                        {
                            $web_name = $row->name;
                             ?>
&copy; <?php echo date("Y"); ?> جميع الحقوق محفوظة لموقع <a href="../index.php"><?php echo $web_name ; ?></a>
                        <?php } ?>
</footer>