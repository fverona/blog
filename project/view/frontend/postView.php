<?php $title="Mon Blog" ?>

<?php ob_start(); ?>
        
    <body>
        <h1>Mon super blog !</h1>


        <p class="news">
            
            <a  href="index.php">Retour à la liste des billets</a>
            
            <h3 class="news">
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['creation_date_fr'] ?></em>
            </h3>
            
               <?php echo "<p class=\"news\">" .  nl2br(htmlspecialchars($post['content'])) ; ?>
        
        </p>


           
        <h2>Commentaires</h2> 

            <?php
            while ($comment = $comments->fetch())
            {
            ?>
                <p class="news">
                    <h3 class="news"> 

                     <?= htmlspecialchars($comment['author']) ?>
                     
                     le <?= $comment['comment_date_fr'] ?>
                        
                    <?php echo "<a href=index.php?action=readComment&id='" . $comment['id'] . "'> - Modification</a>"; ?>
                    
                    </h3> 

                    <p class="news">    <?= htmlspecialchars($comment['comment']) ?> </p>

               
                </p>
                <br>
            <?php
            }
            ?>

    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
     <div class="news">
            <label for="author">Auteur</label><br />
           <input type="text" id="author" name="author" />
        </div>
     <div class="news">
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment" rows = '3' cols = '80'></textarea>
     </div>
     <div class="news">
            <input type="submit" />
        </div>
    </form>

    </body>

<?php $content = ob_get_clean(); ?>

<?php require("project/view/frontend/template.php");   ?>


