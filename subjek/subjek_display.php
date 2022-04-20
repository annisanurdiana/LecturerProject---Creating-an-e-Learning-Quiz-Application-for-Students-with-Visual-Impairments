<?php
include '../config.php';
if(isset($_POST['displaySend'])){
    $table = '<table class="table">
    <thead class="table-dark">
      <tr id="table-header">
        <th scope="col">No </th>
        <th scope="col"> Name_s <i class="fas fa-book-reader"></i> </th>
        <th scope="col">Level </th>
        <th scope="col">Ds </th>
        <th scope="col">Ds 2 </th>
        <th scope="col">  <i class="fas fa-image"></i> Link Photo </th>
        <th scope="col"> <i class="fas fa-cog fa-pulse"></i> Setting </th>
      </tr>
    </thead>';
    $sql = "SELECT * FROM subjek";
    $result = mysqli_query($link, $sql);
    $number = 1;
    while($row=mysqli_fetch_assoc($result)){
      $sub_id = $row['sub_id'];
      $ns=$row['ns'];
      $lv=$row['lv'];
      $ds=$row['ds'];
      $d2s=$row['d2s'];
      $plink=$row['plink'];
      $table.= ' <tr>
            <td scope="row">'.$number.' </td>
            <td>'.$ns.' </td>
            <td>'.$lv.' </td>
            <td>'.$ds.' </td>
            <td>'.$d2s.' </td>
            <td>'.$plink.' </td>
            <td>
              <button title="edit" class="btn btn-info" onclick="getDetails('.$sub_id.')"><i class="far fa-edit"></i></button>
              <button title="delete" class="btn btn-danger" onclick="deleteUser('.$sub_id.')"><i class="far fa-window-close"></i></button>
            </td>
        </tr>';
        $number++;
    }
    $table .= '</table>';
    echo $table; 
}
?>