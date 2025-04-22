<?php
include './include/config.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
        <title>Information Medical</title>
		
        <link rel="icon" href="img/favicon.png">
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/nice-select.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/icofont.css">
		<link rel="stylesheet" href="css/slicknav.min.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
		<link rel="stylesheet" href="css/datepicker.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
		
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">
		<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/alerter.css">
		
	<style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #eaf0f6;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    /* Preloader */
    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: white;
      z-index: 9999;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Header */
    .header {
      background: linear-gradient(to right, #1976d2, #2196f3);
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      position: relative;
      z-index: 99;
    }

    .header-inner {
      padding: 15px 0;
    }

    .logo img {
      max-width: 100%;
      height: auto;
    }

    .main-menu ul.nav li a {
      color: black;
      font-weight: 500;
      padding: 10px 15px;
    }

    .main-menu ul.nav li.active > a,
    .main-menu ul.nav li:hover > a {
      color:rgb(59, 95, 255);
    }

    .dropdown li a {
      color: #333 !important;
    }

    .dropdown li a:hover {
      color: #1976d2 !important;
    }

    .get-quote .btn {
      background: #1976d2;
      color:white;
      padding: 8px 20px;
      font-weight: 600;
      transition: all 0.3s;
    }

    .get-quote .btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    /* Main Content */
    .main-card {
      background-color: white;
      border-radius: 16px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.1);
      margin: 30px auto;
      padding: 25px;
      width: 95%;
      max-width: 1200px;
    }

    h1 {
      text-align: center;
      color: #2c3e50;
      margin: 0 0 20px;
      font-weight: 600;
    }

    .hospital-list {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 25px;
      margin-top: 30px;
    }

    .hospital-card-link {
      text-decoration: none;
      display: block;
      height: 100%;
    }

    .hospital-card {
      background-color: #fdfdfd;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      cursor: pointer;
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .hospital-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
    }

    .hospital-card img {
      width: 100%;
      border-radius: 10px;
      height: 200px;
      object-fit: cover;
      margin-bottom: 15px;
    }

    .hospital-name {
      font-size: 18px;
      font-weight: 600;
      text-align: center;
      color: #34495e;
      margin-bottom: 8px;
    }

    .hospital-address {
      font-size: 14px;
      text-align: center;
      color: #7f8c8d;
      margin-bottom: 8px;
      flex-grow: 1;
    }

    .hospital-contact {
      font-size: 14px;
      text-align: center;
      color: #2980b9;
      font-weight: 500;
    }

    /* Footer */
    #footer {
      background: #2c3e50;
      color: white;
      padding: 20px 0;
      margin-top: 30px;
    }

    .copyright-content {
      text-align: center;
      font-size: 14px;
    }

    .copyright-content a {
      color: #ffeb3b;
      text-decoration: none;
    }

    /* Animations */
    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(30px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .hospital-card {
      animation: fadeInUp 0.6s ease both;
    }

    /* Responsive Adjustments */
    @media (max-width: 991px) {
      .header-inner {
        padding: 10px 0;
      }
      
      .main-menu {
        margin-top: 15px;
      }
      
      .get-quote {
        margin-top: 15px;
        text-align: center;
      }
    }

    @media (max-width: 767px) {
      .main-card {
        padding: 20px 15px;
        margin: 20px auto;
      }
      
      .hospital-list {
        grid-template-columns: 1fr;
        gap: 20px;
      }
      
      .hospital-card img {
        height: 180px;
      }
    }

    @media (max-width: 575px) {
      .logo {
        text-align: center;
        margin-bottom: 10px;
      }
      
      .main-menu ul.nav li a {
        padding: 8px 10px;
        font-size: 14px;
      }
      
      .hospital-card {
        padding: 15px;
      }
      
      .hospital-name {
        font-size: 16px;
      }
    }
	/* Alerte */
		.AllContainer {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #eeeeee;
        }

		.alerte-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 10px;
            width: 90%;
            max-width: 700px;
        }

        #localisationInfo {
            font-size: 0.9em;
            color: #777;
            margin-bottom: 5px;
        }

        #localisationInfo button {
            background-color: #1A76D1;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 5px;
        }


        #localisationReussie {
            color: green;
            font-style: italic;
            margin-top: 5px;
        }

        #localisationErreur {
            color: red;
            margin-top: 5px;
        }

        #form-submit:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .custom-translate {
          position: fixed;
          top: 10rem;
          right: 20px;
          z-index: 1000;
          background-color: #1a76d1;
          color: white;
          border: none;
          border-radius: 8px;
          cursor: pointer;
          font-size: 14px;
  }
.lang-icon {
  font-size: 22px;
  background: #1a76d1;
  color: white;
  padding: 10px 14px;
  border-radius: 8px;
  border: none;
  cursor: pointer;
}
.translate-select-box {
  display: none;
  position: absolute;
  top: 50px;
  right: 0;
  background: white;
  padding: 8px;
  border-radius: 6px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}
input:focus {
  outline: 2px solid #1a76d1;
}
    </style>

  </style>
    </head>
    <body>
	
        <div class="preloader">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>

                <div class="indicator"> 
                    <svg width="16px" height="12px">
                        <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                        <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>

        <div class="custom-translate">
                  <button class="lang-icon" id="toggleTranslate">🌐</button>
                  <div class="translate-select-box" id="translateBox">
                    <div id="google_translate_element"></div>
                  </div>
                </div>
		<header class="header" >
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row"  >
							<div class="col-lg-3 col-md-3 col-12">
								<div class="logo">
									<a><img src="img/logo.png" alt="#"></a>
								</div>
								<div class="mobile-nav"></div>
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
											<li><a href="#">Accueil</a></li>
											<li><a href="#liste">Liste des hôpitaux</i></a></li>
											<li><a href="#Alert">Alerte</a></li>
                      <li><a href="index.html">Assistance</a></li>
										</ul>
									</nav>
								</div>
							</div>
							<div class="col-lg-2 col-12">
								<div class="get-quote">
									<a href="../accueil.php" class="btn">retour</a>
								</div>
                
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<section class="slider">
			<div class="hero-slider">
				<div class="single-slider" style="background-image:url('img/slider2.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Des services<span> Médicaux</span> dignes de votre <span>confiance !</span></h1>
									<p> Grâce à notre assistance vocale, il vous suffit de parler pour être guidé à travers les différentes pages du site. Que ce soit pour trouver des informations sur une pathologie, prendre rendez-vous, ou explorer nos services, notre assistant vocal vous accompagne en toute simplicité.</p>
									<div class="button">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="single-slider" style="background-image:url('img/slider.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Des services<span> Médicaux</span> dignes de votre <span>confiance !</span></h1>
									<p> Grâce à notre assistance vocale, il vous suffit de parler pour être guidé à travers les différentes pages du site. Que ce soit pour trouver des informations sur une pathologie, prendre rendez-vous, ou explorer nos services, notre assistant vocal vous accompagne en toute simplicité.</p>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="single-slider" style="background-image:url('img/slider3.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Des services<span> Médicaux</span> dignes de votre <span>confiance !</span></h1>
									<p> Grâce à notre assistance vocale, il vous suffit de parler pour être guidé à travers les différentes pages du site. Que ce soit pour trouver des informations sur une pathologie, prendre rendez-vous, ou explorer nos services, notre assistant vocal vous accompagne en toute simplicité.</p>
									<div class="button">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	<div class="main-card" id="liste">
    <h1>Liste des Hôpitaux</h1>
    <div class="hospital-list">
      <?php
      $stmt = $conn->prepare("SELECT * FROM liste_hopital");
      $stmt->execute();
      $resultat = $stmt->get_result();

      while ($row = $resultat->fetch_assoc()) {
        $imageData = base64_encode($row['image']);
      ?>
      <a href="#" class="hospital-card-link">
        <div class="hospital-card">
          <img src="data:image/jpeg;base64,<?= $imageData ?>" alt="<?= htmlspecialchars($row['nom']) ?>">
          <div class="hospital-name"><?= htmlspecialchars($row['nom']) ?></div>
          <div class="hospital-address"><?= htmlspecialchars($row['adresse']) ?></div>
          <div class="hospital-contact">0<?= htmlspecialchars($row['contact']) ?></div>
        </div>
      </a>
      <?php } ?>
    </div>
  </div>

  <div class="AllContainer" id="Alert">
        <div class="alerte-container">
            <div class="col-lg-12">
                <div class="contact-form">
                    <form id="contact" action="../../action/insert_alert.php" method="post" onsubmit="return validateLocation()">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 style="color: #1A76D1;">Signaler une Alerte</h4>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <label for="typeAlerte" style="font-weight: bold;">Type d'alerte :</label>
                                    <select id="typeAlerte" name="typeAlerte" required>
                                        <option value="">-- Veuillez sélectionner --</option>
                                        <option value="probleme_sante">Problème de santé urgent</option>
                                        <option value="accident">Accident</option>
                                        <option value="danger_securite">Danger pour la sécurité </option>
                                        <option value="autre">Autre</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <fieldset aria-placeholder="">
                                    <label for="urgence" style="font-weight: bold;">Niveau d'urgence :</label>
                                    <select id="urgence" name="urgence" required>
                                        <option value="">-- Veuillez sélectionner --</option>
                                        <option value="critique">Critique</option>
                                        <option value="eleve">Élevé</option>
                                        <option value="modere">Modéré</option>
                                        <option value="faible">Faible</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <label for="localisation" style="font-weight: bold;">Localisation :</label>
                                    <div id="localisationInfo">
                                        <span id="latitudeDisplay"></span>, <span id="longitudeDisplay"></span>
                                        <button type="button" onclick="getLocation()" class="btn">Obtenir ma position</button>
                                        <p id="localisationReussie" style="display:none;">Position obtenue !</p>
                                        <p id="localisationErreur" style="display:none;"></p>
                                    </div>
                                    <input type="hidden" id="latitudeInput" name="latitude" required>
                                    <input type="hidden" id="longitudeInput" name="longitude" required>
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <fieldset>
                                    <label for="photos" style="font-weight: bold;">Ajouter des photos (facultatif) :</label>
                                    <input type="file" id="photos" name="photos[]" multiple accept="image/*" style="margin-top: 20px; padding: 8px;">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="description" style="font-weight: bold;">Description détaillée de l'alerte :</label>
                                    <textarea id="description" name="description" rows="5" required placeholder="Décrivez précisément ce qui se passe, les personnes impliquées, etc."></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" name="EnvoiAlert" class="main-button-icon" disabled>Envoyer l'alerte</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
		
		<!-- Footer Area -->
		<footer id="footer" class="footer " style="margin-Top: 15px;">
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<div class="copyright-content">
								<p>© Copyright 2025  |  developpé par <a href="#" target="_blank">Great_Net</a> </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		
    <script src="js/jquery.min.js"></script>
		<script src="js/jquery-migrate-3.0.0.js"></script>
		<script src="js/jquery-ui.min.js"></script>
    <script src="js/easing.js"></script>
		<script src="js/colors.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.nav.js"></script>
		<script src="js/slicknav.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
		<script src="js/niceselect.js"></script>
		<script src="js/tilt.jquery.min.js"></script>
    <script src="js/owl-carousel.js"></script>
		<script src="js/jquery.counterup.min.js"></script>
		<script src="js/steller.js"></script>
		<script src="js/wow.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>

    <script>
    // Lecture vocale
    function speakText(text) {
      const utterance = new SpeechSynthesisUtterance(text);
      utterance.lang = 'fr-FR';
      speechSynthesis.speak(utterance);
    }

    // Reconnaissance vocale
    function startRecognition() {
      const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
      recognition.lang = 'fr-FR';
      recognition.start();

      recognition.onresult = function(event) {
        const speechResult = event.results[0][0].transcript.toLowerCase();
        if (speechResult.includes("accueil")) {
          speakText("Vous avez dit Page d'accueil. Vous allez être redirigé.");
          setTimeout(function() {
            window.location.href = "index.php";
          }, 2000);
        } 
		else if (speechResult.includes("liste")) {
          speakText("Vous avez dit Liste des hopitaux. Vous allez être redirigé.");
          setTimeout(function() {
            window.location.href = "index.php#liste";
          }, 2000);
        }
		else if (speechResult.includes("Alerte")) {
          speakText("Vous avez dit Alerte des hopitaux. Vous allez être redirigé.");
          setTimeout(function() {
            window.location.href = "index.php#Alert";
          }, 2000);
        }
		else if (speechResult.includes("retour")) {
          speakText("Vous avez dit retour à l'accueil. Vous allez être redirigé.");
          setTimeout(function() {
            window.location.href = "../accueil.php";
          }, 2000);
        }
		
		else {
          speakText("Je n'ai pas compris. Pouvez-vous répéter ?");
        }
		
      };

      recognition.onerror = function() {
        speakText("Désolé, il y a eu une erreur de reconnaissance.");
      };
    }

    // Lecture automatique de la page
    function readPage() {
      const textsToRead = [
        "Bienvenue sur la page Medical",
		"Pour naviguer, Vous devez dire accueil, Liste, Alerte ou retoure sur la page précédant"
      ];

      let textIndex = 0;

      function speakNextText() {
        if (textIndex < textsToRead.length) {
          speakText(textsToRead[textIndex]);
          textIndex++;
          setTimeout(speakNextText, 3000);
        } else {
          setTimeout(startRecognition, 3000);
        }
      }

      speakNextText();
    }

    window.onload = function() {
      readPage();
    };

    <script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'fr',
    includedLanguages: 'fr,en,de,es,it,mg,pt,zh-CN,ar,ru',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
    autoDisplay: false
  }, 'google_translate_element');
}

document.addEventListener("DOMContentLoaded", function() {
  const toggleBtn = document.getElementById("toggleTranslate");
  const translateBox = document.getElementById("translateBox");

  toggleBtn.addEventListener("click", function (e) {
    e.stopPropagation();
    translateBox.style.display = translateBox.style.display === "block" ? "none" : "block";
  });

  document.addEventListener("click", function () {
    translateBox.style.display = "none";
  });

  translateBox.addEventListener("click", function (e) {
    e.stopPropagation();
  });
});
</script>

<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



		<script>
        let positionObtenue = false;
        const submitButton = document.getElementById('form-submit');
        const localisationReussieMessage = document.getElementById('localisationReussie');
        const localisationErreurMessage = document.getElementById('localisationErreur');
        const latitudeInput = document.getElementById('latitudeInput');
        const longitudeInput = document.getElementById('longitudeInput');

        document.getElementById('typeAlerte').addEventListener('change', function() {
            var autreAlerteDiv = document.getElementById('autreAlerteDiv');
            var autreAlerteInput = document.getElementById('autreAlerte');
            if (this.value === 'autre') {
                const newFieldset = document.createElement('fieldset');
                const newLabel = document.createElement('label');
                newLabel.setAttribute('for', 'autreAlerte');
                newLabel.style.fontWeight = 'bold';
                newLabel.textContent = 'Précisez l\'autre type d\'alerte :';
                const newInput = document.createElement('input');
                newInput.type = 'text';
                newInput.id = 'autreAlerte';
                newInput.name = 'autreAlerte';
                newInput.placeholder = 'Précision';

                const parentDiv = this.closest('.col-lg-6.col-sm-12');
                if (parentDiv) {
                    parentDiv.parentNode.insertBefore(document.createElement('div'), parentDiv.nextSibling);
                    const newColDiv = document.createElement('div');
                    newColDiv.classList.add('col-lg-6', 'col-sm-12');
                    newFieldset.appendChild(newLabel);
                    newFieldset.appendChild(newInput);
                    newColDiv.appendChild(newFieldset);
                    parentDiv.parentNode.insertBefore(newColDiv, parentDiv.nextSibling);
                }
            } else {
                const nextColDiv = this.closest('.col-lg-6.col-sm-12')?.nextElementSibling;
                if (nextColDiv?.classList.contains('col-lg-6', 'col-sm-12')) {
                    nextColDiv.remove();
                }
            }
        });

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
                localisationErreurMessage.style.display = 'none';
            } else {
                document.getElementById("localisationInfo").innerHTML = "La géolocalisation n'est pas supportée par votre navigateur.";
                submitButton.disabled = true;
            }
        }

        function showPosition(position) {
            document.getElementById("latitudeDisplay").textContent = "Latitude: " + position.coords.latitude;
            document.getElementById("longitudeDisplay").textContent = ", Longitude: " + position.coords.longitude;
            latitudeInput.value = position.coords.latitude;
            longitudeInput.value = position.coords.longitude;
            positionObtenue = true;
            submitButton.disabled = false;
            localisationReussieMessage.style.display = 'block';
            localisationErreurMessage.style.display = 'none';
        }

        function showError(error) {
            var message;
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    message = "L'utilisateur a refusé la demande de géolocalisation.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    message = "Les informations de localisation ne sont pas disponibles.";
                    break;
                case error.TIMEOUT:
                    message = "Le délai pour obtenir la localisation a expiré.";
                    break;
                case error.UNKNOWN_ERROR:
                    message = "Une erreur inconnue s'est produite lors de la géolocalisation.";
                    break;
            }
            localisationErreurMessage.textContent = "Erreur de localisation : " + message + ". Veuillez réessayer.";
            localisationErreurMessage.style.display = 'block';
            submitButton.disabled = true;
            positionObtenue = false;
            localisationReussieMessage.style.display = 'none';
        }

        function validateLocation() {
            if (!positionObtenue) {
                alert("Veuillez obtenir votre position avant d'envoyer l'alerte.");
                return false;
            }
            return true;
        }
    </script>

    </body>
</html>