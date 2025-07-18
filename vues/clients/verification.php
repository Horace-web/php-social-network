<?php
require '../../api/connection.php'; // ajuste selon ton chemin réel

$token = $_GET['token'] ?? null;
$message = '';

if ($token) {
    $stmt = $bdd->prepare("SELECT id FROM utilisateurs WHERE token = :token AND est_active = 0");
    $stmt->execute(['token' => $token]);

    if ($stmt->rowCount() === 1) {
        // Activation
        $bdd->prepare("UPDATE utilisateurs SET est_active = 1, token = NULL WHERE token = :token")
            ->execute(['token' => $token]);
        $message = "✅ Votre compte a été activé avec succès.";
    } else {
        $message = "❌ Lien invalide ou compte déjà activé.";
    }
} else {
    $message = "❌ Token manquant.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation</title>
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="text-center p-5 bg-white shadow rounded">
        <h2>Confirmation de compte</h2>
        <p class="mt-3"><?= $message ?></p>
        <?php if (str_starts_with($message, "✅")): ?>
            <a href="../../index.php" class="btn btn-success mt-3">Se connecter</a>
        <?php else: ?>
            <a href="../../index.php" class="btn btn-secondary mt-3">Retour à l'accueil</a>
        <?php endif; ?>
    </div>
</body>
</html>
