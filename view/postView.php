
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

    <div id="comment">
		<p><strong>Decroix Djordy :</strong>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500<br/>
		Le 16/10/2018 à 09H32 | <span class="red">Signaler ce commentaire </span>
	</p>
	</div>
    <div id="comment">
		<p><strong>Decroix Djordy :</strong>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.<br/>
		Le 16/10/2018 à 09H32 | <span class="red">Signaler ce commentaire </span>
	</p>
	</div>


<?php include('./public/include/footer.php'); ?>
</body>
</html>