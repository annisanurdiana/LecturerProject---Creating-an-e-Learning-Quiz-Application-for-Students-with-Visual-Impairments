<?php
// Initialize the session
require("../config2.php");
// session_start();
// if(isset($_POST["addsession"])) {
//     $gmail = $_POST["addsession"];
//     if (empty(retrieve("SELECT * FROM user WHERE email = '$gmail' AND tuser = '1'"))) {
//         header("Location: ../login_google.php");
//         exit();
//     } else {
//         $_SESSION["gmail"] = $_POST["addsession"];
//     }
// }
// elseif (!isset($_SESSION["gmail"])) {
//     header("Location: ../login_google.php");
// }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>SI - Database User</title>
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
        <a class="navbar-brand nav-link " href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false">Sistem informasi
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link"><i class='fas fa-school'></i></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="../user/adminpage.php">Database User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../soal/soal.php">Database Soal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../subjek/subjek.php">Database Subjek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../transaksi/transaksi.php">Database Transaksi</a>
                </li>
                <!--------- Live Search --------->
                <div class="nav-item m-1">
                  <!-- <input class="" name="keyword" type="search" id="keyword" onkeyup="mySearch()" placeholder="Search..." title="search"> -->
                </div>
            </ul>
        </div>
    </nav>
    
  <!-- New Add Modal -->
  <div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newUserModalLabel">Add New User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="uid_pg" placeholder="Masukkan user ID">
            <label for="uid_pg">Id</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="uname_pg" placeholder="Masukkan usernama">
            <label for="uname_pg">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email_pg" placeholder="name@example.com">
            <label for="email_pg">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="tuser_pg" placeholder="('0' = siswa, '1' = guru, '2' = admin, '')">
            <label for="tuser_pg">Tuser</label>
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
            <input type="text" class="form-control" id="uidUpdate" placeholder="Enter userID">
            <label for="uidUpdate">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="unameUpdate" placeholder="Enter Username">
            <label for="unameUpdate">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="emailUpdate" placeholder="name@example.com">
            <label for="emailUpdate">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="tuserUpdate" placeholder="tuser">
            <label for="tuserUpdate">tuser</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="stUpdate" placeholder="('0', 'process', 'resolved', '')">
            <label for="stUpdate">Status</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="ketUpdate" placeholder="Masukkan keterangan...">
            <label for="ketUpdate">Keterangan</label>
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
    <button type="button" class="btn btn-dark my-4" data-bs-toggle="modal" data-bs-target="#newUserModal"><i class="fas fa-address-card"></i> 
    Add User
    </button>
    <!-- LIVE SEARCH -->
    <input class="m-3 p-1" style="width: 80%;" name="keyword" type="search" id="keyword" onkeyup="mySearch()" placeholder="Search username, email, user, status...." title="search">
    <!-- Animation Line -->
    <div class="rainbow"></div>
    <!-- Floating Button -->
    <div class="fab" title="go up"><a href="#" style="color: white;"><i class='fas fa-angle-double-up'></i>^</a></div>
    <!-- Display Table -->
    <div id="displayDataTable"> </div>
  </div>

  <!-- Local Js -->
  <script src="assets/js/script.js"></script>
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
      url:"adminpage_display.php",
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
    let uidAdd = $("#uid_pg").val();
    let unameAdd = $('#uname_pg').val(); 
    let emailAdd = $('#email_pg').val();
    let tuserAdd = $('#tuser_pg').val();
    let stAdd = $('#st_pg').val();
    let ketAdd = $('#ket_pg').val();

    // >> AJAX - Get Data from Server <<
    // The data who has inserted above will be stored here.
    $.ajax({
      url:'adminpage_insert.php',
      type: 'post',
      data:{
        uidSend:uidAdd,
        unameSend:unameAdd,
        emailSend:emailAdd,
        tuserSend:tuserAdd,
        stSend:stAdd,
        ketSend:ketAdd
      },
      success: function(data, status){
        // check status
        console.log(status);
        // When we have submitted the modal pop up will disappear without us having to click close
        $('#newUserModal').modal('hide')
        // function to display data
        displayData()
      }
    })
  }

  // Delete Record
  function deleteUser(deleteNum){
    $.ajax({
      url:"adminpage_delete.php",
      type:'post',
      data:{
        deleteSend:deleteNum
      },
      success:function(data, status){
        displayData();
      }
    });
  }

  // Update Function
  function getDetails(updateId){
    $('#hiddenData').val(updateId);
    $.post("adminpage_update.php", {updateId:updateId},function(data,status){
      // mengambil data sesuai id yang telah ditentukan dan menyimpannya kembali pada database 
      let updateId = JSON.parse(data);
      $('#uidUpdate').val(updateId.uid);
      $('#unameUpdate').val(updateId.uname);
      $('#emailUpdate').val(updateId.email);
      $('#tuserUpdate').val(updateId.tuser);
      $('#stUpdate').val(updateId.st);
      $('#ketUpdate').val(updateId.ket);
    });
    $('#updateModal').modal("show");
  }
  
    // onclick update event function - update data
    function updateDetails(){
      let uidUpdate = $('#uidUpdate').val();
      let unameUpdate = $('#unameUpdate').val();
      let emailUpdate = $('#emailUpdate').val();
      let tuserUpdate = $('#tuserUpdate').val();
      let stUpdate = $('#stUpdate').val();
      let ketUpdate = $('#ketUpdate').val();
      let hiddenData = $('#hiddenData').val();

      $.post("adminpage_update.php",{
        uidUpdate: uidUpdate,
        unameUpdate: unameUpdate,
        emailUpdate: emailUpdate,
        tuserUpdate: tuserUpdate,
        stUpdate: stUpdate,
        ketUpdate: ketUpdate,
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
    xhttp.open("GET", "adminpage_search.php?cari="+keyword+"","true");
    xhttp.send();
  }

  </script>
</body>
</html>