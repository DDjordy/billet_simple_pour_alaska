
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
				<p><?php echo substr($post['contenu'], 1, 800)." ..."; ?></p>
				<h1 class="articleButton"><a href="index.php?action=post&amp;ID=<?php echo($post['ID'])?>">LIRE LA SUITE</a></h1>
			</article>
			<?php } ?>
		</div>
	</section>

<?php 
if (empty($_SESSION['ID'])) {
	include('./public/include/connection.php'); 
}?>


<?php include('./public/include/footer.php'); ?>

</body>
</html>