	<footer>
		<?php 
			if (!empty($_SESSION['ID'])) { ?>

			<p>Bonjour <?php echo $_SESSION['pseudo']; ?></p>
			<a href="index.php?action=disconnection">déconnexion</a>
		<?php } ?>

		<?php
			if(!empty($_SESSION['ID']) && $_SESSION['autorisation'] == 2)
			{
		?>
			<p><a href="index.php?action=admin">Panel d'administration</a></p>
		<?php
			}
		?>

	</footer>