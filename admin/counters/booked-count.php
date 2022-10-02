<?php
    include '../includes/dbconn.php';

    $sql = "SELECT news_id FROM news where option=1";
                $query = $mysqli->query($sql);
                echo "$query->num_rows";
?>