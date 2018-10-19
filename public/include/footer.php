	<footer>
	<?php 
	if (!empty($_SESSION['pseudo'])) { ?>

	<p>Bonjour <?php echo $_SESSION['pseudo']; ?></p>
	<a href="./controller/disconnection.php">déconnexion</a>
	<?php } ?>


	</footer>