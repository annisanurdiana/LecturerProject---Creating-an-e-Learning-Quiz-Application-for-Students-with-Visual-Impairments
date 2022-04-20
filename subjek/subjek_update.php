<?php
include '../config.php';

if(isset($_POST['updateId'])){
    $admin_Id = $_POST['updateId'];

    // Akses semua data yang ada di 'sub_id' di dalam table subjek
    $sql="SELECT * FROM subjek WHERE sub_id=$admin_Id";
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

include "../config2.php";
if(isset($_POST['hiddenData'])){
    $uniqueNum = $_POST['hiddenData'];
    $ns = $_POST['ns_update'];
    $lv = $_POST['lv_update'];
    $ds = $_POST['ds_update'];
    $d2s = $_POST['d2s_update'];
    
    if (isset($_FILES["plink_update"]["name"])) {
        $old_pic = retrieve("SELECT plink FROM subjek WHERE sub_id = $uniqueNum")[0]["plink"];
        unlink("../uploads/" . explode("../uploads/", $old_pic)[1]);
        $filename = uniqid() . "-" . time();
        $split = explode(".", $_FILES["plink_update"]["name"]);
        $ext = end($split);
        $location = "../uploads/" . $filename . "." . $ext;
        $locationDB = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . "/../../uploads/" . $filename . "." . $ext;
        move_uploaded_file($_FILES['plink_update']['tmp_name'], $location);

        query("UPDATE subjek SET 
                ns = '$ns',
                lv = $lv,
                ds = '$ds',
                d2s = '$d2s',
                plink = '$locationDB'
                WhERE sub_id = $uniqueNum");
    } else {
        query("UPDATE subjek SET 
        ns = '$ns',
        lv = $lv,
        ds = '$ds',
        d2s = '$d2s'
        WhERE sub_id = $uniqueNum");
    }
}

?>
