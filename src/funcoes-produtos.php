<?php
require_once "conecta.php";

function lerProdutos(PDO $conexao){
    $sql="SELECT id, nome, descricao, preco, quantidade, fabricante_id FROM produtos ORDER BY nome";
    try {
        //code...
    } catch (Exception $erro) {
        die("Erro: " .$erro->getMessage());
    }
}
?>