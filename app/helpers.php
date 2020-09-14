<?php

function ExtraerNombreSinSubGuion($cadena){
    $indice = stripos($cadena, '_');
    return substr($cadena,0, $indice);
}
