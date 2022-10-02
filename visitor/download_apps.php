<?php
require_once('../includes/dbconn.php'); // Database connection file


$sql="select * from about_us";
$ebb=mysqli_query($conn,$sql);
$file =$_GET['templete_file'];
        
while($row=mysqli_fetch_array($ebb)){
    $downloads_count = $row['downloads_count'];
    $downloads_count = $downloads_count + 1;
echo $downloads_count ;
$id = 1;
$query = "UPDATE about_us set downloads_count=? where id=?";
$stmt = $mysqli->prepare($query);
$rc = $stmt->bind_param('ii', $downloads_count, $id);
$stmt->execute();


    // $query="UPDATE  about_us set downloads_count = $downloads_count  where id = 1";
    
}

$file_url="../uploaded/_templete_files\\".$file;
header('Content-Type: application/octet-stream');  
header("Content-Transfer-Encoding: utf-8");   
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");   
readfile($file_url); 









?>