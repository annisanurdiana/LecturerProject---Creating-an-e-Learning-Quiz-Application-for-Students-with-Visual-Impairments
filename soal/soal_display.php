<?php
error_reporting(1);
include '../config.php';
if(isset($_POST['displaySend'])){
    $table = '<table class="table">
    <thead class="table-dark">
      <tr id="table-header">
        <th scope="col">No </th>
        <th scope="col">Isi </th>
        <th scope="col">A </th>
        <th scope="col">B </th>
        <th scope="col">C </th>
        <th scope="col">Mp3 </th>
        <th scope="col">Jb </th>
        <th scope="col">Kt </th>
        <th scope="col">Wk </th>
        <th scope="col">Ss </th>
        <th scope="col">Level </th>
        <th scope="col">Timestamp</th>
        <th scope="col">St </th>
        <th scope="col">Ket </th>
        <th scope="col">Set</th>
      </tr>
    </thead>';
    $sql = "SELECT * FROM soal";
    $result = mysqli_query($link, $sql);
    $number = 1;
    while($row=mysqli_fetch_assoc($result)){
      $sid = $row['sid'];
      $isi=$row['isi'];
      $pil=json_decode($row['pil'], true);

      $a = $pil["a"];
      $b = $pil["b"];
      $c = $pil["c"];

      $mp3=$row['mp3'];
      $jb=$row['jb'];
      $kt=$row['kt'];
      $wk=$row['wk'];
      $ss=$row['ss'];
      $lv=$row['lv'];
      $ts=$row['ts'];
      $st=$row['st'];
      $ket=$row['ket'];
      $table.= ' <tr>
            <td scope="row">'.$number.' </td>
            <td style="min-width: 100px; word-wrap: break-word">'.$isi.' </td>
            <td style="max-width: 300px; word-wrap: break-word">'.$a.' </td>
            <td style="max-width: 300px; word-wrap: break-word">'.$b.' </td>
            <td style="max-width: 300px; word-wrap: break-word">'.$c.' </td>
            <td>'.$mp3.' </td>
            <td>'.$jb.' </td>
            <td>'.$kt.' </td>
            <td>'.$wk.' </td>
            <td>'.$ss.' </td>
            <td>'.$lv.' </td>
            <td>'.$ts.' </td>
            <td>'.$st.' </td>
            <td>'.$ket.' </td>
            <td>
              <button title="edit" class="btn btn-info mb-3" onclick="getDetails('.$sid.')"><i class="far fa-edit"></i></button>
              <button title="delete" class="btn btn-danger" onclick="deleteUser('.$sid.')"><i class="far fa-window-close"></i></button>
            </td>
        </tr>';
        $number++;
    }
    $table .= '</table>';
    echo $table; 
}
?>

