<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project STar</title>
</head>
<body>
    <header>
        <h1>Project star</h1>
    </header>
    <main>
        <section>
            <form action="#" method="POST">
            <label for="size">Enter the size of the star : </label>
            <input type="number"  id="size" name="size" min="1">
            <input type="submit" id="submit" name="submit" value="Send">
            </form>
        </section>





        <?php
        //Connexion à la base de donnée
        $bdd = new PDO('mysql:host=localhost;dbname=star','root','root'); 


        //Requête d'insertion 
        $starSize = $bdd->prepare('INSERT INTO sizeOfStar (id, size) VALUES(null, :size)');
        $starSize->bindValue(':size', $_POST['size'], PDO::PARAM_INT);


        //L'execution de la requete
        $insertInBDD = $starSize->execute();


        // si l'on rentre la taille de l'étoile 1, le nombre d'étoiles sur les lignes 1, 3 et 5 est de 1 (la valeur rentré)
         $numberOfStarLines = $_POST['size']; 

         //si l'on rentre la taille de l'étoile 1, le nombre d'étoiles des lignes parallèles est de 6 
         $line = ($_POST['size'] + 2) *2;  



        if(isset($_POST["submit"])){

        // Récuperation de la donnée saisie
        // se le nombre saisi est superieur de 0,
        // alors on effectue le traitement. Sinon on n'affiche rien.

            if($_POST["size"] > 0) {
            $hauteur = 5;
            $size = $_POST["size"];

        //repeter $cote fois le block suivant .         

         while($hauteur <=0 ){

        //parcours en longueur et en 
        
          for($i = 1; $i <= $size; $i++) {
            for($j = 1;  $j <= $size-$i; $j++){
                print(" ");
            }
            for($j = 1;  $j <= (2 * $i-1); $j++){

         
        //si le parcours en longueur soit aussi long que le parcours en hauteur  &&
        //si  j == 1 et j == (2* $i - 1),
        //alors afficher une étoile. Sinon on met un espace.


                if ($i== $size || $j == 1 || $j == (2 * $i - 1)) {
                    print_r("* ");
                }
                else{
                    print_r(" ");
                }
                print_r(" ");
            }
            //Ajout d'un retour à la ligne
            echo "\n";
        };
         }
    }
    }
        
        ?>
    </main>
</body>
</html>