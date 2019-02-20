<?php

require_once 'konfig.php';

try {
	
    
	$konekcija = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);
	
	
    $konekcija->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
	$konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
}
catch(PDOException $error){
    echo "Neuspešna konekcija <br>".$error->getMessage();
}
