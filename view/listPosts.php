
<?php include('./public/include/topDoc.php'); ?>
<?php include('./public/include/header.php'); ?>
<?php include('./public/include/slider.php'); ?>

	<section>
		<h1>Les chapitres</h1>
		<div id="articles">

		<?php 
			while ($post = $posts->fetch()) { ?>
			<article>
				<h1><?php echo $post['titre']; ?></h1>
				<p><?php echo $post['contenu']; ?></p>
				<button type="button">LIRE LA SUITE</button>
			</article>
			<?php 
		} ?>

		</div>
	</section>

<?php include('./public/include/footer.php'); ?>
</body>
</html>