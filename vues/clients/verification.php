<?php
require '../api/connection.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $stmt = $bdd->prepare("SELECT id FROM utilisateurs WHERE token = :token AND est_active = 0");
    $stmt->execute(['token' => $token]);

    if ($stmt->rowCount() === 1) {
        $bdd->prepare("UPDATE utilisateurs SET est_active = 1, token = NULL WHERE token = :token")
            ->execute(['token' => $token]);

        echo "✅ Compte activé ! Vous pouvez maintenant vous connecter.";
    } else {
        echo "❌ Lien invalide ou compte déjà activé.";
    }
}
