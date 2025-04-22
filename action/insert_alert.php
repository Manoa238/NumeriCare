<?php
include '../include/config.php';


if (isset($_POST['EnvoiAlert'])) {
    $typeAlerte = $_POST["typeAlerte"] ?? "";
    $autreAlerte = $_POST["autreAlerte"] ?? "";
    $urgence = $_POST["urgence"] ?? "";
    $description = $_POST["description"] ?? "";
    $latitude = $_POST["latitude"] ?? null;
    $longitude = $_POST["longitude"] ?? null;

    if (isset($_FILES["photos"]) && is_array($_FILES["photos"]["error"])) {
        $uploadedFiles = [];
        $numFiles = count($_FILES["photos"]["name"]);
        for ($i = 0; $i < $numFiles; $i++) {
            if ($_FILES["photos"]["error"][$i] === UPLOAD_ERR_OK) {
                $tempFilePath = $_FILES["photos"]["tmp_name"][$i];
                $filename = basename($_FILES["photos"]["name"][$i]);
                $destinationPath = "uploads/" . $filename; 
                if (move_uploaded_file($tempFilePath, $destinationPath)) {
                    $uploadedFiles[] = $filename;
                } else {
                    error_log("Erreur lors du déplacement du fichier " . $filename);
                }
            } else {
                error_log("Erreur de téléchargement pour le fichier " . $_FILES["photos"]["name"][$i] . " : " . $_FILES["photos"]["error"][$i]);
            }
        }
        $photosString = implode(",", $uploadedFiles);
    } else {
        $photosString = "";
    }

    

    $sql = "INSERT INTO alertes (type_alerte, autre_alerte, urgence, description, latitude, longitude, photos, date_alerte) VALUES ( ?, ?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssdds', $typeAlerte, $autreAlerte, $urgence, $description, $latitude, $longitude, $photosString);


    if ($stmt->execute()) {
        echo "<script>alert('succes')</script>";
        header("Location: ../front_office/medecine/index.php#Alert");
        exit();
    } else {
        echo "Erreur lors de l'enregistrement de l'alerte: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Méthode non autorisée.";
}
?>