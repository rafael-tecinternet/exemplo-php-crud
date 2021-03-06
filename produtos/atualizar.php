<?php
require_once "../src/funcoes-fabricantes.php";
$fabricantes = lerFabricantes($conexao);
require_once "../src/funcoes-produtos.php";
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$fabricanteDados = lerUmProduto($conexao, $id);
if (isset($_POST['atualizar'])) {
    require_once "../src/funcoes-produtos.php";
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $fabricanteId = filter_input(INPUT_POST, 'fabricante', FILTER_SANITIZE_NUMBER_INT);
    atualizarProduto($conexao, $id, $nome, $preco, $quantidade, $descricao, $fabricanteId);
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