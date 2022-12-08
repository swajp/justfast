<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/images/logo.svg">
    <link rel="stylesheet" href="styles/style.css">
    <title>justfast | beta </title>
</head>
<body>
<div class="logo">
    <img src="images/logo.svg">
</div>
<div class="container">
    <?php
    if (isset($_POST['join-room'])){
        echo "
        <form class='content' method='post'>
            <input class='input__black' type='text' placeholder='Enter room code...' name='' id=''>
            <button class='button__white' name='join-room-button'>Connect to the room</button>
        </form>
        ";
    }
    else if (isset($_POST['create-room'])){
        echo "<p>Creating room...</p>";
    }
    else if (isset($_POST['join-room-button'])){
        echo "<p>Connecting to the room...</p>>";
    }
    else if (!isset($_POST['join-room']) || !isset($_POST['create-room'])){
        echo "
        <form class='content' method='post'>
            <button class='button__black' name='join-room'>Join existing room</button>
            <button class='button__white' name='create-room'>Create new room</button>
        </form>
        ";
    }

    ?>
</div>
<footer>
    <div class="buycoffe-container">
        <a href="#"><button class='button__buycoffe'><span>☕</span>Buy Me a Coffee</button></a>
    </div>
</footer>
</body>
</html>
