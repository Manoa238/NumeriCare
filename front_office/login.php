<?php include '../include/config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Inscription et connexion</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>

<!-- Bouton de traduction Google -->
<div class="custom-translate">
  <button class="lang-icon" id="toggleTranslate">🌐</button>
  <div class="translate-select-box" id="translateBox">
    <div id="google_translate_element"></div>
  </div>
</div>

<div class="container" id="container">
  <!-- Section Inscription -->
  <div class="form-container sign-up" id="formInscription">
    <form action="../action/insertion_user.php" method="post" enctype="multipart/form-data">
      <h1>Inscription</h1>
      <input type="text" placeholder="Votre nom" name="Nom" required />
      <input type="email" placeholder="Votre email" name="Email" required />
      <input type="password" placeholder="Mot de passe" name="Mdp" required />
      <input type="text" placeholder="Votre adresse" name="Adresse" required />
      <button name="inscription" style="background-color:#1a76d1;">S'inscrire</button>
    </form>
  </div>

  <!-- Section Connexion -->
  <div class="form-container sign-in" id="formConnexion">
    <form action="../action/connexion_user.php" method="post" enctype="multipart/form-data">
      <h1>Connexion</h1>
      <input type="text" placeholder="Votre nom" name="Nom" required />
      <input type="password" placeholder="Votre mot de passe" name="Mdp" required />
      <button name="connexion" style="background-color:#1a76d1;">Se connecter</button>
    </form>
  </div>

  <!-- Boutons Toggle pour basculer entre les sections -->
  <div class="toggle-container">
    <div class="toggle" style="background-color:#1a76d1;">
      <div class="toggle-panel toggle-left">
        <h1>Salut 🙂</h1>
        <p>Entre tes informations sur ton formulaire</p>
        <button class="hidden" id="login">Se connecter</button>
      </div>
      <div class="toggle-panel toggle-right">
        <h1>Te revoilà  😊</h1>
        <p>Entre les informations de ton compte</p>
        <button class="hidden" id="register">S'inscrire</button>
      </div>
    </div>
  </div>
</div>

<!-- Boutons audio -->
<div style="position: fixed; bottom: 20px; right: 20px; display: flex; gap: 10px; z-index: 999;">
  <button id="vocalToggleBtn" title="Lire l'écran" style="background-color:#1a76d1; color:white; border:none; padding:10px; border-radius:50%;">
    <i id="vocalIcon" class="fas fa-volume-up"></i>
  </button>
  <button id="speechInputBtn" title="Remplir vocalement" style="background-color:#1a76d1; color:white; border:none; padding:10px; border-radius:50%;">
    <i class="fas fa-microphone"></i>
  </button>
</div>

<!-- Scripts -->
<script src="../assets/js/script.js"></script>

<!-- Google Translate -->
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
const synth = window.speechSynthesis;
let selectedVoice = null;
let isSpeaking = false;
let inputs = [];
let currentInput = 0;

function initVoice() {
  const voices = synth.getVoices();
  const lang = document.documentElement.lang || "fr";
  selectedVoice = voices.find(v => v.lang.startsWith(lang)) || voices.find(v => v.lang === "fr-FR");
}
speechSynthesis.onvoiceschanged = initVoice;
initVoice();

// Lecture vocale
function getActiveText() {
  const visibleForm = document.querySelector('.sign-up').offsetParent ? document.querySelector('.sign-up') : document.querySelector('.sign-in');
  let text = '';

  visibleForm.querySelectorAll('h1, input[placeholder], button').forEach(el => {
    text += (el.placeholder || el.innerText || '') + '. ';
  });
  return text;
}

document.getElementById("vocalToggleBtn").addEventListener("click", () => {
  if (isSpeaking) {
    synth.cancel();
    isSpeaking = false;
    document.getElementById("vocalIcon").className = "fas fa-volume-up";
    return;
  }

  const utterance = new SpeechSynthesisUtterance(getActiveText());
  utterance.voice = selectedVoice;
  utterance.lang = selectedVoice?.lang || "fr-FR";
  utterance.rate = 1;

  utterance.onend = () => {
    isSpeaking = false;
    document.getElementById("vocalIcon").className = "fas fa-volume-up";
  };

  synth.speak(utterance);
  isSpeaking = true;
  document.getElementById("vocalIcon").className = "fas fa-volume-mute";
});

// Reconnaissance vocale
const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
recognition.lang = 'fr-FR';
recognition.interimResults = false;
recognition.maxAlternatives = 1;

document.getElementById("speechInputBtn").addEventListener("click", () => {
  const visibleForm = document.querySelector('.sign-up').offsetParent ? document.getElementById("formInscription") : document.getElementById("formConnexion");
  inputs = Array.from(visibleForm.querySelectorAll("input"));
  currentInput = 0;
  nextInput();
});

function nextInput() {
  if (currentInput >= inputs.length) {
    const button = inputs[0].closest("form").querySelector("button");
    const confirmText = "Souhaitez-vous " + button.innerText + " ?";
    const utter = new SpeechSynthesisUtterance(confirmText);
    utter.voice = selectedVoice;
    utter.lang = selectedVoice?.lang || "fr-FR";
    synth.speak(utter);

    utter.onend = () => {
      recognition.start();
      recognition.onresult = (event) => {
        const response = event.results[0][0].transcript.toLowerCase();
        if (["oui", "yes", "ye", "ya"].includes(response)) {
          button.click();
        }
      };
    };
    return;
  }

  const input = inputs[currentInput];
  input.focus();

  const utter = new SpeechSynthesisUtterance(input.placeholder || "Champ");
  utter.voice = selectedVoice;
  utter.lang = selectedVoice?.lang || "fr-FR";
  synth.speak(utter);

  utter.onend = () => {
    recognition.start();
    recognition.onresult = (event) => {
      input.value = event.results[0][0].transcript;
      currentInput++;
      nextInput();
    };
  };
}

// Toggle bascule
document.getElementById("login").addEventListener("click", () => {
  document.querySelector(".sign-in").style.display = "block";
  document.querySelector(".sign-up").style.display = "none";
});

document.getElementById("register").addEventListener("click", () => {
  document.querySelector(".sign-up").style.display = "block";
  document.querySelector(".sign-in").style.display = "none";
});
</script>

<style>
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
  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}
input:focus {
  outline: 2px solid #1a76d1;
}
</style>


<script src="./assets/js/script.js"></script>

</body>
</html>
