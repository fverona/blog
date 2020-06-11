<?php
    
require('project/model/frontend.php');

function listPosts()
{

	$req=getPosts();

	require('project/view/frontend/indexView.php'); 

}

function Posts($ID)
{

	$post=getPost($ID);

	$comments=getComment($ID);
	
	require('project/view/frontend/postView.php');

}

function addComment($postId, $author, $comment)
{
    $affectedLines = postComment($postId, $author, $comment);

    if ($affectedLines == false) 
    {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else
    {
        header('Location:index.php?action=Posts&id=' . $postId);
    }
}