
<! DOCTYPE html>
<head><meta charset="utf-8"></head>
<link rel="stylesheet" type="text/css" href="cv.css">
<body>

<?php
       $nom = $_POST["nom"];
       echo "Votre nom est : $nom <br/>";
       $mail = $_POST["email"];
       echo "Votre adresse e-mail est : $mail<br/>";
       $entreprise = $_POST["entreprise"];
       echo "Votre entreprise est : $entreprise<br/>";
       $demande = $_POST["demande"];
       echo "Votre demande est : $demande<br/>";
       $message = $_POST['nom']."\n".$_POST['email']."\n".$_POST['entreprise']."\n".$_POST['demande'];
       $fichier = fopen('/var/www/html/html_css/formulaire.txt', 'a+');
       fputs($fichier, $message);
       fclose($fichier);
       ?>
<?php
try
       {
       $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'ecodair');
       }
catch(Exception $e)
       {
               die('Erreur : '.$e->getMessage());
       }
       $req = $bdd->prepare('INSERT INTO formulaire(nom, email, entreprise, demande) VALUES(:nom, :email, :entreprise, :demande)');

         ?>
         <?php
       $req ->execute(array(
             'nom' => $nom = $_POST['nom'],
             'email'=> $email = $_POST['email'],
             'entreprise'=>$entreprise = $_POST['entreprise'],
             'demande'=>$demande = $_POST['demande']
             ));

         echo 'Votre demande a été bien ajoutée !';
         $req->closeCursor(); // Termine le traitement de la requête
            ?>
 </body>
