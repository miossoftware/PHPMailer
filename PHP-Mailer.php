<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
if ($_POST){
    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPKeepAlive = true;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';

    $mail->Port = 587;
    $mail->Host = 'smtp.gmail.com';

    $mail->Username = 'smtkbdy5422@gmail.com';
    $mail->Password = 'Sizin Şifreniz';

    $mail->CharSet = 'utf-8';
    $mail->setFrom($_POST['name'], $_POST['email']);
    $mail->addAddress("smtkbdy5422@gmail.com", "Samet Kabadayı");


    $mail->isHTML(true);
    $mail->Subject = $_POST['name'] .' tarafından bir mesajınız var';
    $mail->Body = $_POST['subject'] . '<br>' . $_POST['message'] . '<br>'.'mail adresi: '.$_POST['email'];

    $mail->addAttachment($_POST['message']);
    if ($mail->send()) {
        echo 'Mail Gönderim İşlemi Başarılı';
    } else {
        echo 'Gönderim sırasında bir sorun oluştu';
    }

}
?>
