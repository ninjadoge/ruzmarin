<?php

$upitLjudi = "SELECT * FROM ljudi l INNER JOIN poslovi p ON l.posao_id = p.id";
$rezultat = $konekcija->prepare($upitLjudi);
$rezultat->execute();
$ljudi = $rezultat->fetchAll();
?>
<section id="two" class="wrapper style1 special">
				<div class="inner">
					<header>
						<h2>Naši ljudi</h2>
						<p>Oni su nam ovo omogoćuli</p>
					</header>
					<div class="flex flex-4">
					<?php 
					foreach($ljudi as $jedan)
					{
						echo "<div class='box person'>
						<div class='image round'>
							<img src='".$jedan->slika."' alt='Person 1' />
							</div>
							<h3>".$jedan->Ime." ".$jedan->Prezime."</h3>
							<p>".$jedan->posao."</p></div>";	
					}
					?>
					</div>
				</div>
			</section>