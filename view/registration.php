
<?php include('./public/include/topDoc.php'); ?>
<?php include('./public/include/header.php'); ?>
<?php include('./public/include/slider.php'); ?>

<div id="registrationSection">
	<h1>Inscription</h1>
   <form method="POST" action="index.php?action=addUser">
   		<label for="pseudo">Pseudonyme :</label>
   		<input  class="field" type="texte" name="pseudo" placeholder="Pseudonyme">

	   	<label for="password">Mot de passe :</label>
   		<input class="field" type="password" name="password" placeholder="Mot de passe">
		
		<label for="passwordConfim">Confirmez le mot de passe :</label>
   		<input  class="field" type="password" name="passwordConfirm" placeholder="Mot de passe">

   		<input class="button" type="submit" name="registration" value="inscription">
   </form>
</div>

</body>
</html>