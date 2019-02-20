<div class="container">
<?php
$prom = "";
$prom1 = "";

if(isset($_POST['posalji'])){

$_SESSION['email'] = $_POST['email'];
$_SESSION['ime'] = $_POST['ime'];
$_SESSION['prezime'] = $_POST['prezime'];

$ime = preg_replace("/[\\x0-\x20\x7f]/", '', $_POST['ime']);
$prezime = preg_replace("/[\\x0-\x20\x7f]/", '', $_POST['prezime']);
$adresa = trim($_POST['adresa']);
$telefon = preg_replace("/[\\x0-\x20\x7f]/", '', $_POST['telefon']);
$email = preg_replace("/[\\x0-\x20\x7f]/", '', $_POST['email']);
$lozinka = preg_replace("/[\\x0-\x20\x7f]/", '', password_hash($_POST['lozinka'], PASSWORD_BCRYPT));


$stmt = $konekcija->prepare("SELECT COUNT(*) AS count FROM `korisnici` WHERE email=?");
$stmt->execute(array($email));

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $email_count = $row["count"];
}
if ($email_count > 0) {
$prom1 ="Već postoji nalog sa ovom email adresom!";
}
else
{
   $unos = $konekcija->prepare("INSERT INTO korisnici VALUES (NULL, :ime, :prezime, :email, :adresa, :telefon, :lozinka)");
   
   $unos->bindParam(':ime', $ime);
	$unos->bindParam(':prezime', $prezime);
	$unos->bindParam(':email', $email);
   $unos->bindParam(':adresa', $adresa);
   $unos->bindParam(':telefon', $telefon);
   $unos->bindParam(':lozinka', $lozinka);
   
   try {
         
      $rezultat = $unos->execute();
      
      if($rezultat){
         $prom = "Korisnik je unet u bazu.";

      } else {
         $prom = "Greska pri unosu korisnika.";
      }
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
}
}
?>
<br/>
<h3>Unesite podatke</h3>
   <form method="post" action="<?= $_SERVER['PHP_SELF'].'?page=register' ?>" >
	<!--<form method="post" action="index.php" >-->
		<div class="row uniform">
			<div class="6u 12u$(xsmall)">

				<input type="text" name="ime" id="ime" value="" placeholder="Ime" />
            </div>

            <div class="6u 12u$(xsmall)">

				<input type="text" name="prezime" id="prezime" value="" placeholder="Prezime" />
            </div>

            <div class="6u 12u$(xsmall)">

				<input type="text" name="adresa" id="adresa" value="" placeholder="Adresa" />
            </div>
            
            <div class="6u 12u$(xsmall)">

				<input type="text" name="telefon" id="telefon" value="" placeholder="Telefon" />
            </div>

            <div class="6u 12u$(xsmall)">

				<input type="email" name="email" id="email" value="" placeholder="Email" />
            </div>
            
			   <div class="6u 12u$(xsmall)">
                
            <input type="password" name="lozinka" id="lozinka" value="" placeholder="Lozinka" />
                                
            </div>

            <div class="12u$">
				<ul class="actions">
					<li><input type="submit" name="posalji" value="Pošalji"/></li>
					<li><input type="reset" value="Reset" class="alt" /></li>
            </ul>
            <div class="box">
               
               <?php 
                echo $prom1;
                echo $prom;
                
                ?>
                
            </div>

			</div>
         </div>
  </form>
</div>  