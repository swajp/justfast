<?php

if ($_POST['submit']){

    $roomOwner = $_POST['username'];
    $username = $_POST['username'];
    $roomName = md5($_POST['username']);
    $roomCode = "58";

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputUsername($username) !== false) {
        header("location: ../createroom.php?error=emptyinput");
        exit();
    }
    if (invalidUsername($username) !== false) {
        header("location: ../createroom.php?error=invalidroomwner");
        exit();
    }
    if (usernameExists($conn, $username) !== false) {
        header("location: ../createroom.php?error=roomownerexists");
        exit();
    }

    createUser($conn, $username);
    createRoom($conn, $roomOwner, $roomName, $roomCode);

}

else {
    header("location: ../createroom.php");
    exit();
}