<?php
namespace Diversos;
class Utilitarios {
    public static float $Moeda;
    function formataMoeda(float $moeda):string{
        return "R$ ".number_format($moeda, 2 , ",", ".");
    }
    

    public static function getMoeda(): float
    {
        return self::$Moeda;
    }
    public static function setMoeda(float $Moeda)
    {
        self::$Moeda = $Moeda;
    }
}
?>