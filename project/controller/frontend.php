<?php
  
use franco\blog\PostManager;
use franco\blog\CommentManager;

require('project/model/frontend.php');

// Chargement des classes
require_once('project/model/PostManager.php');
require_once('project/model/CommentManager.php');


function listPosts()
{
    $PostManager = new PostManager(); // Création de l'objet

    $req = $PostManager->getPosts();

    require('project/view/frontend/indexView.php'); 

}

function Posts($ID)
{
    
    $PostManager = new franco\blog\PostManager(); // Création de l'objet

    $post = $PostManager -> getPost($ID);

    $CommentManager = new franco\blog\CommentManager();

    $comments = $CommentManager ->getComment($ID);
    
    require('project/view/frontend/postView.php');

}

function addComment($postId, $author, $comment)
{
    
    $CommentManager = new franco\blog\CommentManager();
    
    $affectedLines = $CommentManager -> postComment($postId, $author, $comment);

    if ($affectedLines == false) 
    {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else
    {
        header('Location:index.php?action=Posts&id=' . $postId);
    }
}

function readComment($ID)
{

    $CommentManager = new franco\blog\CommentManager();

    $comments = $CommentManager ->getOneComment($ID);

    $comment = $comments->fetch();

    require('project/view/frontend/updCommentView.php');
}

function updComment($ID)
{

    $CommentManager = new franco\blog\CommentManager();

    $comments = $CommentManager ->updComment($ID,$_POST['comment']);

    $comments = $CommentManager ->getOneComment($ID);

    $comment = $comments->fetch();

    $post_id = $comment['post_id'];

    Posts($post_id);

}
