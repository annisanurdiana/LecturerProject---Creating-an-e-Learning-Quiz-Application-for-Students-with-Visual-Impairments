<?php
include '../config2.php';

if(isset($_POST['nsSend']) && isset($_POST['lvSend']) && isset($_POST['dsSend']) && isset($_POST['d2sSend'])){
    $nsSend = $_POST['nsSend'];
    $lvSend = $_POST['lvSend'];
    $dsSend = $_POST["dsSend"];
    $d2sSend = $_POST["d2sSend"];

    if (isset($_FILES["plinkSend"]["name"])) {
        $filename = uniqid() . "-" . time();
        $split = explode(".", $_FILES["plinkSend"]["name"]);
        $ext = end($split);
        $location = "../uploads/" . $filename . "." . $ext;
        $locationDB = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . "/../../uploads/" . $filename . "." . $ext;
        move_uploaded_file($_FILES['plinkSend']['tmp_name'], $location);
        query("INSERT INTO subjek (ns, lv, ds, d2s, plink)
                VALUES ('$nsSend', $lvSend, '$dsSend', '$d2sSend', '$locationDB')");
    } else {
        query("INSERT INTO subjek (ns, lv, ds, d2s)
                VALUES ('$nsSend', $lvSend, '$dsSend', '$d2sSend')");
    }
}