<?php
include '../include/config.php';

// Vérification de la connexion à la base de données
if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

if (isset($_POST['ajouter'])) {

    // Récupération et cryptage des données
    $nom = $_POST['Nom'];
    $adresse = $_POST['Adresse'];
    $contact = $_POST['Contact'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

// Vérifie si le fichier est bien envoyé
if (isset($_FILES['Image']) && $_FILES['Image']['error'] === 0) {
    $image = file_get_contents($_FILES['Image']['tmp_name']);
   
    

    // Préparation de la requête SQL
    $stmt = $conn->prepare("INSERT INTO liste_hopital (nom,adresse,contact,image,latitude,longitude) VALUES (?,?,?,?,?,?)");

    if (!$stmt) {
        die("Erreur lors de la préparation de la requête : " . $conn->error);
    }

    // Liaison des paramètres
    $stmt->bind_param('ssssdd', $nom, $adresse, $contact, $image, $latitude, $longitude);

    // Exécution de la requête
    if ($stmt->execute()) {
        echo "<script>alert('Ajout réussie !');</script>";
        header('Location: ../back_office/liste_hopitale.php');
        exit();
    } else {
        echo "Erreur lors de l'insertion : " . $stmt->error;
    }

   }   // Fermeture du statement
    $stmt->close();
}
?>
