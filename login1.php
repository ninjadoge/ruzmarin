<?php
session_start();
include "php/konekcija.php";

if(isset($_POST['uloguj'])){
    $email = preg_replace("/[\\x0-\x20\x7f]/", '', $_POST['email']);
    $lozinka = $_POST['lozinka'];
       
    $upit ="SELECT ime, prezime, email, adresa, telefon, lozinka FROM korisnici WHERE email = :email";

    $rezultat = $konekcija->prepare($upit);
    $rezultat->bindParam(":email", $email);

    $rezultat->execute();
    $korisnik = $rezultat->fetch();      
      
    if($korisnik)
    {
         if (password_verify($lozinka,$korisnik->lozinka))         
        {
         $_SESSION['ulogovan'] = $korisnik; 
         header("Location: profil.php");
        }
        else         
         {  $_SESSION['pom'] = $korisnik;
            $_SESSION['message'] = "Uneli ste pogrešnu lozinku";
            header("location: error.php");
         }
      }
   else    
      {
      $_SESSION['message'] = "Ne postoji zadati korisnik";
      header("location: error.php");
      }
}
include "views/info.php";
include "views/header.php";
include "views/banner.php";

?>
   <div class="container">
      <br/>      
      <form method="post" action="<?= $_SERVER['PHP_SELF'].'?page=login' ?>">
      <h2 id="sirina">Unesite podatke</h2>
   		<div class="row uniform"  id="sirina1">
          <br>                
   			   <div class="6u 12u$(xsmall)">
   				   <input type="email" name="email" id="email" value="" placeholder="Email" />
               </div>         
   			   <div class="6u 12u$(xsmall)">
                  <input type="password" name="lozinka" id="lozinka" value="" placeholder="Lozinka" />                              
               </div>               
               <div class="12u 12u">
   				<ul class="actions" id="sirina1">
                  <li><input type="submit" name="uloguj" value="Pošalji" /></li>
                  <li><input type="reset" value="Reset" class="alt" /></li>
               </ul>
               </div> 		          
          </div>
      </form>
   </div>  
<?php

include "views/footer.php";
include "views/skripte.php";
?>