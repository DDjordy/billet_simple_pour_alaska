<?php
require('./model/model.php');
 
function listPosts()
{
	$posts = getPosts();

	require('./view/listPosts.php');
}
