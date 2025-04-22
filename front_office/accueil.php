<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NumeriCare</title>
  <link href="https://fonts.googleapis.com/css2?family=Billabong&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background: linear-gradient(135deg, #ecf0f3, #d0e4f6);
      overflow-x: hidden;
      display: flex
    }
    .notification {
      display: none;
      position: fixed;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #1a76d1;
      color: #fff;
      padding: 16px 24px;
      border-radius: 8px;
      font-weight: bold;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      z-index: 2000;
    }

    .custom-translate {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 1000;
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
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    .main-card {
      margin: 5rem auto;
      width: 90%;
      max-width: 1000px;
      background-color: #ffffff;
      padding: 40px;
      border-radius: 20px;
      text-align: center;
      position: relative;
      border: 6px solid transparent;
      animation: borderColorAnimation 6s linear infinite;
      box-shadow:
        0 15px 30px rgba(0, 0, 0, 0.15),
        0 10px 10px rgba(0, 0, 0, 0.05),
        inset 0 1px 1px rgba(255, 255, 255, 0.1);
    }

    @keyframes borderColorAnimation {
      0% { border-color: #9cecfb; box-shadow: 0 0 10px #9cecfb; }
      25% { border-color: #fbc2eb; box-shadow: 0 0 10px #fbc2eb; }
      50% { border-color: #9f84df; box-shadow: 0 0 10px #9f84df; }
      75% { border-color: #fcf969; box-shadow: 0 0 10px #fcf969; }
      100% { border-color: #9cecfb; box-shadow: 0 0 10px #9cecfb; }
    }

    h2 {
      color: #2c3e50;
      font-size: 2.5rem;
      margin-bottom: 2rem;
    }

    .card {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .card-inner {
      width: 250px;
      height: 420px;
      position: relative;
      transform-style: preserve-3d;
      transition: transform 1s;
      margin: 20px;
    }

    .card-inner:hover {
      transform: rotateY(180deg);
    }

    .card-front,
    .card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .card-front {
      background: #a7c5da;
      color: white;
    }

    .card-back {
      background: #5680af;
      color: white;
      transform: rotateY(180deg);
      text-align: center;
    }

    .card-front img,
    .card-back img {
      margin-bottom: 20px;
      animation: float 2s infinite ease-in-out;
    }

    @keyframes float {
      0% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0); }
    }

    .controls {
      position: fixed;
      bottom: 20px;
      right: 20px;
      display: flex;
      gap: 10px;
      z-index: 1000;
    }

    .controls button {
      background: #1a76d1;
      border: none;
      color: white;
      padding: 12px;
      border-radius: 8px;
      font-size: 24px;
      cursor: pointer;
    }

    /* Media query pour les écrans plus grands (tablettes et ordinateurs) */
    @media (min-width: 769px) {
            .main-card {
                width: 90%;
                max-width: 1000px;
                padding: 40px;
                border-radius: 20px;
                border: 6px solid transparent;
                margin: 5rem auto;
            }

            h2 {
                font-size: 2.5rem;
                margin-bottom: 2rem;
            }

            .card {
                flex-direction: row;
                justify-content: center;
                gap: 40px;
                padding: 0;
                margin: 10px;
            }

            .card-inner {
                width: 300px;
                height: 420px;
                gap: 20px;
            }

            .card-front,
            .card-back {
                padding: 20px;
                border-radius: 15px;
            }

            .controls {
                right: 20px;
                left: auto;
            }
        }
  </style>
</head>
<body>
<div id="notification" class="notification"></div>

<!-- Traduction Google -->
<div class="custom-translate">
  <button class="lang-icon" id="toggleTranslate">🌐</button>
  <div class="translate-select-box" id="translateBox">
    <div id="google_translate_element"></div>
  </div>
</div>

<!-- Contrôles vocaux -->
<div class="controls">
  <button onclick="startReading()" title="Lire le contenu">🔊</button>
  <button onclick="startVoiceCommand()" title="Commande vocale">🎤</button>
</div>

<!-- Contenu principal -->
<div class="main-card" style="margin-top: 10px">
  <section class="services" id="services">
    <h2>Nos Services</h2>
    <div class="card" style="padding: 10px">
      <a href="./medecine/">
        <div class="card-inner">
          <div class="card-front">
            <img src="../assets/img/sante.gif" alt="Santé" style="width:150px; height:300px" />
            <p style="font-size:30px"><strong>Santé</strong></p>
          </div>
          <div class="card-back">
            <img src="../assets/img/healthcare.png" alt="santé" style="width:200px; height:200px" />
            <p>La sécurité en matière de santé n’est pas un luxe, c’est un engagement quotidien.</p>
          </div>
        </div>
      </a>

      <a href="weather.php">
        <div class="card-inner">
          <div class="card-front" style="margin-right: 30px">
            <img src="../assets/img/cata.gif" alt="Climat" style="width:150px; height:300px" />
            <p style="font-size:26px"><strong>Changement Climatique</strong></p>
          </div>
          <div class="card-back">
            <img src="../assets/img/cata.png" alt="urgence" />
            <p>Être préparé face aux catastrophes, c’est se donner une chance de sauver des vies.</p>
          </div>
        </div>
      </a>
    </div>
  </section>
</div>

<!-- Google Translate -->
<script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'fr',
    includedLanguages: 'fr,en,de,es,it,mg,pt,zh-CN,ar,ru',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
  }, 'google_translate_element');
}

document.addEventListener("DOMContentLoaded", function () {
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

  // Forcer chargement des voix (nécessaire pour certains navigateurs)
  window.speechSynthesis.onvoiceschanged = () => {
    speechSynthesis.getVoices();
  };

});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  const status = urlParams.get('status');
  const notification = document.getElementById('notification');

  if (status === 'connexion') {
    showNotification("✅ Vous êtes connecté");
  } else if (status === 'inscription') {
    showNotification("✅ Inscription réussie");
  }

  function showNotification(message) {
    notification.textContent = message;
    notification.style.display = 'block';
    setTimeout(() => {
      notification.style.display = 'none';
    }, 3000);
  }
});
</script>

<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<!-- Lecture vocale -->
<script>
function startReading() {
  const elementsToRead = document.querySelectorAll('h2, p');
  let content = '';

  elementsToRead.forEach(element => {
    if (element.offsetParent !== null) {
      content += element.innerText + ' ';
    }
  });

  const utterance = new SpeechSynthesisUtterance(content);
  const voices = window.speechSynthesis.getVoices();
  const frenchVoice = voices.find(voice => voice.lang.startsWith('fr'));

  if (frenchVoice) {
    utterance.voice = frenchVoice;
  } else {
    utterance.lang = "fr-FR";
  }

  speechSynthesis.cancel();
  speechSynthesis.speak(utterance);
}
</script>

<!-- Commande vocale -->
<script>
function startVoiceCommand() {
  if (!('webkitSpeechRecognition' in window)) {
    alert("Votre navigateur ne supporte pas la reconnaissance vocale.");
    return;
  }

  const recognition = new webkitSpeechRecognition();
  recognition.lang = "fr-FR";
  recognition.start();

  recognition.onresult = function(event) {
    const result = event.results[0][0].transcript.toLowerCase();
    if (result.includes("santé")) {
      window.location.href = "sante.php";
    } else if (result.includes("climat") || result.includes("météo")) {
      window.location.href = "climat.php";
    } else {
      const errorSpeech = new SpeechSynthesisUtterance("Service non reconnu, veuillez dire santé ou climat.");
      errorSpeech.lang = "fr-FR";
      speechSynthesis.speak(errorSpeech);
    }
  };
}
</script>
</body>
</html>
