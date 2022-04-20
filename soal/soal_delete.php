<?php
include '../config.php';

if(isset($_POST['deleteSend'])){
    $unique = $_POST['deleteSend'];

    $sql="DELETE FROM soal WHERE sid=$unique";
    $result = mysqli_query($link,$sql);
}

?>