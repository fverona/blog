<?php

namespace franco\blog;

require_once("project/model/Manager.php");

class PostManager extends Manager
{


	public function getPosts()
	{
		$db= $this-> dbConnect();

		$req = $db->prepare("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ssec') as date_creation_fr FROM posts order by id desc LIMIT 0, 5");

		$req->execute(array());

		return $req;
	}

	public function getPost($postId)
	{

		$db= $this-> dbConnect();

		$req = $db->prepare("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ssec') as creation_date_fr FROM posts where id = ?");

		$req ->execute(array($postId));

		$post = $req->fetch();

		return $post;
	}

}
