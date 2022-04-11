<?php 
//si on accède à la page ajout auteur.php sans poster le formulaire d'ajout
 if (!isset($_POST["nom"])) 
{ 
 //on redirige vers la page du formulaire
     header ("location  :./formulaire.php");  
exit;  }
//on fait la connexion à la base
 require once("../includes/connexion bdd.php");
   try { 
//on va insérer des données dans la base
//on va utiliser une requête préparée
 $sql = 'INSERT INTO `formulaire` (`reference`,`description,`prix-unitaire-ht`,`taux-tva`) VALUES( :reference, ":description", :prix-unitaire-ht, :taux-tva)' ; 
  $sth = $dbh->prepare($sql); 
 //sur les contenus du formulaire et les valeurs de la requête préparée
  $sth->bindValue(":reference", $_POST["reference"]); 
   $sth->bindValue(":description", $_POST["description"]); 
    $sth->bindValue(":prix-unitaire-ht", $_POST["prix-unitaire-ht"]); 
    $sth->bindvalue(":taux-tva",$_POST["taux-tva"]); 
 //on exécute la requête préparée
  $rs = $sth->execute(); 
 } catch (PDOException $e) 
 { echo $e->getMessage ();  
  exit;
 //si on est arrivé jusqu'ici l'insertion est un succès : on enchaine avec l'affichage
  header("location:./affichage_formulaire.php");