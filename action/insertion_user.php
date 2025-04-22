<?php
include '../include/config.php';

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

if (isset($_POST['inscription'])) {
    $nom = base64_encode($_POST['Nom']);
    $mdp = password_hash($_POST['Mdp'], PASSWORD_DEFAULT);
    $adr = base64_encode($_POST['Adresse']);
    $mail = $_POST['Email'];

    $stmt = $conn->prepare("INSERT INTO user (nom, mdp, mail, adresse) VALUES (?, ?, ?, ?)");

    if (!$stmt) {
        die("Erreur lors de la préparation de la requête : " . $conn->error);
    }

    $stmt->bind_param('ssss', $nom, $mdp, $mail, $adr);

    if ($stmt->execute()) {
        // Redirection vers services.php avec statut d'inscription
        header('Location: ../front_office/accueil.php?status=inscription');
        exit();
    } else {
        echo "Erreur lors de l'inscription, veuillez réessayer : " . $stmt->error;
    }

    $stmt->close();
}
?>
