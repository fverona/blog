<?php $title="Mon Blog" ?>

<?php ob_start(); ?>
        
    <body>

        <h1>Mon super blog !</h1>

        <p class="news">
            
        <?php echo "</br><a  href=index.php?action=Posts&id=" . $comment['post_id'] . ">Retour aux commentaires</a>" . "</p></br>"; ?>

        </p>

           
        <h2>Modification de commentaire</h2> 

                <p class="news">

                    <h3 class="news"> 

                     <?= htmlspecialchars($comment['author']) ?>
                     
                     le <?= $comment['comment_date_fr'] ?>
                        
                    </h3> 

                    <form action="index.php?action=updComment&amp;id=<?= $comment['id']?>" method="post">
                        <div class="news">

                            <?php $comment=htmlspecialchars($comment['comment']); ?>

                            <textarea id="comment" name="comment" rows = '3' cols = '133'><?php echo $comment ?></textarea>

                        </div>   

                        <div class="news">
                            <input type="submit" />
                        </div>

                    </form>
               
                </p>
                <br>
            
    <body>

<?php $content = ob_get_clean(); ?>

<?php require("project/view/frontend/template.php");   ?>
