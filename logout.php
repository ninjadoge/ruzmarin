<?php
session_start();
session_unset();
unset($_SESSION['moderator']);
session_destroy(); 
include "views/info.php";
include "views/header.php";
include "views/banner.php";

?>
    <div id="sirina1">
        <br>
        <h1>Hvala na poseti!</h1>
        <p><?= 'Upravo ste izlogovani!'; ?></p>     
        <a href="index.php" class="button">Početna</a>
        <br>
    </div>
    <br>
<?php
include "views/footer.php";
include "views/skripte.php";