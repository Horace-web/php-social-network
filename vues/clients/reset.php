<?php
$token = $_GET['token'] ?? '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réinitialisation du mot de passe</title>
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">

    <div class="p-5 bg-white shadow rounded" style="min-width: 320px; max-width: 400px; width: 100%;">
        <h2 class="mb-4 text-center">Réinitialiser le mot de passe</h2>
        <form action="../../api/reset_password.php" method="POST" novalidate>
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

            <div class="mb-3">
                <label for="password" class="form-label">Nouveau mot de passe</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    required
                    placeholder="Entrez votre nouveau mot de passe"
                    minlength="6"
                >
            </div>

            <button type="submit" class="btn btn-primary w-100">Réinitialiser</button>
        </form>
    </div>

</body>
</html>
