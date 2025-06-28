<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';


function envoyerConfirmation($email, $prenom, $token) {
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0; // ou 3 pour + de détails
    $mail->Debugoutput = 'html';


    try {
        // Config SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'horaceodounlami2006@gmail.com';
        $mail->Password   = 'eqgz jzgf gkoe cbwf';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Infos expéditeur & destinataire
        $mail->setFrom('horaceodounlami2006@gmail.com', 'PHP Social Network');
        $mail->addAddress($email, $prenom);

        // Contenu HTML
        $mail->isHTML(true);
        $mail->Subject = 'Confirme ton compte';
        $mail->Body = "
        <!DOCTYPE html>
        <html lang='fr'>
        <head>
        <meta charset='UTF-8'>
        <title>Confirmation de compte</title>
        </head>
        <body style='font-family: Arial, sans-serif; background-color: #f4f4f7; margin:0; padding: 0;'>
          <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
            <tr>
              <td align='center' style='padding: 20px 0;'>
                <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='600' style='background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.15);'>
                  <tr>
                    <td style='padding: 40px; text-align: center;'>
                      <h2 style='color: #333333;'>Bonjour $prenom,</h2>
                      <p style='font-size: 16px; color: #555555; line-height: 1.5;'>
                        Merci pour ton inscription sur <strong>PHP Social Network</strong>.<br>
                        Pour finaliser ton inscription, clique sur le bouton ci-dessous pour activer ton compte.
                      </p>
                      <p style='margin: 30px 0;'>
                        <a href='http://localhost/php-social-network/vues/clients/verification.php?token=$token' 
                           style='background-color: #007bff; color: #ffffff; text-decoration: none; padding: 12px 25px; border-radius: 5px; display: inline-block; font-weight: bold;'>
                           Confirmer mon compte
                        </a>
                      </p>
                      <p style='font-size: 14px; color: #999999;'>
                        Si tu n'as pas créé de compte, ignore simplement cet email.
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
        

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Erreur envoi : " . $mail->ErrorInfo ;
        return false;
    }
}
?>