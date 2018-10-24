	<footer>
		<?php 
			if (!empty($_SESSION['ID'])) { ?>

			<p>Bonjour <?php echo $_SESSION['pseudo']; ?></p>
			<a href="index.php?action=disconnection">déconnexion</a>
		<?php } ?>


	</footer>