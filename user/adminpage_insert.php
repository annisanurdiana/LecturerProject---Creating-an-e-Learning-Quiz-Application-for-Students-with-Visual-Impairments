<?php
include '../config.php';

extract($_POST);

if(isset($_POST["uidSend"]) && isset($_POST['unameSend']) && isset($_POST['emailSend']) && isset($_POST['tuserSend']) && isset($_POST['stSend'])&& isset($_POST['ketSend'])){
    
    // Insert query insert into table name (user)
    $sql="INSERT INTO user (uid, uname,email,tuser,st,ket) 
    values ('$uidSend', '$unameSend', '$emailSend', '$tuserSend','$stSend','$ketSend')"; 

    $result = mysqli_query($link, $sql);
}
?>
