<?php
include '../include/config.php';

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

if (isset($_POST['connexion'])) {
    $nom = trim($_POST['Nom']);
    $mdp = $_POST['Mdp'];

    $nomEncode = base64_encode($nom); // nom encodé

    $stmt = $conn->prepare("SELECT * FROM user WHERE nom = ?");
    $stmt->bind_param('s', $nomEncode);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($mdp, $user['mdp'])) {
            // Redirection avec ?status=connexion
            header('Location: ../front_office/accueil.php?status=connexion');
            exit();
        } else {
            echo "<script>alert('Mot de passe incorrect');</script>";
        }
    } else {
        echo "<script>alert('Nom d\'utilisateur non trouvé');</script>";
    }

    $stmt->close();
}
?>
