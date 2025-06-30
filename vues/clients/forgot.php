<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mot de passe oublié</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height:100vh;">
    <div class="card p-4 shadow w-100" style="max-width: 400px;">
        <h4 class="text-center">Réinitialisation</h4>
        <form method="POST" action="../../api/send_reset.php">
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Envoyer le lien</button>
        </form>
    </div>
</body>
</html>
