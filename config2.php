<?php 

$con = mysqli_connect("localhost", "id17880731__projectquiz", "Projectquiz2021111-", "id17880731__2021projectquiz");
// $con = mysqli_connect("localhost", "root", "", "projectvi");
if (mysqli_connect_errno()) {
    echo "Error: " . mysqli_connect_error();
    exit();
}

function retrieve($query) {
    global $con;
    $res = mysqli_query($con, $query);
    if (!$res) echo ("Error: " . mysqli_error($con));

    $items = [];
    while ($item = mysqli_fetch_assoc($res)) {
        $items[] = $item;
    }

    return $items;
}

function query($query) {
    global $con;
    $res = mysqli_query($con, $query);
    if (!$res) echo("Error: " . mysqli_error($con));
}