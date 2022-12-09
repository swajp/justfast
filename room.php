<?php 
include_once 'header.php';

if (!$_SESSION['connectedRoomName']) {
    header("location: ./index.php");
    exit();
}
?>
<div class="container">
    <div class='content'>
        <p>Uživatel: <?php echo $_SESSION['username']; ?></p>
        <p>Kód místnosti: <?php echo $_SESSION['connectedRoomCode']; ?></p>
        <p>Majitel místnosti: <?php echo $_SESSION['connectedRoomOwner']; ?></p>
    </div>
</div>
<?php 
include_once 'footer.php';
?>