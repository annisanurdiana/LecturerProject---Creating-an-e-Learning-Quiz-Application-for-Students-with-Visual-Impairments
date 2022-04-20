<?php
include '../config.php';
$table = '<table class="table">
    <thead class="table-dark">
      <tr id="table-header">
        <th scope="col">No </th>
        <th scope="col">Id </th>
        <th scope="col">Username </th>
        <th scope="col">Email </th>
        <th scope="col"> <i class="fas fa-user-tie"></i> Tuser </th>
        <th scope="col"> <i class="far fa-clock"></i> Timestamp </th>
        <th scope="col"> <i class="fas fa-bell "></i> Status </th>
        <th scope="col"> <i class="fas fa-bullhorn"></i> Keterangan </th>
        <th scope="col"> <i class="fas fa-cog fa-pulse"></i> Setting</th>
      </tr>
    </thead>';
    $keyword = $_GET['cari'];
    $sql = "SELECT * FROM user WHERE uname LIKE '%$keyword%' OR email LIKE '%$keyword%' OR tuser LIKE '%$keyword%' OR st  LIKE '%$keyword%'";
    $result = mysqli_query($link, $sql);
    $number = 1;
    while($row=mysqli_fetch_assoc($result)){
      $uid = $row['uid'];
      $uname=$row['uname'];
      $email=$row['email'];
      $tuser=$row['tuser'];
      $ts=$row['ts'];
      $st=$row['st'];
      $ket=$row['ket'];
      $table.= ' <tr>
            <td scope="row">'.$number.' </td>
            <td>'.$uid.' </td>
            <td>'.$uname.' </td>
            <td>'.$email.' </td>
            <td>'.$tuser.' </td>
            <td>'.$ts.' </td>
            <td>'.$st.' </td>
            <td>'.$ket.' </td>
            <td>
            <button title="edit" class="btn btn-info" onclick="getDetails('.$uid.')"><i class="far fa-edit"></i></button>
            <button title="delete" class="btn btn-danger" onclick="deleteUser('.$uid.')"><i class="far fa-window-close"></i></button>
          </td>
        </tr>';
        $number++;
    }

$table .= '</table>';
echo $table; 
?>

