<?php
    include('../includes/pdoconfig.php');
    if(!empty($_POST["catid"])) {	
    $id=$_POST['catid'];
    $stmt = $DB_con->prepare("SELECT * FROM main_categorize WHERE cat_id = :id");
    $stmt->execute(array(':id' => $id));
    ?>
    <?php
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
    
     echo htmlentities($row['main_cat_name']); 
    }
}

include('../includes/pdoconfig.php');
    if(!empty($_POST["cateid"])) {	
    $id=$_POST['cateid'];
    $stmt = $DB_con->prepare("SELECT * FROM main_categorize WHERE cat_id = :id");
    $stmt->execute(array(':id' => $id));
    ?>
    <?php
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
    ?>
    <?php echo htmlentities($row['m_cat_id']); ?>
    <?php
    }
}



if(!empty($_POST["rid"])) {	
    $id=$_POST['rid'];
    $stmt = $DB_con->prepare("SELECT * FROM rooms WHERE room_no = :id");
    $stmt->execute(array(':id' => $id));
    ?>
    <?php
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
    ?>
    <?php echo htmlentities($row['fees']); ?>
    <?php
    }
}

?>