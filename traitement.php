<?php
$nom = $_POST["nom"];
echo "votre nom est : $nom <br/>";
$mail = $_POST["email"];
echo "votre adresse e-mail est : $mail<br/>";
$entreprise = $_POST["entreprise"];
echo "votre entreprise est : $entreprise<br/>";
$message = $_POST['nom']."\n".$_POST['email']."\n".$_POST['entreprise']."\n";
$fichier = fopen('/var/www/html/html_css/formulaire.txt', 'a+');
fputs($fichier, $message);
fclose($fichier);
?>
