<?php include('./public/include/topDoc.php'); ?>

	<div id="errorDiv">
		<img src="./public/images/erreur.png" alt="image erreur">
		<h1><?php echo $_GET['message'] ?></h1>
		<a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">Retour à la page précédente</a>
	</div>
</body>
</html>