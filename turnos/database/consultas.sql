$consulta1 = SELECT MIN(turno) FROM turnos WHERE modulo = 'modulo' and prioridad = '3';
$consulta2 = SELECT MIN(turno) FROM turnos WHERE modulo = 'modulo' and prioridad = '2';
$consulta3 = SELECT MIN(turno) FROM turnos WHERE modulo = 'modulo' and prioridad = '1';

if($consulta1 == null){
    llamar a la consulta 2

    if($consulta2 == null){
        llamar a la consulta 3
    }
}