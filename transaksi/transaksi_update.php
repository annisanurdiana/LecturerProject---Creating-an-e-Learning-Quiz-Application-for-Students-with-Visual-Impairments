<?php
include '../config.php';

if(isset($_POST['updateId'])){
    $admin_Id = $_POST['updateId'];

    // Akses semua data yang ada di 'tid' di dalam table transaksi
    $sql="SELECT * FROM transaksi WHERE tid=$admin_Id";
    // 
    $result = mysqli_query($link,$sql);
    $response = array();
    while($row=mysqli_fetch_assoc($result)){
        $response = $row;
    }
    // Dengan JSON kita akan mendapatkan output data yang dibutuhkan
    echo json_encode($response);
} else {
    $response['status'] = 200;
    $response['message'] = "Invalid or Data not Found!";
}

// Update Query
if(isset($_POST['hiddenData'])){
    $uniqueNum = $_POST['hiddenData'];
    $uid_user = $_POST['uid_user_update'];
    $sid_soal = $_POST['sid_soal_update'];
    $js = $_POST['js_update'];
    $wj = $_POST['wj_update'];
    $st = $_POST['st_update'];
    $ket = $_POST['ket_update'];
    $sql="UPDATE transaksi SET uid_user = '$uid_user', sid_soal='$sid_soal', js = '$js', wj = '$wj', st='$st', ket = '$ket' WHERE tid = $uniqueNum";
    $result = mysqli_query($link,$sql);
}

?>
