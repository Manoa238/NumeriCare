<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Carte des alertes en temps réel</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        #map {
            height: 500px;
            width: 100%;
        }

        /* Positionnement du champ de recherche */
        .leaflet-control-geocoder {
            z-index: 1000 !important;
        }
    </style>
</head>
<body>

<!-- Section des descriptions des alertes -->
<div id="alertes-description" class="w3-card w3-white w3-padding" style="position: absolute; top: 20px; left: 50px; z-index: 999; max-width: 300px; max-height: 400px; overflow-y: scroll; border-radius: 8px;">
    <h4 class="w3-text-red">📋 Alertes récentes</h4>
    <div id="description-list">Chargement...</div>
</div>

<div class="w3-animate-top">
    <h1 style="display: flex; align-items: center; justify-content: center; gap: 10px;">
        <img src="https://cybergorad.alwaysdata.net/carte.gif" alt="GIF" style="height: 40px;">
        Carte des alertes en temps réel
    </h1>
</div>

<div id="map"></div>

<script>
// Initialisation de la carte centrée sur Madagascar
var map = L.map('map').setView([-18.8792, 47.5079], 6);

// Ajout de la couche OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// Icône rouge animé
const redIcon = L.icon({
    iconUrl: 'https://cybergorad.alwaysdata.net/location_animated.gif',
    shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});

let markers = [];

function addAlertes(alertes) {
    markers.forEach(marker => map.removeLayer(marker));
    markers = [];

    const descriptionList = document.getElementById("description-list");
    descriptionList.innerHTML = ""; // Reset

    alertes.forEach(function(alert, index) {
        const lat = parseFloat(alert.latitude);
        const lon = parseFloat(alert.longitude);

        let popupContent = `
            <strong>📍 Type :</strong> ${alert.type_alerte}<br>
            ${alert.autre_alerte ? `<strong>🔍 Autre :</strong> ${alert.autre_alerte}<br>` : ""}
            <strong>🚨 Urgence :</strong> ${alert.urgence}<br>
            <strong>📝 Description :</strong><br>${alert.description}<br>
            <strong>📅 Date :</strong> ${alert.date_alerte}<br>
        `;

        if (alert.photos) {
            popupContent += `<br><img src="${alert.photos}" alt="Photo alerte" style="width:100px; border-radius:8px;">`;
        }

        const marker = L.marker([lat, lon], { icon: redIcon })
            .addTo(map)
            .bindPopup(popupContent);

        markers.push(marker);

        // Affichage dans la section en haut à gauchea
        const alertHtml = `
            <div class="w3-margin-bottom">
                <strong>${alert.type_alerte}</strong> - ${alert.urgence}<br>
                <span class="w3-small">${alert.description.slice(0, 100)}...</span>
                <hr style="margin: 5px 0;">
            </div>
        `;
        descriptionList.innerHTML += alertHtml;
    });
}

function fetchAlertes() {
    fetch('fetch_alertes.php')
        .then(response => response.json())
        .then(data => addAlertes(data))
        .catch(error => console.error('Erreur fetch alertes:', error));
}

setInterval(fetchAlertes, 5000);
fetchAlertes();

L.Control.geocoder({
    defaultMarkGeocode: true,
    placeholder: "Rechercher un lieu...",
    collapsed: false
}).addTo(map);
</script>

</body>

</html>
