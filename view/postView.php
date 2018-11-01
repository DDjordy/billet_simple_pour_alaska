
<?php include('./public/include/topDoc.php'); ?>
<?php include('./public/include/header.php'); ?>
<?php include('./public/include/slider.php'); ?>

    <section>
        <h1>Les chapitres</h1>
        <div id="articles">
			<article>
				<h1><?php echo $post['titre']; ?></h1>
				<p><?php echo $post['contenu']?></p>
				<h1 class="articleButton"><a href="index.php">Accueil</a></h1>
			</article>
		</div>
    </section>


<?php 
while ($donnée = $req->fetch())
	{
?>
		<div id="comment">
		<p><strong><?php echo $donnée['pseudo']; ?> :</strong><?php echo $donnée['contenu']; ?><br/>
		<?php echo $donnée['date']; ?> | <a class="red" href="index.php?action=report&ID=<?php echo($_GET['ID']) ?>&commentaireID=<?php echo $donnée['ID']; ?>">Signaler ce commentaire </a>
		</p>
		</div>
<?php
	}
?>




<?php
if (!empty($_SESSION['ID'])) {
	include('./public/include/comment.php');
}
?>

<?php include('./public/include/footer.php'); ?>
</body>
</html>