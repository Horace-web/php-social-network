<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<style>
     body {
        background-color: #f0f2f5;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border-radius: 10px;
        margin-top: 50px;
    }

    .card-header {
        background-color: #fff;
        border-bottom: none;
        padding: 0;
    }

    .card-header .btn {
        background-color: #1877f2;
        color: white;
        border: none;
        font-weight: 600;
        padding: 15px 0;
        border-radius: 0;
        transition: background-color 0.3s ease;
    }

    .card-header .btn:hover {
        background-color: #145dbf;
    }

    .form-label {
        font-weight: 600;
    }

    .form-control {
        border-radius: 6px;
        padding: 10px;
    }

    .card-footer {
        border-top: none;
        background-color: #fff;
        padding-top: 10px;
    }

    .card-footer .btn {
        background-color: #1877f2;
        border: none;
        font-weight: bold;
        padding: 12px 20px;
        border-radius: 6px;
    }

    .card-footer .btn:hover {
        background-color: #145dbf;
    }

    .alert {
        font-size: 0.9em;
    }

    .error-message {
        color: #dc3545;
        font-size: 0.85em;
        margin-top: 3px;
    }

    @media (max-width: 576px) {
        .card {
            margin-top: 20px;
        }
    }
    .hidden {
        display: none;
    }
    .error-message {
        color: red;
        font-size: 0.8em;
        margin-top: 5px;
    }
    .btn-disabled {
    background-color: #d6d6d6 !important;
    cursor: not-allowed;
    pointer-events: none;
    color: #999 !important;
}
    .btn-disabled:hover {
        background-color: #d6d6d6 !important;
    }
</style>
<body class=" d-flex align-items-center" style="min-height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0">
                    <div class="card-header">
                        <div class="d-flex w-100">
                            <a href="#" class="btn btn-primary w-50 text-center rounded-0" id="inscription-link">Inscription</a>
                            <a href="#" class="btn btn-primary w-50 text-center rounded-0" id="connexion-link">Connexion</a>
                        </div>
                    </div>
                    <div class="card-body">
                            <?php if (isset($_SESSION['registration_error'])): ?>
                            <div class="alert alert-danger">
                                <?= $_SESSION['registration_error'] ?>
                            </div>
                            <?php unset($_SESSION['registration_error']); ?>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['login_error'])): ?>
                            <div class="alert alert-danger">
                                <?= $_SESSION['login_error'] ?>
                            </div>
                            <?php unset($_SESSION['login_error']); ?>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['mail_sent_error'])): ?>
                            <div class="alert alert-danger">
                                <?= $_SESSION['mail_sent_error'] ?>
                            </div>
                            <?php unset($_SESSION['mail_sent_error']); ?>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['mail_sent_succes'])): ?>
                            <div class="alert alert-success">
                                <?= $_SESSION['mail_sent_succes'] ?>
                            </div>
                            <?php unset($_SESSION['mail_sent_succes']); ?>
                        <?php endif; ?>

                        <!-- Formulaire d'inscription -->
                        <form action="./api/traitemnt_auth.php" method="post" class="form" id="inscription-form">  <!-- ID pour le cibler -->
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer votre nom" required >
                                <span id="nom-error" class="error-message"></span>  <!-- Pour afficher les erreurs -->
                            </div>
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrer votre prénom" required >
                                <span id="prenom-error" class="error-message"></span> <!-- Pour afficher les erreurs -->
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Entrer votre email" required >
                                <span id="email-error" class="error-message"></span>  <!-- Pour afficher les erreurs -->
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Entrer votre mot de passe" required>
                                <span id="password-error" class="error-message"></span> <!-- Pour afficher les erreurs -->
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">S'inscrire</button>
                            </div>
                        </form>

                        <!-- Formulaire de connexion -->
                        <form action="./api/traitemnt_auth.php" method="post" class="form hidden" id="connexion-form">  <!-- ID et classe hidden pour le cacher -->
                            <div class="mb-3">
                                <label for="email_connexion" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email_connexion" placeholder="Entrer votre email" required>
                                <span id="email-error" class="error-message"></span>  <!-- Pour afficher les erreurs -->
                            </div>
                            <div class="mb-3">
                                <label for="password_connexion" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password_connexion" placeholder="Entrer votre mot de passe" required>
                                <span id="password-error" class="error-message"></span> <!-- Pour afficher les erreurs -->
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- Bootstrap JS (si nécessaire) -->
     <script src="./asset/js/bootstrap.js"></script>
     <!-- Votre script JavaScript -->
     <script>
         const inscriptionLink = document.getElementById('inscription-link');
         const connexionLink = document.getElementById('connexion-link');
         const inscriptionForm = document.getElementById('inscription-form');
         const connexionForm = document.getElementById('connexion-form');
 
         const nomInput = document.getElementById('nom');
         const prenomInput = document.getElementById('prenom');
         const emailInput = document.getElementById('email');
         const passwordInput = document.getElementById('password');
 
         const nomErrorSpan = document.getElementById('nom-error');
         const prenomErrorSpan = document.getElementById('prenom-error');
         const emailErrorSpan = document.getElementById('email-error');
         const passwordErrorSpan = document.getElementById('password-error');
 
         // Fonction pour afficher le formulaire d'inscription
         function showInscriptionForm() {
             inscriptionForm.classList.remove('hidden');
             connexionForm.classList.add('hidden');
             // Désactiver le bouton "Inscription"
                inscriptionLink.classList.add('btn-disabled');
                // Activer le bouton "Connexion"
                connexionLink.classList.remove('btn-disabled');
         }
 
         // Fonction pour afficher le formulaire de connexion
         function showConnexionForm() {
             inscriptionForm.classList.add('hidden');
             connexionForm.classList.remove('hidden');
             // Désactiver le bouton "Connexion"
                connexionLink.classList.add('btn-disabled');
                // Activer le bouton "Inscription"
                inscriptionLink.classList.remove('btn-disabled');
         }
 
         // Gestionnaire d'événements pour le lien "Inscription"
         inscriptionLink.addEventListener('click', function(event) {
             event.preventDefault(); 
             showInscriptionForm();
         });
 
         // Gestionnaire d'événements pour le lien "Connexion"
         connexionLink.addEventListener('click', function(event) {
             event.preventDefault(); // Empêche le rechargement de la page
             showConnexionForm();
         });
 
         // Afficher le formulaire d'inscription par défaut au chargement de la page
         showInscriptionForm();
 
         // Validation du formulaire d'inscription au moment de la soumission
         inscriptionForm.addEventListener('submit', function(event) {
             event.preventDefault(); // Empêche la soumission par défaut
 
             validateForm();
         });
 
 
         function validateForm() {
             let isValid = true;
 
             // Validation du nom
             if (/[0-9]/.test(nomInput.value)) {
                 nomErrorSpan.textContent = "Le nom ne doit pas contenir de chiffres.";
                 isValid = false;
             } else {
                 nomErrorSpan.textContent = "";
             }
 
             // Validation du prénom
             if (/[0-9]/.test(prenomInput.value)) {
                 prenomErrorSpan.textContent = "Le prénom ne doit pas contenir de chiffres.";
                 isValid = false;
             } else {
                 prenomErrorSpan.textContent = "";
             }
 
             // Validation de l'email
             const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
             if (!emailRegex.test(emailInput.value)) {
                 emailErrorSpan.textContent = "Adresse email invalide.";
                 isValid = false;
             } else {
                 emailErrorSpan.textContent = "";
             }
 
             // Validation du mot de passe
             if (passwordInput.value.length < 8) {
                 passwordErrorSpan.textContent = "Le mot de passe doit contenir au moins 8 caractères.";
                 isValid = false;
             } else {
                 passwordErrorSpan.textContent = "";
             }
 
             if (isValid) {
                 
                 inscriptionForm.submit(); 
             }
         }
     </script>
</body>
</html>