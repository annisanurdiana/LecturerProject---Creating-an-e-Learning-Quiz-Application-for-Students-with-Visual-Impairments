<?php
session_start();
if (isset($_SESSION["gmail"])) {
    session_unset();
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="316184486293-to8per6c9ujhpg8do3frh03mmqgperdd.apps.googleusercontent.com">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <style>
    .data {
        display: none;
        text-align: center;
    }
    .g-signin2 {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -50px;
        margin-left: -50px;
    }
    h2{
        text-align: center;
        margin-top: 10%;
        font-size: 35px;
        font-weight: 200;
    }
    </style>
</head>
<body>
    
    <h1 class="alert">Sistem Administrasi Quiz Tunanetra</h1>
    <h2 class="alert">Sign-In With Google</h2>
    <div class="g-signin2" data-onsuccess="onSignIn" onclick="onSignIn();"></div>

    <div class="data">
        <p><b>Name</b></p>
        <p id="name"></p>
        <p><b>Image</b></p>
        <img id="image" class="rounded-circle" width="100" height="100" />
        <p><b>Email</b></p>
        <p id="email"></p>
        <button type="button" class="btn btn-danger" onclick="signOut();">Sign Out</button>
        <div class="mt-3">
            <form method="post" action="user/adminpage.php">
                <button id="addsession" name="addsession" type="submit" class="btn btn-info">Go to Adminpage</button>
            </form>
        </div>
    </div>

    <!-- =============== SCRIPT =============- -->
    <script>
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        $("#name").text(profile.getName());
        $("#email").text(profile.getEmail());
        $("#image").attr('src', profile.getImageUrl());
        $(".data").css("display", "block");
        $(".g-signin2").css("display", "none");
        $("#addsession").val(profile.getEmail());
    }
    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            alert("You have been signed out successfully");
            $(".data").css("display", "none");
            $(".g-signin2").css("display", "block");
        });
    }
    </script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>



<!-- 

EXPLANATION:
    
>> onSignIn() >> This function retrieved the user data using the googleUser.getBasicProfile() function and 
stored the data in the “profile” variable. After that, retrieved the “Name, ImageUrl, & Email ID” 
and display that in HTML with the help of “id”. 

<< SignOut() << This function Sign Out the user from the website and hide the data. 
This function will not Sign Out you from Google. 
It just Sign Out you from the particular website only. 

-->