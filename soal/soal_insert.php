<?php
include '../config.php';

extract($_POST);

if(isset($_POST['isiSend']) && isset($_POST['aSend']) && isset($_POST['bSend']) && isset($_POST['cSend']) && isset($_POST['mp3Send']) && isset($_POST['jbSend']) && isset($_POST['ktSend'])&& isset($_POST['wkSend']) && isset($_POST['ssSend']) && isset($_POST['lvSend']) && isset($_POST['stSend'])&& isset($_POST['ketSend'])){
    $pilSend = array();
    $pilSend["a"] = $_POST["aSend"];
    $pilSend["b"] = $_POST["bSend"];
    $pilSend["c"] = $_POST["cSend"];
    $pilSend = json_encode($pilSend);
    // Insert query insert into table name (soal)
    $sql="INSERT INTO soal(isi,pil,mp3,jb,kt,wk,ss,lv,st,ket) 
    values ('$isiSend', '$pilSend', '$mp3Send','$jbSend','$ktSend','$wkSend','$ssSend','$lvSend','$stSend','$ketSend')"; 

    $result = mysqli_query($link, $sql);
}
?>