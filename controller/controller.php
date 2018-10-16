<?php
require_once('./model/PostManager.php');

function listPosts()
{
	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	require('./view/listPosts.php');
}

function post($ID)
{
	$postManager = new PostManager();
	$post = $postManager->post($ID);

	require('./view/postView.php');
}