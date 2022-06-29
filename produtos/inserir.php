<?php
use CrudPoo\Fabricante;
use CrudPoo\Produto;
require_once "../vendor/autoload.php";
$produto = new Produto;
$fabricante = new Fabricante;
$fabricantes = $fabricante->lerFabricantes();
if(isset($_POST['inserir'])){
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setQuantidade($_POST['quantidade']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setFabricanteId($_POST['fabricante']);
    $produto->inserirProduto();
    header("location:listar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserir</title>
    <style>
    form {margin: 0; padding: 0; margin-left: 10px;}
    p {font-size: 1.3em;}
    select, input[type=number], input[type=text], textarea {width: 20%; padding: 6px 10px; border: none; border-radius: 10px; background-color: #f1f1f1; display: flex;}
    a {text-decoration: none;}
    </style>
</head>
<body>
    <div class="conteiner">
        <h1>Produtos | INSERT</h1>
        <hr>
        <form action="" method="post">
            <p>
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" required>
            </p>
            <p>
                <label for="preco">Preço: </label>
                <input type="number" name="preco" id="preco" min="0" max="10000" step="0.01" required>
            </p>
            <p>
                <label for="quantidade">Quantidade: </label>
                <input type="number" name="quantidade" id="quantidade" min="0" max="100" required>
            </p>
            <p>
                <label for="fabricante">Fabricante: </label>
                <select name="fabricante" id="fabricante">
                    <option value=""></option>
                    <?php
                    foreach ($fabricantes as $fabricante) { ?>
                        <option value="<?=$fabricante['id']?>"><?=$fabricante['nome']?></option>
                    <?php    
                    }
                    ?>
                </select>    
            </p>
            <p>
                <label for="descricao">Descrição: </label>
                <textarea name="descricao" id="descricao" cols="30" rows="3"></textarea>
            </p>
            

            <button type="submit" name="inserir">Inserir Produto</button>
        </form>
        <p><a href="listar.php">Voltar para a lista de Produtos</a></p>
        <p><a href="../index.php">Home</a></p>
    </div>
</body>
</html>