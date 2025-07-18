<?php
session_start();
header('Content-Type: application/json');

// Supprimer toutes les variables de session
$_SESSION = [];

// Détruire la session
session_destroy();

// Retourner une réponse JSON de confirmation
echo json_encode([
    'success' => true,
    'message' => 'Déconnexion réussie.'
]);
?>

<script>
document.getElementById('btn-deconnexion').addEventListener('click', function (e) {
    e.preventDefault(); // Empêche un rechargement de page si c’est un lien

    fetch('deconnexion.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Vider sessionStorage si tu l’utilises pour stocker l'utilisateur
                sessionStorage.clear();

                // Rediriger vers la page de connexion 
                window.location.href = 'index.php'; 
            } else {
                alert('Erreur lors de la déconnexion.');
            }
        })
        .catch(error => {
            console.error('Erreur réseau :', error);
            alert('Impossible de se déconnecter.');
        });
});
</script>

