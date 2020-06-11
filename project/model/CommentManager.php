<?php

namespace franco\blog;

require_once("project/model/Manager.php");

class CommentManager extends Manager
{


	public function getComment($postId)
	{

		$db = $this -> dbConnect();

		$comments = $db->prepare("SELECT id, author, comment, comment_date, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ssec') as comment_date_fr FROM comments where post_id = ? order by comment_date desc");

		$comments->execute(array($postId));

		return $comments;
	}


	public function postComment($postId, $author, $comment)
	{
	    $db = $this -> dbConnect();
	    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
	    
	    $affectedLines = $comments->execute(array($postId, $author, $comment));

	    return $affectedLines;
	}
	
	public function getOneComment($ID)
	{

		$db = $this -> dbConnect();

		$comments = $db->prepare("SELECT id, post_id, author, comment, comment_date, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ssec') as comment_date_fr FROM comments where id = ? order by comment_date desc");

		$comments->execute(array($ID));

		return $comments;

	}

	public function updComment($ID, $comment)
	{
		

		$db = $this -> dbConnect();

		$comments = $db->prepare('update comments set comment = :comment, comment_date = NOW() where id = :ID');

	    $comments->execute(array('ID' => $ID, 'comment' => htmlspecialchars($comment) ));

		return $comments;
	}

}
