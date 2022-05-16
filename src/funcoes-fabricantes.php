<?php
require_once "conecta.php";
// Ler os dados dos fabricantes
function lerFabricantes(PDO $conexao):array {
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
function inserirFabricante(PDO $conexao, string $nome){
    
}
?>