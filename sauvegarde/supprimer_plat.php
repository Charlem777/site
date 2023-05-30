<?php
// Inclure le fichier de configuration de la base de données
require_once 'config.php';

// Vérifier si l'ID du plat à supprimer est passé en paramètre dans l'URL
if (isset($_POST['idPlat'])) {
    // Récupérer l'ID du plat à supprimer
    $idPlat = $_POST['idPlat'];

    // Requête SQL pour supprimer le plat de la table
    $sql = "DELETE FROM plat WHERE idPlat='$idPlat'";

    if (mysqli_query($conn, $sql)) {
        // Le plat a été supprimé avec succès
        echo 'Le plat a été supprimé avec succès.';
    } else {
        // Une erreur s'est produite lors de la suppression du plat
        echo 'Une erreur s\'est produite lors de la suppression du plat : ' . mysqli_error($conn);
    }
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
