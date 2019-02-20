    <?php
    session_start();
    include "php/konekcija.php";

    include "views/info.php";
    include "views/header.php";
    include "views/banner.php";
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';


    if(isset($_POST['unesi'])){

    $naziv = preg_replace("/[\\x0-\x20\x7f]/", '', $_POST['naziv']);
    $opis = trim($_POST['opis']);
    $cena = preg_replace("/[\\x0-\x20\x7f]/", '', $_POST['cena']);
    $slika = $_FILES['slika'];

        $putanja = $slika['tmp_name'];
        $imeSlike = $slika['name'];
        $tipSlike = $slika['type'];
            
        $errors = [];
        
        $format = ["image/jpg", "image/jpeg", "image/png"];

        if(!in_array($tipSlike, $format)){
            $errors[] = "Ne možete uneti sliku sa tom ekstenzijom.";
        }
        if(count($errors) == 0){
            $novoime = time().$imeSlike;
            $putanjaNova = "images/".$novoime;
            if(move_uploaded_file($putanja, $putanjaNova)){
                $upitSlika = $konekcija->prepare("INSERT INTO proizvodi VALUES(NULL, :naziv, :deskripcija, :slika, :cena)");
                $upitSlika->bindParam(":naziv", $naziv);
                $upitSlika->bindParam(":deskripcija", $opis);
                $upitSlika->bindParam(":slika", $putanjaNova);
                $upitSlika->bindParam(":cena", $cena);
                
                try{
                    $rezultat = $upitSlika->execute();
                
                                
                    if($rezultat)
                    {
                        echo "<h2>Unet proizvod u bazu!</h2>";
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
    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" >
    <div id="sirina2">
        <br>
        <br>
        <div class="12u 12u$(xsmall)">
            <h3>Izmeni artikal</h3>      
            <br>
            <div class="12u 12u">
            <input type="text" name="naziv" id="naziv" value="" placeholder="Naziv" />
            </div>
            <br>
            <div class="12u 12u">        
            <input type="text" name="opis" id="opis" value="" placeholder="Opis" />
            </div>
            <br>
            <div class="12u 12u">
            <input type="text" name="cena" id="cena" value="" placeholder="Cena" />
            </div>
            <br>
            <div class="12u 12u">
            <br>
            <input class="actions" type="file" name="slika" id="slika">
            </div>    
            <br>
            <div class="12u$">
            <ul class="actions">
                <li><input type="submit" name="unesi" value="Unesi"/></li>
                <li><input type="reset" value="Reset" class="alt" /></li>
            </ul>
        </div>
    </div>
    </form>


    <?php
    include "views/footer.php";
    include "views/skripte.php";
    ?>