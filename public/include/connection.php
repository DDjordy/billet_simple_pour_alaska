<div id="connection">
	<h1>Connexion</h1>
	<form method="post" action="./controller/connection.php">
		<label for="pseudo">Pseudonyme :</label>
		<input  class="field" type="text" name="pseudoConnect" placeholder="Pseudonyme">

		<label for="pseudo">Mot de passe :</label>
		<input class="field" type="password" name="passwordConnect" placeholder="Mot de passe">

		<input class="button" type="submit" name="connection" value="connexion">
	</form>

	<a href="index.php?action=registration"><h1>Pas encore inscrit ?</h1></a>
</div>
