<?php
// Inclure le fichier de configuration de la base de données
require_once 'config.php';

// Établir la connexion à la base de données
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Vérifier si une erreur s'est produite lors de la connexion
if (mysqli_connect_errno()) {
    // Une erreur s'est produite
    echo 'Erreur de connexion à la base de données : ' . mysqli_connect_error();
    // Arrêter l'exécution du script ou effectuer d'autres actions en cas d'erreur
} else {
    // La connexion à la base de données a réussi
  

    // Vérifier si l'ID du plat est fourni
    if (isset($_GET['id'])) {
        // Récupérer l'ID du plat depuis la requête GET
        $platId = $_GET['id'];

        // Requête SQL pour récupérer les détails du plat en fonction de son ID
        $sql = "SELECT * FROM plat WHERE idPlat = $platId";

        // Exécuter la requête SQL
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            // Récupérer les données du plat
            $plat = mysqli_fetch_assoc($result);

            // Retourner les détails du plat au format JSON
            echo json_encode($plat);
        } else {
            // Aucun plat trouvé avec l'ID spécifié
            echo json_encode(array('error' => 'Plat non trouvé.'));
        }
    } else {
        // Aucun ID de plat fourni
        echo json_encode(array('error' => 'ID de plat non spécifié.'));
    }
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
