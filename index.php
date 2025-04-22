<?php 
  include "./include/config.php"
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>NumeriCare</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/bootstrap/css/bienvenue.css">
  <script src="assets/js/theme.js"></script>

  <style>
    :root {
      --bg-light: rgb(181, 207, 255);
      --bg-dark: #1e1e2f;
      --text-light: #2c3e50;
      --text-dark: #f0f0f0;
      --card-bg-light: #EDEAE5;
      --card-bg-dark: #2b2b3e;
    }

    body {
      background: var(--bg-light);
      color: var(--text-light);
      transition: background 0.5s ease, color 0.5s ease;
    }

    body.dark-mode {
      background: var(--bg-dark) !important;
      color: var(--text-dark);
    }

    body.dark-mode .service-card {
      background-color: var(--card-bg-dark) !important;
      color: var(--text-dark);
    }

    body.dark-mode .card {
      background-color: #2d2d44 !important;
      color: var(--text-dark);
    }

    body.dark-mode .ctn {
      color: var(--text-dark);
    }

    body.dark-mode h1,
    body.dark-mode h2,
    body.dark-mode p {
      color: var(--text-dark) !important;
    }

    .theme-toggle {
      position: fixed;
      top: 15px;
      left: 15px;
      z-index: 1000;
      background-color: #1a76d1;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
    }

    .containers {
      position: relative;
      width: auto;
      background-image: none;
      color: white;
      padding: 7rem 20px 20px 20px;
      border: none;
      font-size: 16px;
      z-index: 1;
      cursor: pointer;
      text-decoration: none;
      text-align: center;
      justify-content: center;
      align-items: center;
      transition: background-color 0.3s ease;
      animation: backgroundAnimation 20s ease infinite;
    }

    .containers::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url('./assets/img/200.webp');
      background-size: cover;
      background-position: center;
      filter: blur(7px);
      z-index: -1;
    }

    .ctn {
      transition: background-color 0.3s ease;
      animation: backgroundAnimation 20s ease infinite;
    }

    .btn-container {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 15px;
    }

    @keyframes bordureAnimation {
      0% {
        border-color: #8b4a4a;
      }

      25% {
        border-color: #a6ad39;
        box-shadow: 0 0 10px #664457;
      }

      50% {
        border-color: #924169;
        box-shadow: 0 0 10px #ff81c0;
      }

      75% {
        border-color: #5d8ea7;
        box-shadow: 0 0 10px #44687a;
      }

      100% {
        border-color: #c92929;
        box-shadow: 0 0 10px #693737;
      }
    }
  </style>
</head>

<body>
  <button class="theme-toggle" onclick="toggleTheme()">🌙 / ☀️</button>
  

  <div class="container">
    <div class="card shadow-lg o-hidden border-0 my-5" style="border-radius: 35px;">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-5 d-none d-lg-flex">
            <div class="containers">
              <div class="ctn">
                <img src="assets/img/secur.png" alt="technologie évolutive" style="width: 120px; border-radius: 50%;">
                <h1 style="font-weight: bold;">NumeriCare</h1>
                <p style="margin: 15px;">Une vie en sécurité, c’est un monde en paix!</p>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <img src="assets/img/smart-home.png" alt="tech" width="15%" style="margin-bottom: 10px;">
                <h2 style="font-weight: bold;">Bienvenue sur NumeriCare</h2>
              </div>
              <section class="intro">
                <div class="container">
                  <div class="service-card" style="text-align: center; background-color: #EDEAE5">
                    <p class="phrase">
                      Un site de sécurité dans le monde dans les domaines de la santé et du catastrophe.
                      La sécurité n'est pas un luxe, c'est un droit. Nous en faisons une réalité.
                    </p>
                  </div>
                  <div class="btn-container">
                    <button style="border-radius: 10px; width: 130px; height: 50px; border-width: 3px;">
                      <a href="./front_office/accueil.php" style="text-decoration: none; color: inherit;">Ouvrir</a>
                    </button>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Appliquer le thème sauvegardé
    document.addEventListener("DOMContentLoaded", function () {
  const theme = localStorage.getItem("theme");
  if (theme === "dark") {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }
});

  </script>

  

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
  <script src="assets/js/script.min.js"></script>
  
</body>
</html>
