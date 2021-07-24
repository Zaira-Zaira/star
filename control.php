<?php
        //Connexion à la base de donnée

        $bdd = new PDO('mysql:host=localhost;dbname=star','root','root'); 


        //Requête d'insertion 

        $starSize = $bdd->prepare('INSERT INTO sizeOfStar (id, size) VALUES(null, :size)');
        $starSize->bindValue(':size', $_POST['size'], PDO::PARAM_INT);




        //L'execution de la requete

        $insertInBDD = $starSize->execute();


         //si l'on rentre la taille de l'étoile 1, le nombre d'étoiles des lignes == 6 

        $ligne = 2*($_POST['size'] + 2); 


        // si on rentre la taille de l'étoile 1, le nombre d'étoiles sur les lignes 1, 3, 5  == 1

        $sizeOfStar = $_POST['size']; 


        // Récuperation de la donnée saisie
        // se le nombre saisi est superieur de 0,
        // alors on effectue le traitement. Sinon on n'affiche rien.



        if ($_POST['size'] > 0){ 



        // parcours en longueur


            for ($i = 0; $i < $sizeOfStar; $i++)
            {


      // de l'hauteur de l'étoile on soustrait la valeur i pour le parcours de la ligne
        
      
                for ($j = ($sizeOfStar - $i); $j > 0; $j--)
                {
                    echo " ";
                }



        //si le parcours en longueur soit aussi long que le parcours en hauteur 
        //alors afficher une étoile. Sinon on met un espace


                for($n = 0; $n <= $i; $n++)
                {
                    echo "*";
                }

                echo "<br />";
            }
        }
        
        ?>



