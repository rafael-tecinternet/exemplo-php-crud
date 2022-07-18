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