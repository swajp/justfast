<?php

if ($_POST['submit']){
    $roomName = md5($_POST['username']);
    $roomCode = "58";
    $roomOwner = $_POST['username'];


require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (emptyInputRoomOwner($roomOwner) !== false) {
    header("location: ../createroom.php?error=emptyinput");
    exit();
}
if (invalidRoomOwner($roomOwner) !== false) {
    header("location: ../createroom.php?error=invalidroomwner");
    exit();
}
if (roomOwnerExists($conn, $roomOwner) !== false) {
    header("location: ../createroom.php?error=roomownerexists");
    exit();
}

generateRoom($conn, $roomName, $roomOwner, $roomCode);

}
else {
    header("location: ../createroom.php");
    exit();
}