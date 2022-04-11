

<?PHP
$con = mysql_connect ("localhost", "root", "jsjxqr6t") ;
si (! $con)
{
die("ne pourrait pas se relier : ". mysql_error ());
}

mysql_select_db ("maBase", $con);
    //en stocke la date du jour dans la variable $date_inscri
    $date_inscri=date();
    
    $sql=" INSERT INTO `visiteurs` (`reference`, `description`, `prix-unitaire-ht`, `taux-tva`)
    VALUES
    ('','$_POST[reference]','$_POST[description]','$_POST[prix-unitaire-ht]','$_POST[taux-tva]','$_POST[sexe]','$date_inscri')";
    
    if (!mysql_query($sql,$con))
    {
    die('impossible d’ajouter cet enregistrement : ' . mysql_error());
    }
    echo "L’enregistrement est ajouté ";
    
    mysql_close($con)
    ?>
    <a href=" formulaire.php ">Retour au formulaire</a>