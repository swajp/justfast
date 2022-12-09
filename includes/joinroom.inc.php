<?php

if ($_POST['submit']){

    $username = $_POST['username'];
    $roomCode = $_POST['roomcode'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputCode($username, $roomCode) !== false ) {
        header("location: ../joinroom.php?error=emptyinput");
        exit();
    }
    if (invalidUsername($username) !== false) {
        header("location: ../joinroom.php?error=invalidroomwner");
        exit();
    }
    if (usernameExists($conn, $username) !== false) {
        header("location: ../joinroom.php?error=usernameexists");
        exit();
    }
    createUser($conn, $username);
    joinRoom($conn, $roomCode);
}
else {
    header("location: ../joinroom.php");
    exit();
}