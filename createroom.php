<?php 
include_once 'header.php';
?>
<div class="logo">
    <a href='index.php'><img src="images/logo.svg"></a>
</div>
<div class="container">
        <form class='content' action='includes/createroom.inc.php' method='post'>
            <input class='input__black' type='text' placeholder='Enter your name...' name='username' id=''>
            <input class='button__white' type='submit' name='submit'>Create new room>
        </form>
</div>
<?php 
include_once 'footer.php';
?>