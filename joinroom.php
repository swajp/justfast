<?php 
include_once 'header.php';
?>
<div class="logo">
    <a href='index.php'><img src="images/logo.svg"></a>
</div>
<div class="container">
        <form class='content' action='includes/joinroom.inc.php' method='post'>
            <input class='input__black' type='text' placeholder='Enter room code...' name='' id=''>
            <button class='button__white' name='join-room-button'>Connect to the room</button>
        </form>
</div>
<?php 
include_once 'footer.php';
?>