<?php
session_start();
include "php/konekcija.php";

include "views/info.php";
include "views/header.php";
include "views/banner.php";


$upit ="SELECT * FROM proizvodi";
$rezultat = $konekcija->prepare($upit);
$rezultat->execute();

$proizvodi   = $rezultat->fetchAll();
if(isset($_POST['izmeni'])){

   $cena = preg_replace("/[\\x0-\x20\x7f]/", '', $_POST['cena']);
   $opis = triM($_POST['opis']);
   $id= preg_replace("/[\\x0-\x20\x7f]/", '', $_POST['category']);
   if(isset($_FILES['slika'])){
   $slika = $_FILES['slika'];
   }
   $putanja = $slika['tmp_name'];
   $imeSlike = $slika['name'];
   $tipSlike = $slika['type'];
      
   $errors = [];

   
   $format = ["image/jpg", "image/jpeg", "image/png"];

   if(!in_array($tipSlike, $format)){
      
     $errors[] = "Ne možete uneti sliku sa tom ekstenzijom.";
   }if(count($errors) == 0){
      $novoime = time().$imeSlike;
      $putanjaNova = "images/".$novoime;
      if(move_uploaded_file($putanja, $putanjaNova)){
                 
         $upitIzmena ="UPDATE proizvodi SET deskripcija= :deskripcija, slika= :slika, cena= :cena WHERE id= :id";
         $upit = $konekcija->prepare($upitIzmena);
         $upit->bindParam(":slika", $putanjaNova);

         $upit->bindParam(":deskripcija", $opis);
                  
         $upit->bindParam(":cena", $cena);
         $upit->bindParam(":id", $id);
           
         try{
             $rezultat = $upit->execute();
            
                            
             if($rezultat)
             {
                 echo "<h2>Izmenjen proizvod</h2>";
                 
             }
           }
             catch(PDOException $error)
             {
         echo $error->getMessage();
             }
  
      }
      else {
          echo "Nije uspeo upload fajla!";
      }
  }
  else {

    echo "<ol>";
    
    foreach($errors as $error){
       echo "<li> $error </li>";
    }

    echo "</ol>";
   }
}
?>
<br/>
   <form method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'].'?page=izmeni' ?>">
	   <div id="sirina2">
        <br>
        <br>
        <div class="12u 12u$(xsmall)">
         <h3>Izmeni artikal</h3>
         <div class="12u$">
				<div class="select-wrapper">
					<select name="category" id="category">
                  <option value="">- Category -</option>
                  <?php foreach($proizvodi as $proizvod):?>                  		
						<option value="<?php echo $proizvod->id ?>"><?php echo $proizvod->naziv ?></option>
                  <?php endforeach; ?>
					</select>
				</div>
         </div>        
            <br>       
            <div class="12u 12u">
				<input type="text" name="cena" id="cena" value="" placeholder="Cena" />
            </div>
            <br>
            <div class="12u 12u">
				<input type="text" name="opis" id="opis" value="" placeholder="Opis" />
            </div>
            <br>
            <div class="12u 12u">
            <br>
            <input class="actions" type="file" name="slika" id="slika">
            </div>            
            <br>
            <div class="12u$">
				<ul class="actions">
					<li><input type="submit" name="izmeni" value="Pošalji"/></li>
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