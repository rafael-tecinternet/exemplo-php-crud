<?php
// SCRIPT DE CONEXÃO AO SERVIDOR DE BANCO DE DADOS
// Pârametros
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "vendas";
try {
    // Criando a conexão com o MySQL (API/Driver de conexão)
    $conexao = new PDO("mysql:host=$servidor; dbname=$banco; charset=utf8", $usuario, $senha);
    // Habilida a verificação de erros (em geral e exceções)
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $erro){
    die("Erro: " .$erro->getMessage());
}
?>