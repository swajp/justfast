<?php 
include_once 'header.php';
?>
<div class="logo">
    <img src="images/logo.svg">
</div>
<div class="container">
    <?php
    if (isset($_POST['join-room'])){
        echo "
        <form class='content' action='includes/joinroom.inc.php' method='post'>
            <input class='input__black' type='text' placeholder='Enter room code...' name='' id=''>
            <button class='button__white' name='join-room-button'>Connect to the room</button>
        </form>
        ";
    }
    else if (isset($_POST['create-room'])){
        echo "<p>Creating room...</p>";
    }
    else if (isset($_POST['join-room-button'])){
        echo "<p>Connecting to the room...</p>";
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
<?php 
include_once 'footer.php';
?>