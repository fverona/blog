<?php

require('project/controller/frontend.php');

try { // On essaie de faire des choses

        if (isset($_GET['action']))
        {
           // Affichage des billets 
    	   if ($_GET['action'] == "listPosts")
    	   {

    		  listPosts();

    	   }

           // Affichage des commentaire pour un billet
    	   elseif($_GET['action'] == "Posts")
    	   {

        		if (isset($_GET['id']))
        		{
            		$ID=str_replace("'"," ",$_GET['id']);

           			if ( $ID > 0 )
        			{
        				Posts($ID);
        			}
        			else
        			{
        				throw new Exception('Erreur : aucun identifiant de billet envoyé');
        			}	
        		}
        	}	
        	elseif ($_GET['action'] == 'addComment') 
        	{
                if (isset($_GET['id'])) 
                {	
            		$ID=str_replace("'"," ",$_GET['id']);
            		
           			if ( $ID > 0 )
                	{
                    	if (!empty($_POST['author']) && !empty($_POST['comment']))
                    	 {
                        	addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    	 }
                   			else 
                   		 {
                        	throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                   		 }

                	}
                	else 
                	{
                    	throw new Exception('Erreur : aucun identifiant de billet envoyé');
                	}

            	}
            	else
            	{
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
            	}

            }
            elseif ($_GET['action'] == 'readComment') 
            {
                if (isset($_GET['id'])) 
                {
                    $ID=str_replace("'"," ",$_GET['id']);

                    if ( $ID > 0 )
                    {
                      readComment($ID);
                    }        
                    else
                    {
                      throw new Exception('Erreur : aucun identifiant de commenraire envoyé');  
                    } 

                }

            }
            elseif ($_GET['action'] == 'updComment') 
            {
                if (isset($_GET['id'])) 
                {
                    $ID=str_replace("'"," ",$_GET['id']);

                    if ( $ID > 0 )
                    {

                      updComment($ID,$_POST['comment']);
                    }        
                    else
                    {
                      throw new Exception('Erreur : aucun identifiant de commenraire envoyé');  
                    } 

                }

            }   	

        }
        else
        {
    	listPosts();
        }
    
    }
   
    catch(Exception $e) 
    { 
        $errorMessage = $e->getMessage();
        require('project/view/frontend/errorView.php');
    }