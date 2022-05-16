<?php require_once "../src/conecta.php" ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Lista</title>
    <style>
        td, th{text-align: center; border: solid 1px blue}
    </style>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT</h1>
        <hr>
        <h2>Lendo e carregando todos os fabricantes</h2>
        <table>
            <caption>Lista de Fabricantes</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
<?php
    // string com o comando SQL
    $sql = "SELECT id,nome FROM fabricantes";
    // preparação do comando
    $consulta = $conexao->prepare($sql);
    // execuçaõ do comando
    $consulta->execute();
    // capturar os resultados
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    /* echo "<pre>";
    var_dump($resultado);
    echo "</pre>"; */
    foreach ($resultado as $fabricante) {?>
            <tr>
                <td><?=$fabricante['id']?></td>
                <td><?=$fabricante['nome']?></td>
            </tr>
<?php        
    }
?>            
            </tbody>
        </table>
    </div>
</body>
</html>