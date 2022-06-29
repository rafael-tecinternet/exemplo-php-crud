<?php
use CrudPoo\Produto;
require "../vendor/autoload.php";
$produto = new Produto;
$listaDeProdutos = $produto->lerProdutos();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Lista</title>
    <style>
        h1 {font-size: 3rem; color: darkgreen;}
        article {width: 33%; max-width: 300px; text-align:  left; padding: 5px; box-shadow: 3px 3px 3px 1px #888888; background-color: whitesmoke; border: 1px solid black; border-radius: 10px;}
        h3 {font-size: 1.8rem; color: darkgreen; margin: 0;}
        .produtos {display: flex; flex-wrap: wrap;}
        .atualizar, .excluir {padding: 5px;}
        .excluir {color: red;}
        a {text-decoration: none;}
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Produtos | SELECT</h1>
        <hr>
        <h2>Lendo e carregando todos os produtos</h2>
        <p><a href="inserir.php">Inserir  um novo produto</a></p>
        <p><a href="../index.php">Voltar a Home</a></p>
        <div class="produtos">
        <?php
        foreach ($listaDeProdutos as $produto) {
        ?>    
            <article>
                <h3><?=$produto['produto']?></h3>
                <p class="ico">PREÇO: <?=number_format($produto['preco'], 2, ",", ".")?></p>
                <p>QUANTIDADE: <?=$produto['quantidade']?> unidades</p>
                <p>DESCRIÇÃO: <?=$produto['descricao']?></p>
                <p>FABRICANTE: <?=$produto['fabricante']?></p>
                <p><a href="atualizar.php?id=<?=$produto['id']?>" class="atualizar">Atualizar</a>
                <a href="excluir.php?id=<?=$produto['id']?>" class="excluir">Excluir</a></p>
            </article>
        <?php
        }
        ?>
        </div>
    </div>    
    <script src="../JS/confirma.js"></script>
</body>
</html>