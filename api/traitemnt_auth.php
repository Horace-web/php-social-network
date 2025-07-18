<?php
session_start(); // Démarrer la session

include 'connection.php'; // Inclure le fichier de connexion

function afficherErreur($message) {
    $_SESSION['login_error'] = $message;
}

function afficherErreurInscription($message) {
    $_SESSION['registration_error'] = $message;
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Traitement inscription
    if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['password'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = $_POST['email']; // Ne pas échapper l'email pour conserver le format
        $motDePasse = $_POST['password'];
        $password_hash = password_hash($motDePasse, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(32));

        // Validation
        if (empty($nom) || empty($prenom) || empty($email) || empty($motDePasse)) {
            $_SESSION['registration_error'] = "Veuillez remplir tous les champs.";
            header("Location: ../index.php");
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['registration_error'] = "Adresse email invalide.";
            header("Location: ../index.php");
            exit();
        }

        
        // Vérifier si l'email existe déjà
            $checkEmail = $bdd->prepare("SELECT id FROM utilisateurs WHERE email = :email");
            $checkEmail->execute(['email' => $email]);

            if ($checkEmail->rowCount() > 0) {
                afficherErreurInscription("Cet email est déjà utilisé.");
                header("Location: ../index.php");
                exit();
            }

            // Si l'email est libre, on insère
            $req = $bdd->prepare("INSERT INTO utilisateurs(nom, prenom, email, motDePasse , token) VALUES(:nom, :prenom, :email, :motDePasse , :token)");
            $stmt = $req->execute([
                "nom" => $nom,
                "prenom" => $prenom,
                "email" => $email,
                "motDePasse" => $password_hash,
                "token" => $token
            ]);


            if ($stmt) {
                require 'mailer.php';
                if (envoyerConfirmation($email, $prenom, $token)) {
                    $_SESSION['mail_sent_succes'] = "Un email de confirmation vous a été envoyé.";
                } else {
                    $_SESSION['mail_sent_error'] = "Inscription réussie mais email non envoyé.";
                }
            
                header("Location: ../index.php");
                exit();
            }
    }

    // Traitement connexion
    elseif (isset($_POST['email_connexion'], $_POST['password_connexion'])) {
        $email = filter_var($_POST['email_connexion'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password_connexion'];

        if (empty($email) || empty($password)) {
            afficherErreur("Veuillez entrer votre email et votre mot de passe.");
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            afficherErreur("Email invalide.");
        } else {
            $sql = "SELECT id, nom, prenom, motDePasse ,est_active FROM utilisateurs WHERE email = :email";
            $stmt = $bdd->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // var_dump($user);
            // var_dump(password_verify($password, $user['motDePasse']));
            // exit();


            // if ($user && password_verify($password, $user['motDePasse'])) {
            //     $_SESSION['user_id'] = $user['id'];
            //     $_SESSION['user_name'] = $user['nom'] . ' ' . $user['prenom'];
            //     $_SESSION['auth'] = true;
            //     header("Location: ../vues/clients/accueil.php");
            //     exit();
            // } else {
            //     afficherErreur("Identifiants incorrects.");
            // }
            // if (!$user['est_active']) {
            //     afficherErreur("Veuillez confirmer votre compte par email.");
            //     header("Location: ../index.php");
            //     exit();
            // }
            
        }

        // Redirection en cas d’erreur connexion
        if (isset($_SESSION['login_error'])) {
            header("Location: index.html");
            exit();
        }
    } else {
        $_SESSION['registration_error'] = "Données du formulaire manquantes.";
        header("Location: index.php");
        exit();
    }
} else {
    afficherErreur("Accès non autorisé.");
    header("Location: index.php");
    exit();
}
?>
