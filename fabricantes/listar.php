<?php 
require_once "../src/funcoes-fabricantes.php";
$listaDeFabricantes = lerFabricantes($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Lista</title>
    <style>
        td {background-color: whitesmoke;}
        th {background-color: darkgreen; color: aliceblue;}
        td, th{text-align: center; border: solid 1px black; border-radius: 5px; box-shadow: 3px 3px 3px 3px #888888;}
        .atualizar {color: blue; text-decoration: none;}
        .excluir {color: red; text-decoration: none;}
    </style>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT</h1>
        <hr>
        <h2>Lendo e carregando todos os fabricantes</h2>
        <p><a href="inserir.php">Inserir  um novo fabricante</a></p>
        <p><a href="../index.php">Voltar a Home</a></p>
        <?php if(isset($_GET['status']) && $_GET['status'] == 'sucesso'){?>
        <p>Fabricante atualizado com sucesso!</p>
        <?php } ?>
        <table>
            <caption>Lista de Fabricantes</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th colspan="2">Operações</th>
                </tr>
            </thead>
            <tbody>
<?php
    foreach ($listaDeFabricantes as $fabricante) {?>
            <tr>
                <td><?=$fabricante['id']?></td>
                <td><?=$fabricante['nome']?></td>
                <td><a href="atualizar.php?id=<?=$fabricante['id']?>" class="atualizar"> Atualizar</a></td> <!-- ?parametro link dinâmico -->
                <td><a href="excluir.php?id=<?=$fabricante['id']?>" class="excluir">Excluir</a></td>
            </tr>
<?php        
    }
?>            
            </tbody>
        </table>
    </div>
    <script src="../JS/confirma.js"></script>
</body>
</html>