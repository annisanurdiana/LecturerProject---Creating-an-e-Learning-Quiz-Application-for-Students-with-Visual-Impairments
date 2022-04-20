<?php
include '../config.php';

if(isset($_POST['updateId'])){
    $admin_Id = $_POST['updateId'];

    // Akses semua data yang ada di 'sid' di dalam table soal
    $sql="SELECT * FROM soal WHERE sid = $admin_Id";
    $result = mysqli_query($link,$sql);
    $response = array();
    while($row=mysqli_fetch_assoc($result)){
        $response = $row;
    }
    echo json_encode($response);
} else {
    $response['status'] = 200;
    $response['message'] = "Invalid or Data not Found!";
}

// Update Query
if(isset($_POST['hiddenData'])){
    $uniqueNum = $_POST['hiddenData'];
    $isi = $_POST['isi_update'];
    $pil = $_POST['pil_update'];
    $mp3 = $_POST['mp3_update'];
    $jb = $_POST['jb_update'];
    $kt = $_POST['kt_update'];
    $wk = $_POST['wk_update'];
    $ss = $_POST['ss_update'];
    $lv = $_POST['lv_update'];
    $st = $_POST['st_update'];
    $ket= $_POST['ket_update'];
    $sql="UPDATE soal SET isi='$isi', pil='$pil', mp3='$mp3', jb='$jb', kt='$kt', wk='$wk', ss='$ss', lv='$lv', st='$st', ket='$ket' WHERE sid = $uniqueNum";
    $result = mysqli_query($link,$sql);
}

?>
