<?php
// Inclure le fichier de configuration de la base de données
require_once 'config.php';


// Vérifier si le formulaire de mise à jour a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    // Récupérer l'identifiant du plat à mettre à jour
    $idPlat = isset($_POST['idPlat']) ? $_POST['idPlat'] : '';
    

    // Récupérer les données du formulaire
    $nomPlat = $_POST['nomPlat'];
    $caloPlat =$_POST['caloPlat'];
    $protPlat = $_POST['protPlat'];
    $prixPlat = $_POST['prixPlat'];
   
    // Requête SQL pour mettre à jour le plat dans la table
    
    $sql = "UPDATE plat SET nomPlat = '$nomPlat', caloPlat = '$caloPlat', protPlat = '$protPlat', prixPlat = '$prixPlat' WHERE idPlat = '$idPlat'";


    
    if (mysqli_query($conn, $sql)) {
        // Le plat a été mis à jour avec succès
        echo 'Le plat a été mis à jour avec succès.';
    } else {
        // Une erreur s'est produite lors de la mise à jour du plat
        echo 'Une erreur s\'est produite lors de la mise à jour du plat : ' . mysqli_error($conn) . '<br>';
        echo 'Requête SQL : ' . $sql;
    }
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
