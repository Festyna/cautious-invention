<?php
try
{
	// On se connecte à MySQL
	$mysqlClient = new PDO('mysql:host=localhost;dbname=formulairefacture;charset=utf8', 'root', 'jsjxqr6t');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table 
$sqlQuery = "SELECT *   FROM article ";
$referenceStatement = $mysqlClient->prepare($sqlQuery);
$referenceStatement->execute();
$reference = $referenceStatement->fetchAll();
//var_dump($reference);

// On affiche chaque recette une à une
foreach ($reference as $value) {
?>
    <p><?php echo $value['reference']; ?></p>
    <p><?php echo $value['description']; ?></p>
    <p><?php echo $value['prix-unitaire-ht'].'€'; ?></p>
    <p><?php echo $value['taux-tva'].'%'; ?></p>

<?php
}
?>