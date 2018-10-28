<h1>Ecrire un commentaire</h1>

<form id="commentForm" method="POST" action="index.php?action=postComment&amp;ID=<?php echo($_GET['ID'])?>" > 
	<textarea name="comment"></textarea>
	<input type="submit" name="postComment" value="Envoyer">
</form>