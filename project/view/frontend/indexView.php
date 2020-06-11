<?php $title="Mon Blog" ?>

<?php ob_start(); ?>

   <body>
  
  	<br><h1 class="news"> Le Blog </h1><br>


   <?php
   		while ($data = $req->fetch())		
		{			
						 
		    echo "<h3 class=\"news\">" . "  " . htmlspecialchars($data['title']) . " " . $data['date_creation_fr'] . "</h3>";

		    echo "<p class=\"news\">" .  nl2br(htmlspecialchars($data['content'])) ;

		    echo "</br><a  href=index.php?action=Posts&id='" . $data['id'] . "'>Commentaires</a>" . "</p></br>";
			
		}
		
		$req->closeCursor(); 
	?>

	</body>

<?php $content = ob_get_clean(); ?>

<?php require("project/view/frontend/template.php");   ?>