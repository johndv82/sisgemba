<?php
function esBisiesto($anio) {
    return !($anio % 4) && ($anio % 100 || !($anio % 400));
}

function diasRestantesAño($fecha){
    $date_init =  new DateTime($fecha);
    $proximo_año = intval($date_init->format('Y'))+1;
    $final_day = new DateTime(strval($proximo_año)."-01-01");
    $difference = $date_init->diff($final_day);
    return intval($difference->format('%a'));
}

function cuadroVacacionArray($fecha_inicio_string, $año_inicio, $año_actual, $fecha_hoy){
    $vacaciones = [];
    $tiempo_ganado = 0;
    for($i = $año_inicio; $i<=$año_actual; $i++){
        $fecha_inicio_periodo = null;
        $fecha_fin_periodo = null;
        $dias_ganados = 0;

        if($año_actual == $año_inicio){
            if(esBisiesto($año_actual)){
                //366 dias
                $tiempo_ganado += (30/366) * (diasRestantesAño($fecha_inicio_string) - diasRestantesAño($fecha_hoy->format('Y-m-d')));
            }else{
                //365 dias
                $tiempo_ganado += (30/365) * (diasRestantesAño($fecha_inicio_string) - diasRestantesAño($fecha_hoy->format('Y-m-d')));
            }
            $fecha_inicio_periodo = $fecha_inicio_string;
            $fecha_fin_periodo = $fecha_hoy->format('Y-m-d');
        }
        else if($i == $año_inicio){
            if(esBisiesto($año_inicio)){
                //366 dias
                $tiempo_ganado += (30/366) * diasRestantesAño($fecha_inicio_string);
            }else{
                //365 dias
                $tiempo_ganado += (30/365) * diasRestantesAño($fecha_inicio_string);
            }
            $fecha_inicio_periodo = $fecha_inicio_string;
            $fecha_fin_periodo = $i."-12-31";
        }else if($i == $año_actual){
            if(esBisiesto($año_actual)){
                //366 dias
                $tiempo_ganado += (30/366) * (366 - diasRestantesAño($fecha_hoy->format('Y-m-d')));
            }else{
                //365 dias
                $tiempo_ganado += (30/365) * (365 - diasRestantesAño($fecha_hoy->format('Y-m-d')));
            }
            $fecha_inicio_periodo = $i."-01-01";
            $fecha_fin_periodo = $fecha_hoy->format('Y-m-d');
        }else{
            $fecha_inicio_periodo = $i."-01-01";
            $fecha_fin_periodo = $i."-12-31";
            $tiempo_ganado += 30;
        }
        $dias_ganados = round($tiempo_ganado, 2);
        $objeto = array(
            'periodo' => $i,
            'fecha_inicio' => $fecha_inicio_periodo,
            'fecha_fin' => $fecha_fin_periodo,
            'dias_ganados' => $dias_ganados,
        );
        array_push($vacaciones, $objeto);
        $tiempo_ganado = 0;
    }
    return $vacaciones;
}

function generarVacacionTrabajador($fecha_ingreso_trabajador){
    $fecha_actual = new DateTime();
    $date_init =  new DateTime($fecha_ingreso_trabajador);
    $año_inicio = $date_init->format('Y');
    $año_actual = $fecha_actual->format('Y');
    return json_encode(cuadroVacacionArray($fecha_ingreso_trabajador, $año_inicio, $año_actual, $fecha_actual));
}
