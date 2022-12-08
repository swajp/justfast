<?php

function emptyInputRoomOwner($roomOwner){
    $result;
    if (empty($roomOwner)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidRoomOwner($roomOwner){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $roomOwner)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function roomOwnerExists($conn, $roomOwner){
    $sql = "SELECT * FROM temprooms WHERE roomOwner = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../createroom.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $roomOwner);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function generateRoom($conn, $roomName, $roomOwner, $roomCode){
    $sql = "INSERT INTO temprooms (roomName, roomOwner, roomCode) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../createroom.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $roomName, $roomOwner, $roomCode);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../room.php?id=$roomName");
    exit();
}
