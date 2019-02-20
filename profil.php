<?php
session_start();
$strana = "";
if(isset($_GET['page'])){
	$strana = $_GET['page'];
}

include "views/info.php";
include "views/header.php";
include "views/banner.php";

if(isset($_SESSION['ulogovan'])){
    //var_dump($_SESSION['ulogovan']);
    if($_SESSION['ulogovan']->email == "admin@gmail.com")
    {
        $_SESSION['moderator'] = "DA";
    }      
}
?>
<div id="sirina">
 <br/>
 <h2>Podaci o korisniku</h2>
 <div id="box">
 <ul class="alt">
 	<li>Ime korisnika: <?= $_SESSION['ulogovan']->ime; ?></li>
 	<li>Prezime korisnika: <?= $_SESSION['ulogovan']->prezime; ?></li>
     <li>Email korisnika: <?= $_SESSION['ulogovan']->email; ?></li>
     <li>Adresa korisnika: <?= $_SESSION['ulogovan']->adresa; ?></li>
     <li>Telefon: <?= $_SESSION['ulogovan']->telefon; ?></li>     
 </ul>
 </div>
 </div>
<?php
include "views/footer.php";
include "views/skripte.php";
?>