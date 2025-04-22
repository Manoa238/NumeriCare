<?php
include '../include/config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un Hôpital</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f4f8;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .container {
      background-color: #fff;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      color: #333;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 600;
      color: #555;
    }

    input[type="text"],
    input[type="tel"],
    input[type="file"] {
      width: 100%;
      padding: 0.75rem;
      margin-bottom: 1.25rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
    }

    button {
      width: 100%;
      padding: 0.8rem;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #0056b3;
    }

    @media (max-width: 500px) {
      .container {
        margin: 1rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Ajouter un Hôpital</h2>
    <form action="../action/insertion_liste.php" method="post" enctype="multipart/form-data"  style="padding: 3rem;">
      <label for="nom">Nom de l'hôpital</label>
      <input type="text" id="nom" name="Nom" required>

      <label for="adresse">Adresse</label>
      <input type="text" id="adresse" name="Adresse" required>

      <label for="contact">Contact</label>
      <input type="tel" id="contact" name="Contact" required>

      <label for="adresse">Latitude</label>
      <input type="text" id="latitude" name="latitude" required>

      <label for="contact">longitude</label>
      <input type="tel" id="longitude" name="longitude" required>

      <label for="image">Image</label>
      <input type="file" id="image" name="Image" accept="image/*">

      <button name="ajouter"type="submit">Ajouter</button>
      <a href="liste_hopitale.php" style="margin: 8rem;">Retour</a>
    </form>
  </div>
</body>
</html>
