<?php

function dbConnect()
{
		$db = new PDO('mysql:host=localhost;dbname=theblog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $db;
	
}

function getPosts()
{
	$db=dbConnect();

	$req = $db->prepare("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ssec') as date_creation_fr FROM posts order by id desc LIMIT 0, 5");

	$req->execute(array());

	return $req;
}

function getPost($postId)
{

	$db=dbConnect();

	$req = $db->prepare("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ssec') as creation_date_fr FROM posts where id = ?");

	$req ->execute(array($postId));

	$post = $req->fetch();

	return $post;
}

function getComment($postId)
{

	$db=dbConnect();

	$comments = $db->prepare("SELECT id, author, comment, comment_date, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ssec') as comment_date_fr FROM comments where post_id = ? order by comment_date desc");

	$comments->execute(array($postId));

	return $comments;
}


function postComment($postId, $author, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    
    $affectedLines = $comments->execute(array($postId, $author, $comment));

    return $affectedLines;
}


