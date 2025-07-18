<?php
require 'connection.php';
require 'mailer.php'; // même PHPMailer que pour l'inscription

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = $_POST['email'] ?? '';
$email = filter_var($email, FILTER_VALIDATE_EMAIL);

if (!$email) {
    die("Adresse email invalide.");
}

// Vérifier si l'email existe
$stmt = $bdd->prepare("SELECT id, prenom FROM utilisateurs WHERE email = :email");
$stmt->execute(['email' => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("Aucun compte associé à cet email.");
}

// Générer un token
$token = bin2hex(random_bytes(32));
$expires = date('Y-m-d H:i:s', time() + 3600); // expire dans 1 heure

// Stocker le token
$update = $bdd->prepare("UPDATE utilisateurs SET reset_token = :token, reset_expires = :expires WHERE id = :id");
$update->execute([
    'token' => $token,
    'expires' => $expires,
    'id' => $user['id']
]);

// Envoyer le mail
$link = "http://localhost/php-social-network/vues/clients/reset.php?token=$token";
$body = "
<!DOCTYPE html>
<html lang='fr'>
<head>
<meta charset='UTF-8'>
<title>Réinitialisation du mot de passe</title>
</head>
<body style='font-family: Arial, sans-serif; background-color: #f4f4f7; margin:0; padding: 0;'>
  <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
    <tr>
      <td align='center' style='padding: 20px 0;'>
        <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='600' style='background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.15);'>
          <tr>
            <td style='padding: 40px; text-align: center;'>
              <h2 style='color: #333333;'>Bonjour {$user['prenom']},</h2>
              <p style='font-size: 16px; color: #555555; line-height: 1.5;'>
                Tu as demandé à réinitialiser ton mot de passe sur <strong>PHP Social Network</strong>.<br>
                Clique sur le bouton ci-dessous pour choisir un nouveau mot de passe.
              </p>
              <p style='margin: 30px 0;'>
                <a href='$link'
                   style='background-color: #007bff; color: #ffffff; text-decoration: none; padding: 12px 25px; border-radius: 5px; display: inline-block; font-weight: bold;'>
                   Réinitialiser mon mot de passe
                </a>
              </p>
              <p style='font-size: 14px; color: #999999;'>
                Si tu n'es pas à l'origine de cette demande, tu peux ignorer cet email.
              </p>
            </td>
          </tr>
          <tr>
            <td style='background-color: #f4f4f7; text-align: center; padding: 15px; font-size: 12px; color: #999999; border-radius: 0 0 8px 8px;'>
              &copy; " . date('Y') . " PHP Social Network. Tous droits réservés.
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
";


$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'horaceodounlami2006@gmail.com';
$mail->Password   = 'eqgz jzgf gkoe cbwf';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587;

// Infos expéditeur & destinataire
$mail->setFrom('horaceodounlami2006@gmail.com', 'PHP Social Network');

$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = 'Réinitialisation de mot de passe';
$mail->Body = $body;

try {
    $mail->send();
    echo "Lien envoyé à votre adresse email.";
} catch (Exception $e) {
    echo "Erreur : " . $mail->ErrorInfo;
}
?>