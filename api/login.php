<?php
session_start();
header('Content-Type: application/json');

require 'connection.php';

$email = filter_var($_POST['email_connexion'] ?? '', FILTER_SANITIZE_EMAIL);
$password = $_POST['password_connexion'] ?? '';

if (!$email || !$password) {
    echo json_encode(['success' => false, 'message' => 'Champs requis manquants.']);
    exit();
}

$req = $bdd->prepare("SELECT id, nom, prenom, motDePasse, est_active FROM utilisateurs WHERE email = :email");
$req->execute(['email' => $email]);
$user = $req->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo json_encode(['success' => false, 'message' => "Utilisateur introuvable."]);
    exit();
}

if (!password_verify($password, $user['motDePasse'])) {
    echo json_encode(['success' => false, 'message' => "Mot de passe incorrect."]);
    exit();
}

if (!$user['est_active']) {
    echo json_encode(['success' => false, 'message' => "Compte non activé."]);
    exit();
}

// Connexion réussie : on renvoie les infos utiles
echo json_encode([
    'success' => true,
    'user' => [
        'id' => $user['id'],
        'nom' => $user['nom'],
        'prenom' => $user['prenom'],
        'email' => $email
    ]
]);
?>