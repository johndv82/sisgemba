<?php

function cuadroVacacionArray($año_inicio, $año_actual, $fecha_hoy, $date_init){
    $vacaciones = [];
    $tiempo_ganado = 0;
    $conteo_years = 0;
    for($i = $año_inicio; $i<=$año_actual; $i++){
        $fecha_inicio_periodo = null;
        $fecha_fin_periodo = null;
        $dias_ganados = 0;

        if($i == $año_actual){

            $fecha_inicio_periodo = $i."-".$date_init->format('m')."-".strval(intval($date_init->format('d')) + $conteo_years);
            $fecha_fin_periodo = strval($i+1)."-".$date_init->format('m')."-".strval(intval($date_init->format('d')) + $conteo_years);

            $date_inicio_periodo = new DateTime($fecha_inicio_periodo);
            $diferencia_dias_ultimo_year = $date_inicio_periodo->diff($fecha_hoy);
            $dias_ganados_ultimo_year = intval($diferencia_dias_ultimo_year->format('%a'));

            $tiempo_ganado += (30/365) * $dias_ganados_ultimo_year;

        }else{
            $tiempo_ganado = 30;
            $fecha_inicio_periodo = $i."-".$date_init->format('m')."-".strval(intval($date_init->format('d')) + $conteo_years);
            $fecha_fin_periodo = strval($i+1)."-".$date_init->format('m')."-".strval(intval($date_init->format('d')) + $conteo_years);
        }

        $dias_ganados = round($tiempo_ganado, 0);
        $fecha_inicio_periodo_format = new DateTime($fecha_inicio_periodo);
        $fecha_fin_periodo_format = new DateTime($fecha_fin_periodo);
        $objeto = array(
            'periodo' => intval($i),
            'fecha_inicio' => $fecha_inicio_periodo_format->format('Y-m-d'),
            'fecha_fin' => $fecha_fin_periodo_format->format('Y-m-d'),
            'dias_ganados' => $dias_ganados,
            'dias_tomados' => 0,
            'dias_restantes' => 0
        );
        array_push($vacaciones, $objeto);
        $tiempo_ganado = 0;
        $conteo_years = $conteo_years+1;
    }
    return $vacaciones;
}

function generarVacacionTrabajador($fecha_ingreso_trabajador){
    $fecha_actual = new DateTime();
    $date_init =  new DateTime($fecha_ingreso_trabajador);
    $año_inicio = $date_init->format('Y');
    $año_actual = $fecha_actual->format('Y');
    return cuadroVacacionArray($año_inicio, $año_actual, $fecha_actual, $date_init);
}
