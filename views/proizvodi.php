<?php
$upit = 
"SELECT *
 FROM proizvodi 
 ORDER BY id ASC";

$rezultat = $konekcija->prepare($upit);
$rezultat->execute();
$proizvodi = $rezultat->fetchAll();

if(!isset($_SESSION['korpa'])){
$_SESSION['korpa'] = array();
}	
if(isset($_POST['obrisi'])){

	$id=trim($_POST['broj']);

	$upitObrisi = "DELETE FROM proizvodi WHERE id= :id";
	$rezultatObrisi = $konekcija->prepare("$upitObrisi");
	$rezultatObrisi->bindParam(":id",$id);
	try
	{
		$brisanje=$rezultatObrisi->execute();
		if($brisanje)
		{
			$_SESSION['message'] = "Obrisan proizvod";
			
			?>
			<script type="text/javascript">
			window.location.href = 'obrisan.php';
			</script>
			<?php
		}
	}
	catch(PDOException $error)
	{
		echo $error->getMessage();
		var_dump($id);
	}

}
if(isset($_POST['kupi'])){

	$id=trim($_POST['broj']);
	
	$upitKupi = 
"SELECT *
 FROM proizvodi 
 WHERE id= :id";

	$rezultatKupi = $konekcija->prepare("$upitKupi");
	$rezultatKupi->bindParam(":id",$id);
	try
	{
		$kupovina=$rezultatKupi->execute();
		if($kupovina)
		{
			$korpaProizvod=$rezultatKupi->fetch();
			
			$_SESSION['korpa'][$id] = $korpaProizvod;
			}
	}
	catch(PDOException $error)
	{
		echo $error->getMessage();
		var_dump($id);
	}

}
?>
<section id="one" class="wrapper">
				<div class="inner">
					<div class="flex flex-3">
						<?php 
						foreach($proizvodi as $proizvod):
						?>
						<article>
							<header>
								<h3> <?= $proizvod->naziv ?></h3>
							</header>
							<span class="image fit"><img src="<?= $proizvod->slika ?>" alt="" /></span>
							<p><?= $proizvod->deskripcija ?></p>
							<footer>
								<table>
										<thead>
											<tr>
												<th>Cena</th>
												<td><?= $proizvod->cena ?></td>
											</tr>
										</thead>
								</table>
								<form method="post" action="index.php">
								<ul class="actions">								
								<li><input type='submit' name='kupi' value='Kupi'/></li>
								<input type="hidden" name="broj" value="<?= $proizvod->id ?>">
								<li><?php if(isset($_SESSION['moderator'])){echo "<input type='submit' name='obrisi' value='Obriši'/>";}?></li>
								<li><?php if(isset($_SESSION['moderator'])){echo "<a href='izmeni.php' class='button alt'>Izmeni</a>";	}	?></li>
								</ul>
								</form>
							</footer>
						</article>
						<?php endforeach; ?>
						
					</div>
				</div>
			</section>
			