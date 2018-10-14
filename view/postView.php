
<?php include('./public/include/topDoc.php'); ?>
<?php include('./public/include/header.php'); ?>
<?php include('./public/include/slider.php'); ?>

    <section>
        <h1>Les chapitres</h1>
        <div id="articles">

			<article>
				<h1><?php echo $post['titre']; ?></h1>
				<p><?php echo $post['contenu']?></p>
				<h1 class="articleButton"><a href="index.php?action=post&amp;ID=<?php echo($post['ID'])?>">LIRE LA SUITE</a></h1>
			</article>

		</div>
    </section>

<?php include('./public/include/footer.php'); ?>
</body>
</html>