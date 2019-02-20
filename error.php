<?php
session_start();
include "views/info.php";
include "views/header.php";
include "views/banner.php";
?>
    <div id="sirina1">
        <br>
        <h1>Greška!</h1>            
        <p>
        <?php 
            if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
                echo $_SESSION['message'];    
                else:
                header( "location: index.php" );
            endif;
        ?>
        </p>
        <a href="index.php?page=login" class="button">Pokušajte ponovo</a>
        <br>
    </div>
    <br>
<?php
include "views/footer.php";
include "views/skripte.php";