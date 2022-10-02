<?php
    include '../includes/dbconn.php';

    $sql = "SELECT user_id FROM userregistration";
                $query = $mysqli->query($sql);
                echo "$query->num_rows";
?>