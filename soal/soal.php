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
  <title>SI - Database Soal</title>
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
                <li class="nav-item active">
                    <a class="nav-link active" href="../soal/soal.php">Database Soal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../subjek/subjek.php">Database Subjek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../transaksi/transaksi.php">Database Transaksi</a>
                </li>
            </ul>
        </div>
    </nav>
    
  <!-- New Add Modal -->
  <div class="modal fade" id="newsoalModal" tabindex="-1" aria-labelledby="newsoalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newsoalModalLabel">Add New Question</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="isi_pg" placeholder="Masukkan isi...">
            <label for="isi_pg">Isi</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="a_pg" placeholder="Pilihan...">
            <label for="a_pg">A</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="b_pg" placeholder="Pilihan...">
            <label for="b_pg">B</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="c_pg" placeholder="Pilihan...">
            <label for="c_pg">C</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="mp3_pg" placeholder="Mp3...">
            <label for="mp3_pg">Mp3</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="jb_pg" placeholder="Waktu jawab...">
            <label for="jb_pg">Jb</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="kt_pg" placeholder="...">
            <label for="kt_pg">Kt</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="wk_pg" placeholder="Masukkan Kt...">
            <label for="wk_pg">Wk</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="ss_pg" placeholder="...">
            <label for="ss_pg">Ss</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="lv_pg" placeholder="Masukkan Lv...">
            <label for="lv_pg">Lv</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="st_pg" placeholder="...">
            <label for="st_pg">St</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="ket_pg" placeholder="Masukkan ket...">
            <label for="ket_pg">Ket</label>
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
            <input type="text" class="form-control" id="isi_update" placeholder="Masukkan isi...">
            <label for="isi_update">Isi</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="a_update" placeholder="Masukkan pilihan A...">
            <label for="a_update">A</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="b_update" placeholder="Masukkan pilihan B...">
            <label for="b_update">B</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="c_update" placeholder="Masukkan pilihan C...">
            <label for="c_update">C</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="mp3_update" placeholder="Upload Mp3...">
            <label for="mp3_update">Upload Mp3</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="jb_update" placeholder="Masukkan Jb...">
            <label for="jb_update">Jb</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="kt_update" placeholder="Masukkan Kt...">
            <label for="kt_update">Kt</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="wk_update" placeholder="Masukkan Wk...">
            <label for="wk_update">Wk</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="ss_pg" placeholder="Masukkan Ss...">
            <label for="ss_update">Ss</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="lv_update" placeholder="Masukkan Lv...">
            <label for="lv_update">Level</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="st_update" placeholder="Masukkan St...">
            <label for="st_update">Status</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="ket_update" placeholder="Masukkan ket...">
            <label for="ket_update">Ket</label>
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
  <div class="container-fluid my-4" id="maincon">
    <h1 class="text-center" id="greeting"></h1>
    <!-- Pop Up - New modal -->
    <button type="button" class="btn btn-dark my-4" data-bs-toggle="modal" data-bs-target="#newsoalModal"><i class="fas fa-address-card"></i> 
    Add Question
    </button>
    <!-- LIVE SEARCH -->
    <input class="m-3 p-1" style="width: 80%;" name="keyword" type="search" id="keyword" onkeyup="mySearch()" placeholder="Search isi soal, kategori, level...." title="search">
    <!-- Animation Line -->
    <div class="rainbow"></div>
    <!-- Floating Button -->
    <div class="fab" title="go up"><a href="#" style="color: white;"><i class='fas fa-angle-double-up'></i>^</a></div>
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
      url:"soal_display.php",
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
      let isiAdd = $('#isi_pg').val(); 
      let aAdd = $('#a_pg').val();
      let bAdd = $('#b_pg').val();
      let cAdd = $('#c_pg').val();
      let mp3Add = $('#mp3_pg').val();
      let jbAdd = $('#jb_pg').val();
      let ktAdd = $('#kt_pg').val();
      let wkAdd = $('#wk_pg').val();
      let ssAdd = $('#ss_pg').val();
      let lvAdd = $('#lv_pg').val();
      let stAdd = $('#st_pg').val();
      let ketAdd = $('#ket_pg').val();

      // >> AJAX - Get Data from Server <<
      // The data who has inserted above will be stored here.
      $.ajax({
        url:'soal_insert.php',
        type: 'post',
        data:{
          isiSend:isiAdd,
          aSend: aAdd,
          bSend: bAdd,
          cSend: cAdd,
          mp3Send:mp3Add,
          jbSend:jbAdd,
          ktSend:ktAdd,
          wkSend:wkAdd,
          ssSend:ssAdd,
          lvSend:lvAdd,
          stSend:stAdd,
          ketSend:ketAdd,
        },
        success: function(data, status){
          // check status
          console.log(status);
          // When we have submitted the modal pop up will disappear without us having to click close
          $('#newsoalModal').modal('hide')
          // function to display data
          displayData()
        }
      })
    }

  // Delete Record
  function deleteUser(deleteNum){
    $.ajax({
      url:"soal_delete.php",
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
    $.post("soal_update.php", {updateId:updateId},function(data,status){
      let updateId = JSON.parse(data);
      let pilihan = JSON.parse(updateId.pil);
      $('#isi_update').val(updateId.isi); 
      $('#a_update').val(pilihan.a);
      $('#b_update').val(pilihan.b);
      $('#c_update').val(pilihan.c);
      $('#mp3_update').val(updateId.mp3);
      $('#jb_update').val(updateId.jb);
      $('#kt_update').val(updateId.kt);
      $('#wk_update').val(updateId.wk);
      $('#ss_update').val(updateId.ss);
      $('#lv_update').val(updateId.lv);
      $('#st_update').val(updateId.st);
      $('#ket_update').val(updateId.ket);
    });
    $('#updateModal').modal("show");
  }
  
    // onclick update event function - update data
    function updateDetails(){
      let isi_update = $('#isi_update').val(); 
      let pil_update = JSON.stringify({
        a: $('#a_update').val(),
        b: $('#b_update').val(),
        c: $('#c_update').val(),
      }); 
      let mp3_update = $('#mp3_update').val();
      let jb_update = $('#jb_update').val();
      let kt_update = $('#kt_update').val();
      let wk_update = $('#wk_update').val();
      let ss_update = $('#ss_update').val();
      let lv_update = $('#lv_update').val();
      let st_update = $('#st_update').val();
      let ket_update = $('#ket_update').val();
      let hiddenData = $('#hiddenData').val();

      $.post("soal_update.php",{
          isi_update:isi_update,
          pil_update:pil_update,
          mp3_update:mp3_update,
          jb_update:jb_update,
          kt_update:kt_update,
          wk_update:wk_update,
          ss_update:ss_update,
          lv_update:lv_update,
          st_update:st_update,
          ket_update:ket_update,
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
    xhttp.open("GET", "soal_search.php?cari="+keyword+"","true");
    xhttp.send();
  }

  </script>
</body>
</html>