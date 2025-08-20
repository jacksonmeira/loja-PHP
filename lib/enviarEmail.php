<?php 

    use PHPMailer\PHPMailer\PHPMailer;
    
    function enviarEmail($destinatario, $assunto, $mensagemHTML){

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'teste@teste.com';
    $mail->Password = '12345';

    $mail->SMTPSecure = false;
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('teste@teste.com', 'Teste');
    $mail->addAddress($destinatario);
    $mail->Subject = $assunto;

    $mail->Body = $mensagemHTML;

    if($mail->send()){
        return true;
    } else {
        return false;
    }
}

?>