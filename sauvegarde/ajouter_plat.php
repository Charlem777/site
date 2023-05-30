<?php
// Inclure le fichier de configuration de la base de données
// Inclure le fichier de configuration de la base de données
require_once 'config.php';

// Établir la connexion à la base de données
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Vérifier la connexion
if (!$conn) {
    die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
} else {
    echo 'Connexion à la base de données réussie.';
}


// Vérifier si le formulaire d'ajout a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nomPlat = $_POST['nomPlatAdd'];
    $caloPlat = $_POST['caloPlatAdd'];
    $protPlat = $_POST['protPlatAdd'];
    $prixPlat = $_POST['prixPlatAdd'];
    $prixPlatF = $_POST['prixFinalAdd'];
    $Quantite = $_POST['quantiteAdd'];
 var_dump($_POST);
    // Requête SQL pour insérer le nouveau plat dans la table
    $sql = "INSERT INTO plat (nomPlat, caloPlat, protPlat, prixPlat) 
            VALUES ('$nomPlat', '$caloPlat', '$protPlat', '$prixPlat')";

    if (mysqli_query($conn, $sql)) {
        // Le plat a été ajouté avec succès
        echo 'Le plat a été ajouté avec succès.';
    } else {
        // Une erreur s'est produite lors de l'ajout du plat
        echo 'Une erreur s\'est produite lors de l\'ajout du plat : ' . mysqli_error($conn);
    }
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
