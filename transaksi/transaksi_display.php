<?php
include '../config.php';
if(isset($_POST['displaySend'])){
    $table = '<table class="table">
    <thead class="table-dark">
      <tr id="table-header">
        <th scope="col">No </th>
        <th scope="col">uid_user </th>
        <th scope="col">sid_soal </th>
        <th scope="col">Jumlah Soal </th>
        <th scope="col">Waktu Jawab </th>
        <th scope="col"> <i class="far fa-clock"></i> Timestamp </th>
        <th scope="col"> <i class="fas fa-bell "></i> Status </th>
        <th scope="col"> <i class="fas fa-bullhorn"></i> Keterangan </th>
        <th scope="col"> <i class="fas fa-cog fa-pulse"></i> Setting</th>
      </tr>
    </thead>';
    $sql = "SELECT * FROM transaksi";
    $result = mysqli_query($link, $sql);
    $number = 1;
    while($row=mysqli_fetch_assoc($result)){
      $tid = $row['tid'];
      $uid_user=$row['uid_user'];
      $sid_soal=$row['sid_soal'];
      $js=$row['js'];
      $wj=$row['wj'];
      $ts=$row['ts'];
      $st=$row['st'];
      $ket=$row['ket'];
      $table.= ' <tr>
            <td scope="row">'.$number.' </td>
            <td>'.$uid_user.' </td>
            <td>'.$sid_soal.' </td>
            <td>'.$js.' </td>
            <td>'.$wj.' </td>
            <td>'.$ts.' </td>
            <td>'.$st.' </td>
            <td>'.$ket.' </td>
            <td>
              <button title="edit" class="btn btn-info" onclick="getDetails('.$tid.')"><i class="far fa-edit"></i></button>
              <button title="delete" class="btn btn-danger" onclick="deleteUser('.$tid.')"><i class="far fa-window-close"></i></button>
            </td>
        </tr>';
        $number++;
    }
    $table .= '</table>';
    echo $table; 
}
?>

