
<?php
    include('../includes/dbconn.php');

$ret = "select * from about_us ";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($row = $res->fetch_object()) //
{
    $image = "../assets/images/web_profile\\" . $row->image; //    استدعاء الصورة
    $icon = "../assets/images/fav_icon\\" . $row->icon; //    استدعاء الايقونة

?>

<head>
    <title>Andystore - Your Guide Of Android</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link href="../https://fonts.googleapis.com/css?family=Amaranth" rel="stylesheet">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $icon; ?>">
        <script src="../javascript/javascript.js" type="text/javascript"></script>
        <meta charset="utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Free android apps and games and also last news about android phones and apps development">
        <meta name="keywords" content="android,mobile,phone,apps,games,android news,gaming,free,store">
        <meta name="author" content="Munaf Aqeel Mahdi">
    </head>
    <?php } ?>