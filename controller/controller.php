<?php
require_once('./model/PostManager.php');

function listPosts()
{
	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	require('./view/listPosts.php');
}

function post()
{
	$postManager = new PostManager();
	$post = $postManager->post($_GET['ID']);

	require('./view/postView.php');
}