<?php
// Initialize the session
// session_start();
// if (!isset($_SESSION["gmail"])) {
//     header("Location: ../login_google.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>SI - Database Transaksi</title>
  <!-- Bootstrap CSS v5.0-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!--Get your own code at fontawesome.com-->
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body id="page-top" class="page_admin">

    <!-- Navbar -->
    <nav class="navbar sticky-top  navbar-expand-lg navbar-dark bg-dark">
        <!-- Nav Brand  -->
        <a class="navbar-brand nav-link" href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false">Sistem Informasi
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link"><i class='fas fa-school'></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../user/adminpage.php">Database User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../soal/soal.php">Database Soal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../subjek/subjek.php">Database Subjek</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="../transaksi/transaksi.php">Database Transaksi</a>
                </li>
            </ul>
        </div>
    </nav>
    
  <!-- New Add Modal -->
  <div class="modal fade" id="newTransaksiModal" tabindex="-1" aria-labelledby="newTransaksiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newTransaksiModalLabel">Add New Transaksi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="uid_user_pg" placeholder="Masukkan id...">
            <label for="uid_user_pg">Id User</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="sid_soal_pg" placeholder="Masukkan id...">
            <label for="sid_soal_pg">Id Soal</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="js_pg" placeholder="Jumlah soal...">
            <label for="js_pg">Jumlah Soal</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="wj_pg" placeholder="Waktu jawab...">
            <label for="wj_pg">Waktu Jawab</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="st_pg" placeholder="('0', 'process', 'resolved', '')">
            <label for="st_pg">Status</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="ket_pg" placeholder="Masukkan keterangan...">
            <label for="ket_pg">Keterangan</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" onclick= "add_new()">Submit</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Update Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateModalLabel">Update Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="uid_user_update" placeholder="Masukkan id...">
            <label for="uid_user_update">Id User</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="sid_soal_update" placeholder="Masukkan id...">
            <label for="sid_soal_update">Id Soal</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="js_update" placeholder="Jumlah soal...">
            <label for="js_update">Jumlah Soal</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="wj_update" placeholder="Waktu jawab...">
            <label for="wj_update">Waktu Jawab</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="st_update" placeholder="('0', 'process', 'resolved', '')">
            <label for="st_update">Status</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="ket_update" placeholder="Masukkan keterangan...">
            <label for="ket_update">Keterangan</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" onclick= "updateDetails()">Update</button>
          <input type="hidden" id="hiddenData"> 
        </div>
      </div>
    </div>
  </div>

  <!-- Header Page / Judul Halaman -->
  <div class="container my-4">
    <h1 class="text-center" id="greeting"></h1>
    <!-- Pop Up - New modal -->
    <button type="button" class="btn btn-dark my-4" data-bs-toggle="modal" data-bs-target="#newTransaksiModal"><i class="fas fa-address-card"></i> 
    Add Transaksi
    </button>
    <!-- LIVE SEARCH -->
    <input class="m-3 p-1" style="width: 80%;" name="keyword" type="search" id="keyword" onkeyup="mySearch()" placeholder="Search id user, id soal, status...." title="search">
    <!-- Animation Line -->
    <div class="rainbow"></div>
    <!-- Floating Button -->
    <div class="fab"title="go up"><a href="#" style="color: white;"><i class='fas fa-angle-double-up'></i>^</a></div>
    <!-- Display Table -->
    <div id="displayDataTable"> </div>
  </div>

  <!-- Bootstrap JS v5.0-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
  <!-- Jquery AJAX v3.6.0-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 


  <!-- AJAX JQUERY JS -->
  <script> 
  // Display data 
  $(document).ready(function(){
    displayData();
  });

  // Display Data
  function displayData(){
    let displayData = "true";
    $.ajax({
      url:"transaksi_display.php",
      type: 'post',
      data: { 
        displaySend:displayData
      },
      success:function(data,status){
        $('#displayDataTable').html(data);
      }
    });
  }

    function add_new(){
      // enter value only in the inside 
      let uid_userAdd = $('#uid_user_pg').val(); 
      let sid_soalAdd = $('#sid_soal_pg').val();
      let jsAdd = $('#js_pg').val();
      let wjAdd = $('#wj_pg').val();
      let stAdd = $('#st_pg').val();
      let ketAdd = $('#ket_pg').val();

      // >> AJAX - Get Data from Server <<
      // The data who has inserted above will be stored here.
      $.ajax({
        url:'transaksi_insert.php',
        type: 'post',
        data:{
          uid_userSend:uid_userAdd,
          sid_soalSend:sid_soalAdd,
          jsSend:jsAdd,
          wjSend:wjAdd,
          stSend:stAdd,
          ketSend:ketAdd
        },
        success: function(data, status){
          // check status
          console.log(status);
          // When we have submitted the modal pop up will disappear without us having to click close
          $('#newTransaksiModal').modal('hide')
          // function to display data
          displayData()
        }
      })
    }

  // Delete Record
  function deleteUser(deleteNum){
    $.ajax({
      url:"transaksi_delete.php",
      type:'post',
      data:{
        deleteSend:deleteNum
      },
      success:function(data, status){
        displayData();
      }
    });
  }

  //------------------------------------------------------//
  
  // Update Function
  function getDetails(updateId){
    $('#hiddenData').val(updateId);
    $.post("transaksi_update.php", {updateId:updateId},function(data,status){
      // mengambil data sesuai id yang telah ditentukan dan menyimpannya kembali pada database 
      let updateId = JSON.parse(data);
      $('#uid_user_update').val(updateId.uid_user);
      $('#sid_soal_update').val(updateId.sid_soal);
      $('#js_update').val(updateId.js);
      $('#wj_update').val(updateId.wj);
      $('#st_update').val(updateId.st);
      $('#ket_update').val(updateId.ket);
    });
    $('#updateModal').modal("show");
  }
  
    // onclick update event function - update data
    function updateDetails(){
      let uid_user_update = $('#uid_user_update').val();
      let sid_soal_update = $('#sid_soal_update').val();
      let js_update = $('#js_update').val();
      let wj_update = $('#wj_update').val();
      let st_update = $('#st_update').val();
      let ket_update = $('#ket_update').val();
      let hiddenData = $('#hiddenData').val();

      $.post("transaksi_update.php",{
        uid_user_update: uid_user_update,
        sid_soal_update: sid_soal_update,
        js_update: js_update,
        wj_update: wj_update,
        st_update: st_update,
        ket_update: ket_update,
        hiddenData: hiddenData
      }, function(data, status){
        $('#updateModal').modal('hide')
        displayData();
      });
    }

  // ------- AJAX LIVE SEARCH ----------- //

  function mySearch() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4) {
            if (xhttp.status == 200){
                document.getElementById("displayDataTable").innerHTML = xhttp.responseText;
            }
        }
    };
    var keyword = document.getElementById('keyword').value
    xhttp.open("GET", "transaksi_search.php?cari="+keyword+"","true");
    xhttp.send();
  }

  </script>
</body>
</html>