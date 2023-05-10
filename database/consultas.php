<?php 
$sql = "SELECT 
`nutricionista1`.`dietas`.`fecha` AS `FECHA`,
`nutricionista1`.`dia`.`nombre` AS `DIA`,
`nutricionista1`.`tipo_comida`.`nombre` AS `TIPO`,
`nutricionista1`.`alimentos`.`nombre` AS `ALIMENTO`,
`nutricionista1`.`alimentos`.`vitaminas` AS `VITAMINAS`,
`nutricionista1`.`alimentos`.`aporte_nutricional` AS `NUTRIENTES`,
`nutricionista1`.`dietas`.`gramos` AS `GRAMOS`
FROM
((((`nutricionista1`.`dietas`
JOIN `nutricionista1`.`pacientes` ON ((`nutricionista1`.`dietas`.`id_dieta` = `nutricionista1`.`pacientes`.`dni`)))
JOIN `nutricionista1`.`dia` ON ((`nutricionista1`.`dia`.`id_dia` = `nutricionista1`.`dietas`.`dia_id`)))
JOIN `nutricionista1`.`tipo_comida` ON ((`nutricionista1`.`dietas`.`id_tipo` = `nutricionista1`.`tipo_comida`.`id_tipo`)))
JOIN `nutricionista1`.`alimentos` ON ((`nutricionista1`.`dietas`.`id_alimento` = `nutricionista1`.`alimentos`.`id_alimento`)))
WHERE
((`nutricionista1`.`dia`.`nombre` = :dia)
    AND (`nutricionista1`.`pacientes`.`dni` = :dni))";


$sql1 = "SELECT 
ROUND(SUM(((`alimentos`.`calorias` * `dietas`.`gramos`) / 100)),
        2) AS `CaloriasTotales`
FROM
((((`dietas`
JOIN `pacientes` ON ((`dietas`.`id_dieta` = `pacientes`.`dni`)))
JOIN `dia` ON ((`dia`.`id_dia` = `dietas`.`dia_id`)))
JOIN `tipo_comida` ON ((`dietas`.`id_tipo` = `tipo_comida`.`id_tipo`)))
JOIN `alimentos` ON ((`dietas`.`id_alimento` = `alimentos`.`id_alimento`)))
WHERE
((`dia`.`nombre` = :dia)
    AND (`pacientes`.`dni` = :dni))";

$sql2 = "SELECT 
            `nutricionista1`.`dia`.`nombre` AS `DIA`
                FROM
            ((((`nutricionista1`.`dietas`
JOIN `nutricionista1`.`pacientes` ON ((`nutricionista1`.`dietas`.`id_dieta` = `nutricionista1`.`pacientes`.`dni`)))
JOIN `nutricionista1`.`dia` ON ((`nutricionista1`.`dia`.`id_dia` = `nutricionista1`.`dietas`.`dia_id`)))
JOIN `nutricionista1`.`tipo_comida` ON ((`nutricionista1`.`dietas`.`id_tipo` = `nutricionista1`.`tipo_comida`.`id_tipo`)))
JOIN `nutricionista1`.`alimentos` ON ((`nutricionista1`.`dietas`.`id_alimento` = `nutricionista1`.`alimentos`.`id_alimento`)))
WHERE
(`nutricionista1`.`pacientes`.`dni` = :dni) GROUP BY dia.nombre;";

$sql4 = "
SELECT enfermedades.nombre as NOMBRE, enfermedades.id_enfermedad as ID from enfermedades 
INNER JOIN enfermedad_paciente ON enfermedad_paciente.id_enfermedad = enfermedades.id_enfermedad 
	WHERE enfermedad_paciente.id_paciente = :dni;";
    
$sql5 = "DELETE FROM `nutricionista1`.`enfermedad_paciente` 
       WHERE (`id_paciente` = :dni) and (`id_enfermedad` = :enf);";


$sql6 = " SELECT 
TIMESTAMPDIFF(YEAR,
    `pacientes`.`fecha_nac`,
    CURDATE()) AS `EDAD`
FROM
`pacientes`
WHERE
(`pacientes`.`dni` = :dni)"

?>