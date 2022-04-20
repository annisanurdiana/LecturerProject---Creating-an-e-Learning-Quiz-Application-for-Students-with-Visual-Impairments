<?php
include '../config.php';

if(isset($_POST['deleteSend'])){
    $unique = $_POST['deleteSend'];

    $sql="DELETE FROM transaksi WHERE tid=$unique";
    $result = mysqli_query($link,$sql);
}

?>