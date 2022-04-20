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
  <title>SI - Database Subjek</title>
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
    <a class="navbar-brand nav-link" href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false"> Sistem
      Informasi
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
        <li class="nav-item active">
          <a class="nav-link active" href="../subjek/subjek.php">Database Subjek</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../transaksi/transaksi.php">Database Transaksi</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- New Add Modal -->
  <div class="modal fade" id="newsubjekModal" tabindex="-1" aria-labelledby="newsubjekModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newsubjekModalLabel">Add New subject</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="ns_pg" placeholder="Masukkan nama subjek...">
            <label for="ns_pg">Nama Subjek</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="lv_pg" placeholder="Masukkan level...">
            <label for="lv_pg">Level</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="ds_pg" placeholder="Deskripsi subjek...">
            <label for="ds_pg">Deskripsi subjek</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="d2s_pg" placeholder="Deskripsi subjek 2...">
            <label for="d2s_pg">Deskripsi subjek 2</label>
          </div>
          <label for="plink_pg" class="mb-2">Upload cover photo</label>
          <input type="file" class="form-control" id="plink_pg" placeholder="link photo">
          <div class="img-prv-con mt-2">
            <img src="https://everythingisviral.com/wp-content/uploads/2020/10/polite-cat.png" id="img-prv">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" onclick="add_new()">Submit</button>
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
            <input type="text" class="form-control" id="ns_update" placeholder="Masukkan nama subjek...">
            <label for="ns_update">Nama subjek</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="lv_update" placeholder="Masukkan level...">
            <label for="lv_update">Level</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="ds_update" placeholder="Deskripsi subjek...">
            <label for="ds_update">Deskripsi subjek</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="d2s_update" placeholder="Deskripsi subjek 2...">
            <label for="d2s_update">Deskripsi subjek 2</label>
          </div>
          
          <label for="plink_update" class="mb-2">Upload cover photo</label>
          <input type="file" class="form-control" id="plink_update" placeholder="link photo">
          <div class="img-prv-con mt-2">
            <img id="img-prv-update">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" onclick="updateDetails()">Update</button>
          <input type="hidden" id="hiddenData">
        </div>
      </div>
    </div>
  </div>

  <!-- Header Page / Judul Halaman -->
  <div class="container my-4">
    <h1 class="text-center" id="greeting"></h1>
    <!-- Pop Up - New modal -->
    <button type="button" class="btn btn-dark my-4" data-bs-toggle="modal" data-bs-target="#newsubjekModal"><i
        class="fas fa-address-card"></i>
      Add subject
    </button>
    <!-- LIVE SEARCH -->
    <input class="m-3 p-1" style="width: 80%;" name="keyword" type="search" id="keyword" onkeyup="mySearch()" placeholder="Search nama subjek, level...." title="search">
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
    $(document).ready(function () {
      displayData();
    });
    
    $("#plink_pg").change(function () {
      $("#img-prv").attr("src", URL.createObjectURL(this.files[0]));
      $("#img-prv").show();
    });

    // Display Data
    function displayData() {
      let displayData = "true";
      $.ajax({
        url: "subjek_display.php",
        type: 'post',
        data: {
          displaySend: displayData
        },
        success: function (data, status) {
          $('#displayDataTable').html(data);
        }
      });
    }

    function add_new() {
      // enter value only in the inside 
      let nsAdd = $('#ns_pg').val();
      let lvAdd = $('#lv_pg').val();
      let dsAdd = $('#ds_pg').val();
      let d2sAdd = $('#d2s_pg').val();
      let plinkAdd = document.getElementById('plink_pg').files[0];

      let form = new FormData();
      form.append("nsSend", nsAdd);
      form.append("lvSend", lvAdd);
      form.append("dsSend", dsAdd);
      form.append("d2sSend", d2sAdd);
      form.append("plinkSend", plinkAdd);
      console.log(plinkAdd);

      // >> AJAX - Get Data from Server <<
      // The data who has inserted above will be stored here.
      $.ajax({
        url: 'subjek_insert.php',
        type: 'post',
        data: form,
        contentType: false,
        processData: false,
        success: function (data, status) {
          // check status
          console.log(status);

          // reset
          $("#ns_pg").val("");
          $("#lv_pg").val("");
          $("#ds_pg").val("");
          $("#d2s_pg").val("");
          $("#plink_pg").val("");
          $("#img-prv").hide();

          // When we have submitted the modal pop up will disappear without us having to click close
          $('#newsubjekModal').modal('hide')
          // function to display data
          displayData()
        }
      });
    }

    // Delete Record
    function deleteUser(deleteNum) {
      $.ajax({
        url: "subjek_delete.php",
        type: 'post',
        data: {
          deleteSend: deleteNum
        },
        success: function (data, status) {
          displayData();
        }
      });
    }

    //------------------------------------------------------//

    // Update Function
    function getDetails(updateId) {
      $('#hiddenData').val(updateId);
      $.post("subjek_update.php", {
        updateId: updateId
      }, function (data, status) {
        // mengambil data sesuai id yang telah ditentukan dan menyimpan nya kembali ke dalam database 
        let updateId = JSON.parse(data);
        $('#ns_update').val(updateId.ns);
        $('#lv_update').val(updateId.lv);
        $('#ds_update').val(updateId.ds);
        $('#d2s_update').val(updateId.d2s);
        if (updateId.plink === "-") $('#img-prv-update').hide();
        $('#img-prv-update').attr("src", updateId.plink);
      });
      $('#updateModal').modal("show");
    }

    $("#plink_update").change(function () {
      $("#img-prv-update").attr("src", URL.createObjectURL(this.files[0]));
    });
    // onclick update event function - update data
    function updateDetails() {
      let ns_update = $('#ns_update').val();
      let lv_update = $('#lv_update').val();
      let ds_update = $('#ds_update').val();
      let d2s_update = $('#d2s_update').val();
      let plink_update = document.getElementById("plink_update").files[0];
      let hiddenData = $('#hiddenData').val();

      let form = new FormData();
      form.append("ns_update", ns_update);
      form.append("lv_update", lv_update);
      form.append("ds_update", ds_update);
      form.append("d2s_update", d2s_update);
      form.append("plink_update", plink_update);
      form.append("hiddenData", hiddenData);

      $.ajax({
        url: "subjek_update.php",
        type: 'post',
        data: form,
        contentType: false,
        processData: false,
        success: function (data, status) {
          $('#ns_update').val("");
          displayData();
        }
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
    xhttp.open("GET", "subjek_search.php?cari="+keyword+"","true");
    xhttp.send();
  }

  </script>
</body>

</html>