
<?php include('./public/include/topDoc.php'); ?>
<?php include('./public/include/header.php'); ?>

<div id="adminArticle">
	<h1>Gérer les articles</h1>
<table id="articleTable">
   <tr>
       <th>Date</th>
       <th>Titre</th>
       <th>Contenu</th>
       <th>Modifier</th>
       <th>Supprimer</th>
   </tr>

   <?php while ($post = $posts->fetch()) { ?>
	   <tr>
	       <td><?php echo $post['date']; ?></td>
	       <td><?php echo $post['titre']; ?></td>
	       <td><?php echo substr($post['contenu'], 0, 100); ?></td>
	       <td class="edit"><a href="index.php?action=editArticle&IdArticle=<?php echo($post['ID']) ?>">M</td></a>
	       <td class="delete"><a href="index.php?action=deleteArticle&IdArticle=<?php echo($post['ID']) ?>">X</a></td>
	   </tr> 
   <?php } ?>
</table>
	<div id="addArticleSection">
		<h1>Ajouter un article</h1>
		<form id="addArticle" method="POST" action="
		<?php 
		if(isset($editArticle['ID']))
		{ echo"index.php?action=upArticle&IdArticle=".$editArticle['ID'];} 
		else 
		{ echo"index.php?action=addArticle";}
		?>
		">
			<label for="title"> TITRE DE L'ARTICLE : </label>
			<input type="text" name="title" placeholder="Titre" value="<?php if(isset($editArticle['titre'])){
				echo $editArticle['titre'];
			}?>">
			<textarea class="tinymce" name="content"><?php if(isset($editArticle['titre'])){
				echo $editArticle['contenu'];
			}?></textarea>
			<input type="submit" name="valider" value="valider">
		</form>
	</div>
</div>

	<div id="adminComment">
		<h1>Les commentaires signalés</h1>	
	</div>


<table id="reportcomments">
   <tr>
       <th>Date</th>
       <th>Contenu</th>
       <th>Valider</th>
       <th>Supprimer</th>
   </tr>

   <?php while ($reportComment = $reportComments->fetch()) { ?>
	   <tr>
	       <td><?php echo $reportComment['date']; ?></td>
	       <td><?php echo substr($reportComment['contenu'], 0, 100); ?></td>
	       <td class="edit"><a href="index.php?action=acceptComment&idComment=<?php echo($reportComment['ID']) ?>">V</td></a>
	       <td class="delete"><a href="index.php?action=deleteComment&idComment=<?php echo($reportComment['ID']) ?>">X</a></td>
	   </tr> 
   <?php } ?>
</table>


<?php include('./public/include/footer.php'); ?>

      <script type="text/javascript" src="./public/js/jquery.min.js"></script>
      <script type="text/javascript" src="./public/plugin/tinymce/tinymce.min.js"></script>
      <script type="text/javascript" src="./public/plugin/tinymce/init-tinymce.js"></script>
  

</body>
</html>