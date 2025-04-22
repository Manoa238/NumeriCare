const apiKey = "cdff5bf00fd6a6751a2447d33551f47a";

async function getWeather() {
  const city = document.getElementById("cityInput").value.trim();
  if (!city) return;

  const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&lang=fr&units=metric`;

  try {
    const res = await fetch(url);
    if (!res.ok) throw new Error("Ville introuvable");

    const data = await res.json();

    document.getElementById("temp").textContent = `${Math.round(data.main.temp)}°C`;
    document.getElementById("desc").textContent = data.weather[0].description;
    document.getElementById("humidity").textContent = `${data.main.humidity}%`;
    document.getElementById("wind").textContent = `${Math.round(data.wind.speed)} km/h`;
    document.getElementById("weatherIcon").src = `https://openweathermap.org/img/wn/${data.weather[0].icon}@4x.png`;
    document.getElementById("weatherIcon").style.display = "block";
    document.getElementById("errorMsg").style.display = "none";

  } catch (error) {
    document.getElementById("errorMsg").style.display = "block";
    document.getElementById("temp").textContent = '';
    document.getElementById("desc").textContent = '';
    document.getElementById("humidity").textContent = '--%';
    document.getElementById("wind").textContent = '-- km/h';
    document.getElementById("weatherIcon").style.display = "none";
  }
}

// Google Translate toggle
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

function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'fr',
    includedLanguages: 'fr,en,de,es,it,mg,pt,zh-CN,ar,ru',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
    autoDisplay: false
  }, 'google_translate_element');
}
