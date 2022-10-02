<?php
    include '../includes/dbconn.php';
    //$sq = "SELECT id FROM userregistration";
    $id=$_SESSION['user_id'];
    $sql = "SELECT id FROM templetes where user_id=$id";
                $query = $mysqli->query($sql);
                echo "$query->num_rows"+100;
?>