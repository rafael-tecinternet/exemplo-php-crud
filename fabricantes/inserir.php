<?php
use CrudPoo\Fabricante;
//  Importando as funções e a conexão
require_once "../vendor/autoload.php";
// Verificando se o botão do formulário foi acionado
if(isset($_POST['inserir'])){
    $fabricante = new Fabricante;
    /* Usamos o setter para definir o nome do novo fabricante */
    $fabricante->setNome($_POST['nome']);
    $fabricante->inserirFabricante();
    //redireciona 
    header("location:listar.php");
}
var_dump($fabricante);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Inserir</title>
</head>
<body>
    <div class="conteiner">
        <h1>Fabricantes | INSERT</h1>
        <hr>
        <form action="" method="post">
            <p>
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome">
            </p>
            <button type="submit" name="inserir">Inserir fabricante</button>
        </form>
        <p><a href="listar.php">Voltar para a lista de fabricantes</a></p>
        <p><a href="../index.php">Home</a></p>
    </div>
</body>
</html>