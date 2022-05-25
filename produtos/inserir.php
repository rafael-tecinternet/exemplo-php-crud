<?php
require_once "../src/funcoes-fabricantes.php";
$fabricantes = lerFabricantes($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserir</title>
    <style>
    form {max-width: 500px;
    width: 95%;
    margin: 0;
    padding: 1rem;
    border-radius: 10px;}
    </style>
</head>
<body>
    <div class="conteiner">
        <h1>Produto | INSERT</h1>
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
                    <option value="<?=$fabricante['id']?>"></option>
                    <?php
                    foreach ($fabricantes as $fabricante) { ?>
                        <option><?=$fabricante['nome']?></option>
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