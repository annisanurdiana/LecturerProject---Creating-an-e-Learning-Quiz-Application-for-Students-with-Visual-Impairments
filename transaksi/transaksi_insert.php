<?php
include '../config.php';

extract($_POST);

if(isset($_POST['uid_userSend']) && isset($_POST['sid_soalSend']) && isset($_POST['jsSend']) && isset($_POST['wjSend']) && isset($_POST['stSend'])&& isset($_POST['ketSend'])){
    
    // Insert query insert into table name (user)
    $sql="INSERT INTO transaksi (uid_user,sid_soal,js,wj,st,ket) 
    values ('$uid_userSend', '$sid_soalSend', '$jsSend','$wjSend','$stSend','$ketSend')"; 

    $result = mysqli_query($link, $sql);
}
?>
