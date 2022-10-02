<?php
    include '../includes/dbconn.php';

    $sql = "SELECT contact_id FROM contact where done<1";
                $query = $mysqli->query($sql);
                echo "$query->num_rows";
?>