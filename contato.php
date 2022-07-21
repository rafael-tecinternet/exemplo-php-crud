<?php

use PHPMailer\PHPMailer\PHPMailer;

require "vendor/autoload.php";
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";
if(isset($_POST['enviar'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];
    try{
        $mail->isSMTP();
        $mail->Host = 'rafah1194@gmail.com';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'f09e8a8f9bde0c';
        $mail->Password = '1ee102fae1f0e7';

        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('joe@exemple.net', 'Joe User');
        $mail->addAddress('ellen@example.com');
        $mail->addAddress('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        $mail->isHTML(true);
        $mail->Subject = "Contato Site -".$assunto;
        $mail->Body = "<b>Nome:</b> $nome <br> <b>E-mail:</b> $email <br> <b>Assunto $assunto</b> <br> <b>Mensagem:</b> $mensagem";
        $mail->AltBody = "Nome: $nome \n E-mail: $email \n Assunto: $assunto \n Mensagem: $mensagem";
        $mail->send();
        echo "Mensagem foi enviada com sucesso";
    } catch (Exception $e) {
        echo "Mensagem não enviada, tente novamente: {$mail->ErrorInfo}";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
</head>
<body>
    <h1>Contato usando phpmailer</h1>
    <hr>
    <form action="" method="post">
        <p>
            <label for="">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </p>
        <p>
            <label for="">Email:</label>
            <input type="text" name="email" id="email" required>
        </p>
        <p>
            <label for="">Assunto:</label>
            <select name="assunto" id="assunto" required>
                <option value=""></option>
                <option value="duvidas">Dúvidas</option>
                <option value="reclamacoes">Reclamações</option>
                <option value="elogios">Elogios</option>
            </select>
        </p>
        <p>
            <label for="messagem">Menssagem: </label><br>
            <textarea name="menssagem" id="menssagem" cols="30" rows="5"></textarea>
        </p>
        <button type="submit" name="enviar">Enviar</button>
    </form>
    <p>
        <a href="index.php">Voltar</a>
    </p>
    
</body>
</html>