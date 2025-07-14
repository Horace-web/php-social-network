<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "formulaire";

$mysqli = new mysqli($host, $username, $password, $db);
if ($mysqli->connect_error) {
    http_response_code(500);
    echo "Erreur BDD";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo']) && isset($_POST['type'])) {
    $photo = $_FILES['photo'];
    $type = $_POST['type']; // 'profile' ou 'cover'

    $photo_name = uniqid() . "_" . basename($photo['name']);
    $target = "uploads/" . $photo_name;

    if (!is_dir("uploads")) {
        mkdir("uploads", 0777, true);
    }

    if (move_uploaded_file($photo['tmp_name'], $target)) {
        $user_id = 1;

        if ($type === 'profile') {
            $sql = "UPDATE users SET profile_photo = ? WHERE id = ?";
        } elseif ($type === 'cover') {
            $sql = "UPDATE users SET cover_photo = ? WHERE id = ?";
        } else {
            http_response_code(400);
            echo "Type invalide";
            exit;
        }

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("si", $photo_name, $user_id);
        $stmt->execute();
        $stmt->close();

        echo $target; // renvoyé au JavaScript pour affichage direct
    } else {
        http_response_code(500);
        echo "Échec de l'upload.";
    }
} else {
    http_response_code(400);
    echo "Requête invalide.";
}
$mysqli->close();
