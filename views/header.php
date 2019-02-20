	  <header id="header">
				<div class="inner">
					<a href="index.php" class="logo">Ruzmarin Shop</a>
					<nav id="nav">
					<?php if(isset($_SESSION['moderator'])):?>
					<a href="unesi.php">Unesi proizvod</a>
					<?php endif; ?>
					<?php if(isset($_SESSION['ulogovan'])):?>
					<a href="korpa.php">Korpa</a>	
					<a href="#">	</a>	
					<a href="profil.php">Profil</a>
					<a href="logout.php">Logout</a>					
					<?php else: ?>
						
						<a href="login1.php">Login</a>
						<a href="index.php?page=register">Register</a>
					<?php endif; ?>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>