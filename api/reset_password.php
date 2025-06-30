<?php
require 'connection.php';

$token = $_POST['token'] ?? '';
$password = $_POST['password'] ?? '';

if (strlen($password) < 8) {
    die("Mot de passe trop court.");
}

$stmt = $bdd->prepare("SELECT id, reset_expires FROM utilisateurs WHERE reset_token = :token");
$stmt->execute(['token' => $token]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || strtotime($user['reset_expires']) < time()) {
    die("Lien invalide ou expiré.");
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$update = $bdd->prepare("UPDATE utilisateurs SET motDePasse = :pass, reset_token = NULL, reset_expires = NULL WHERE id = :id");
$update->execute([
    'pass' => $hash,
    'id' => $user['id']
]);

echo "✅ Mot de passe mis à jour avec succès.";
?>