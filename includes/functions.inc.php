<?php

function emptyInputUsername($username){
    $result;
    if (empty($username)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyInputCode($username, $roomCode){
    $result;
    if (empty($username) || empty($roomCode)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUsername($username){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidCode($conn ,$roomCode){
    $sql = "SELECT * FROM temprooms WHERE roomCode = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $roomCode);
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

function usernameExists($conn, $username){
    $sql = "SELECT * FROM tempusers WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../createroom.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
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

function createUser($conn, $username){
    $sql = "INSERT INTO tempusers (username) VALUES (?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../createroom.php?error=stmtfailed");
        echo $sql;
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    session_start();
    $_SESSION['username'] = $username;
}

function createRoom($conn, $roomOwner, $roomName, $roomCode){
    $sql = "INSERT INTO temprooms (roomOwner, roomName, roomCode) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../createroom.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $roomOwner, $roomName, $roomCode);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    session_start();
    $_SESSION['connectedRoomName'] = $roomName;
    $_SESSION['connectedRoomCode'] = $roomCode;
    $_SESSION['connectedRoomOwner'] = $roomOwner;
    header("location: ../room.php?id=$roomName");
    exit();
}

function joinRoom ($conn, $roomCode){
    $sql = "SELECT * FROM temprooms WHERE roomCode = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../joinroom.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $roomCode);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        session_start();
        $_SESSION['connectedRoomName'] = $row['roomName'];
        $_SESSION['connectedRoomCode'] = $row['roomCode'];
        $_SESSION['connectedRoomOwner'] = $row['roomOwner'];
        header("location: ../room.php?id=".$row['roomName']."");
        exit();
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

