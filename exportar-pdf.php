<?php
use Dompdf\Dompdf;
use Dompdf\Options;
//exportar-pdf.php
require_once "vendor/autoload.php";
session_start(); // iniciando a sessão
$paragrafo = "";
foreach($_SESSION['dados'] as $fabricante){
    $paragrafo .= "<p>". $fabricante['nome'] ."</p>"; // .= atribuição e concatenação
} 
// Conteúdo HTML para o resumo usando sintaxe heredoc PHP
$data = date("d/m/Y");
$conteudo = <<<HTML
    <div style="border: solid 2px; padding: 10px; width: 70%; margin: auto; text-align:center">
        <h2>Resumo de Fabricantes - $data</h2>
        $paragrafo
    </div>    
HTML;

$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);

$dompdf->loadHtml($conteudo);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Resumo de Fabricantes.pdf");