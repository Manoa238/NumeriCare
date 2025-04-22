<?php
include "../include/config.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Récupérer tous les hôpitaux depuis la base de données
$sql = "SELECT * FROM liste_hopital";
$result = $conn->query($sql);

$hospitals = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Stocker les informations de chaque hôpital
        $hospitals[] = [
            'nom' => $row["nom"],
            'latitude' => $row["latitude"],
            'longitude' => $row["longitude"],
            'image' => $row["image"],
            'adresse' => $row["adresse"]
        ];
    }
} else {
    echo "Aucun hôpital disponible.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte des Hôpitaux</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <style>
        #map {
            height: 500px;
        }
        .popup-content {
            width: 200px;
        }
        #findClosest {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 1000;
            padding: 10px;
            background-color: white;
            border: 1px solid #ccc;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="w3-animate-top">
    <h1 style="display: flex; align-items: center; justify-content: center; gap: 10px;">
        <img src="https://cybergorad.alwaysdata.net/carte.gif" alt="GIF" style="height: 40px;">
        Carte des hopitaux 
    </h1>
</div>

<button id="findClosest">Trouver l'hôpital le plus proche</button>

<div id="map"></div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

<script>
    var map = L.map('map').setView([0, 0], 2); // Initial view

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var hospitals = <?php echo json_encode($hospitals); ?>;
    var userLocation;
    var closestHospital;

    // Créer une icône personnalisée pour les hôpitaux (GIF)
    var hospitalIcon = L.icon({
        iconUrl: 'https://cybergorad.alwaysdata.net/sante.gif',
        iconSize: [32, 32], // Ajustez la taille selon vos besoins
        iconAnchor: [16, 16], // Ajustez le point d'ancrage
        popupAnchor: [0, -16] // Ajustez le point de la popup
    });

    function calculateDistance(lat1, lon1, lat2, lon2) {
        var R = 6371; // Radius of the earth in km
        var dLat = deg2rad(lat2 - lat1);
        var dLon = deg2rad(lon2 - lon1);
        var a =
            Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c; // Distance in km
        return d;
    }

    function deg2rad(deg) {
        return deg * (Math.PI / 180);
    }

    function findClosestHospital(userLat, userLon) {
        var minDistance = Infinity;
        var closest = null;

        hospitals.forEach(function(hospital) {
            var distance = calculateDistance(userLat, userLon, hospital.latitude, hospital.longitude);
            if (distance < minDistance) {
                minDistance = distance;
                closest = hospital;
            }
        });

        return closest;
    }

    function showRoute(startLat, startLon, endLat, endLon) {
        L.Routing.control({
            waypoints: [
                L.latLng(startLat, startLon),
                L.latLng(endLat, endLon)
            ],
            routeWhileDragging: true
        }).addTo(map);
    }

    document.getElementById('findClosest').addEventListener('click', function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                userLocation = {
                    latitude: position.coords.latitude,
                    longitude: position.coords.longitude
                };

                closestHospital = findClosestHospital(userLocation.latitude, userLocation.longitude);

                if (closestHospital) {
                    showRoute(userLocation.latitude, userLocation.longitude, closestHospital.latitude, closestHospital.longitude);

                    L.marker([closestHospital.latitude, closestHospital.longitude], {icon: hospitalIcon}).addTo(map).bindPopup(closestHospital.nom);
                } else {
                    alert("Aucun hôpital trouvé à proximité.");
                }

            }, function() {
                alert("Impossible de récupérer votre position.");
            });
        } else {
            alert("La géolocalisation n'est pas supportée par votre navigateur.");
        }
    });

    hospitals.forEach(function(hospital) {
        L.marker([hospital.latitude, hospital.longitude], {icon: hospitalIcon}).addTo(map).bindPopup(hospital.nom);
    });

</script>

</body>
</html>