<?php
    require_once("../../database/database.php");
    require_once("../../database/consultas.php");

    if(isset($_GET["dni"]) && isset($_GET["dia"])){
        $dni = $_GET["dni"];
        $dia = $_GET["dia"];
        if($_GET["dia"] == "Lunes"){
            $anterior = "Lunes";
            $siguiente = "Martes";
        }else if($_GET["dia"] == "Martes"){
            $anterior = "Lunes";
            $siguiente = "Miercoles";
        }else if($_GET["dia"] == "Miercoles"){
            $anterior = "Martes";
            $siguiente = "Jueves";
        }else if($_GET["dia"] == "Jueves"){
            $anterior = "Miercoles";
            $siguiente = "Viernes";
        }else if($_GET["dia"] == "Viernes"){
            $anterior = "Jueves";
            $siguiente = "Sabado";
        }else if($_GET["dia"] == "Sabado"){
            $anterior = "Viernes";
            $siguiente = "Domingo";
        }else if($_GET["dia"] == "Domingo"){
            $anterior = "Sabado";
        }
    }

    $registros1=$conn->prepare($sql);
	$registros1->execute(array(":dni"=>$dni,":dia"=>$dia));
	$registros=$registros1->fetchAll();

    $tipo = " ";

    $calorias = $conn->prepare($sql1);
    $calorias->execute(array(":dia"=>$dia,":dni"=>$dni));
    $count = $calorias->fetchColumn();
    $fecha = " ";
    
    foreach($registros as $key){
        $fecha = $key["FECHA"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dieta.css">
    <title>Dieta</title>
</head>
<body>
    <header class="main-header">
			<a class="text-header" href="../../index.php">
				<span class="site-name">Nutricion 2.0</span>
			</a>
			<a class="text-header1" href="detalles.php?dni=<?php echo $dni?>&dia=<?php echo $dia?>">
			 <span class="site-name">Detalles</span>
            </a> 
            <a class="text-header1" href="../../forms/dieta/editarDieta.php?dni=<?php echo $dni?>&dia=<?php echo $dia?>">
			 <span class="site-name">Editar/Añadir</span>
            </a> 
	</header>
    <div class="container">
        <div class="container-item">
                <div class="title">
                    <p class="text-day"><?php echo $dia?></p>
                    <?php if($fecha !== " "): ?>
                    <p class="text-date">Actualizado el: <?php echo $fecha;?></p>
                    <?php endif;?>
                </div>
                <?php if($registros): ?>
                <?php foreach ($registros as $key):?>
                <?php if($key["TIPO"] !== $tipo): ?>
                <?php $tipo = $key["TIPO"] ?>
                <div class="body">    
                    <p class="tipo-text"><?php echo $key["TIPO"]?></p> 
                </div>
                <?php endif;?>
                <div class="list-group">
                    <div class="list-item"><?php echo $key["ALIMENTO"]?></div>
                </div>
                <?php endforeach; ?>
                <div class="list-group">
                    <p class="text-calorias">Calorias totales</p>
                    <div class="list-item"><?php echo $count?> kcal</div>
                </div>
                <?php else:?>
                    <div class="list-group">
                        <h2>No hay dietas registradas para este dia</h2>
                    </div>
                <?php endif;?>
                <div class="btn-mood">
                    <a href="verDieta.php?dni=<?php echo $dni?>&dia=<?php echo $anterior?>">
                        <button class="btn">Volver</button>
                    </a>
                    <a href="verDieta.php?dni=<?php echo $dni?>&dia=<?php echo $siguiente?>">
                        <button class="btn">Siguiente</button>
                    </a>
                </div>
            </div>
    </div>
</body>
</html>