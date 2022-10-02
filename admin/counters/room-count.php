<?php
    include '../includes/dbconn.php';

    $sql = "SELECT id FROM templetes";
                $query = $mysqli->query($sql);
                echo "$query->num_rows";
?>