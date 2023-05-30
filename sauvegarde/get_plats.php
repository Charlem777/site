<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestionresto";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Requête SQL pour récupérer les plats
$sql = "SELECT * FROM plat";
$result = $conn->query($sql);

// Vérifier s'il y a des résultats
if ($result->num_rows > 0) {
    // Créer un tableau pour stocker les plats
    $plats = array();

    // Parcourir les résultats et les ajouter au tableau
    while ($row = $result->fetch_assoc()) {
        $plats[] = $row;
    }

    // Convertir le tableau en format JSON et le renvoyer
    echo json_encode($plats);
} else {
    // Aucun plat trouvé
    echo "Aucun plat trouvé.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
