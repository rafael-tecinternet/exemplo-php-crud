<?php
namespace Diversos;
abstract class Utilitarios {
    public static float $moeda;
    public static array $dados;
    public static function formataMoeda(float $moeda):string{
        return "R$ ".number_format($moeda, 2 , ",", ".");
    }
    public static function dump($dados){
        
    }

}
?>