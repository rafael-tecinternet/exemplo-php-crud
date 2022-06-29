<?php
use CrudPoo\Fabricante;
use CrudPoo\Produto;
require_once "../vendor/autoload.php";
$fabricante = new Fabricante;
$fabricantes = $fabricante->lerFabricantes();
$produto = new Produto;
$produto->setId($_GET['id']);

$fabricanteDados = $produto->lerUmProduto();

if (isset($_POST['atualizar'])) {
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setQuantidade($_POST['quantidade']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setFabricanteId($_POST['fabricante']);
    $produto->atualizarProduto();
    header("location:listar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - SELECT/UPDATE</title>
    <style>
    form {margin: 0; padding: 0; margin-left: 10px;}
    p {font-size: 1.3em;}
    select, input[type=number], input[type=text], textarea {width: 20%; padding: 6px 10px; border: none; border-radius: 10px; background-color: #f1f1f1; display: flex;}
    a {text-decoration: none;}
    </style>
</head>
<body>
    <div class="conteiner">
        <h1>Produtos | SELECT/UPDATE</h1>
        <hr>
        <form action="" method="post">
            <input type="hidden" name="<?=$fabricanteDados['id']?>">
            <p>
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" value="<?=$fabricanteDados['nome']?>" >
            </p>
            <p>
                <label for="preco">Preço: </label>
                <input type="number" name="preco" id="preco" min="0" max="10000" step="0.01" value="<?=$fabricanteDados['preco']?>" >
            </p>
            <p>
                <label for="quantidade">Quantidade: </label>
                <input value="<?=$fabricanteDados['quantidade']?>" type="number" name="quantidade" id="quantidade" min="0" max="100" >
            </p>
            <p>
                <label for="fabricante">Fabricante: </label>
                <select name="fabricante" id="fabricante">
                    <option value=""></option>
                    <?php
                    foreach ($fabricantes as $fabricante) { ?>
                        <option <?php if($fabricanteDados['fabricante_id'] == $fabricante['id']) echo "selected"; ?> value="<?=$fabricante['id']?>"><?=$fabricante['nome']?></option>
                    <?php    
                    }
                    ?>
                </select>    
            </p>
            <p>
                <label for="descricao">Descrição: </label>
                <textarea name="descricao" id="descricao" cols="30" rows="3" required><?=$fabricanteDados['descricao']?>"</textarea>
            </p>
            

            <button type="submit" name="atualizar">Atualizar Produto</button>
        </form>
        <p><a href="listar.php">Voltar para a lista de Produtos</a></p>
        <p><a href="../index.php">Home</a></p>
    </div>
</body>
</html>