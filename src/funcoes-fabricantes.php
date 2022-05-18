<?php
require_once "conecta.php";
// Ler os dados dos fabricantes
function lerFabricantes(PDO $conexao):array { // :array faz os dados virar array
    try {
        $sql = "SELECT id,nome FROM fabricantes";// string com o comando SQL
        $consulta = $conexao->prepare($sql);// preparação do comando
        $consulta->execute();// execuçaõ do comando
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);// capturar os resultados
    } catch (Exception $erro) {
        die("Erro: " .$erro->getMessage());
    }
    return $resultado;
}
// Inserir Fabricante
function inserirFabricante(PDO $conexao, string $nome):void{ // :void faz a função sem retorno
    // :qualquer-coisa named parameter
    $sql= "INSERT INTO fabricantes(nome) VALUES (:nome)";
    try {
        $consulta = $conexao->prepare($sql);
        // bindparam('nome do parametro', $variavel_com_valor, constante de verificação)
        $consulta->bindparam(':nome', $nome, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro: " .$erro->getMenssage());
    }
}
?>