<?php
include '../include/config.php';
header('Content-Type: application/json');

// Requête SQL pour récupérer toutes les colonnes utiles
$sql = "SELECT 
            id_alerte, 
            type_alerte, 
            autre_alerte, 
            urgence, 
            description, 
            latitude, 
            longitude, 
            photos, 
            date_alerte 
        FROM alertes";

$result = $conn->query($sql);

$alertes = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $alertes[] = $row;
    }
}

echo json_encode($alertes);
$conn->close();
?>
