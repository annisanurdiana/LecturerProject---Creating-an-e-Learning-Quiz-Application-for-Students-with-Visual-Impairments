<?php
include '../config2.php';

if(isset($_POST['deleteSend'])){
    $unique = $_POST['deleteSend'];
    
    $old_pic = retrieve("SELECT plink FROM subjek WHERE sub_id = $unique")[0]["plink"];
    unlink("../uploads/" . explode("../uploads/", $old_pic)[1]);

    $sql="DELETE FROM subjek WHERE sub_id=$unique";
    $result = query($sql);
}
