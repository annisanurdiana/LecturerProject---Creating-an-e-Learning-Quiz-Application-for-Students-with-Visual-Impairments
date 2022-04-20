<?php
include '../config.php';

if(isset($_POST['updateId'])){
    $admin_Id = $_POST['updateId'];

    // Akses semua data yang ada di 'uid' di dalam table user
    $sql="SELECT * FROM user WHERE uid=$admin_Id";
    // 
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
    $uid = $_POST['uidUpdate'];
    $uname = $_POST['unameUpdate'];
    $email = $_POST['emailUpdate'];
    $tuser = $_POST['tuserUpdate'];
    $st = $_POST['stUpdate'];
    $ket = $_POST['ketUpdate'];
    $sql="UPDATE user SET uid = '$uid', uname = '$uname', email='$email', tuser = '$tuser', st='$st', ket = '$ket' WHERE uid = $uniqueNum";
    $result = mysqli_query($link,$sql);
}

?>
