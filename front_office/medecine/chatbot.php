<?php
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$userMessage = strtolower($data['message']);

$rawResponses = file_get_contents('reponses.json');
$responses = json_decode($rawResponses, true);

$defaultResponse = "Désolé mais je ne peux encore vous aidez avec cela, essayer une autre mot clé";
$found = false;

foreach ($responses as $item) {
    foreach ($item['keywords'] as $keyword) {
        if (strpos($userMessage, strtolower($keyword)) !== false) {
            echo json_encode(['response' => $item['response']]);
            $found = true;
            break 2;
        }
    }
}

if (!$found) {
    echo json_encode(['response' => $defaultResponse]);
}
?>
