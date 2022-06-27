<?php

use CrudPoo\Fabricante;

require_once "../vendor/autoload.php";
$fabricante = new Fabricante;
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$fabricante->excluirFabricante($id);
header("location:listar.php");
?>

