<?php
session_start();
include "php/konekcija.php";

include "views/info.php";
include "views/header.php";
include "views/banner.php";

sort($_SESSION['korpa']);

$listaProizvoda = array();
$proizvodi ="";

for($i = 0; $i<=count($_SESSION['korpa']); $i++) 
{   
    if(isset($_SESSION['korpa'][$i]->id)){
    $listaProizvoda[$i]=$_SESSION['korpa'][$i]->id;   
    }  
}
//var_dump($listaProizvoda);

for($i = 0; $i<count($listaProizvoda); $i++)
{
    
    $upit = "SELECT * FROM proizvodi WHERE id= :id";
    $rezultat = $konekcija->prepare($upit);

    $rezultat->bindParam(":id",$listaProizvoda[$i]);
    $rezultat->execute();
    $proizvod = $rezultat->fetchAll();
    
    echo "<div class='container'>
    <br/>    
    <h2 id='sirina'>Vaša korpa</h2>
         <div class='row uniform'  id='sirina1'>                
         <ul class='alt'>
          <li>
              <h4>".$proizvod[0]->naziv."</h4>
              <span class='image left'><img src=".$proizvod[0]->slika." alt='' /></span>
              <div class='6u 12u$(small)'>
              <p>".$proizvod[0]->deskripcija."</p>
              </div>
              <p>".$proizvod[0]->cena."</p>
              
          </li>
          </ul>								
       </div>
  </div>" ;
    
}

include "views/footer.php";
include "views/skripte.php";
?>