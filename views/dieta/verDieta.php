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
    <div class="container">
        <div class="container-item">
                <div class="title">
                    <p class="text-day"><?php echo $dia?></p>
                    <p class="text-date"><?php echo $fecha;?></p>
                </div>
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
                    <div class="list-item"><?php echo $count?> kcal</div>
                </div>
                <div class="btn-mood">
                    <a href="verDieta.php?dni=<?php echo $dni?>&dia=<?php echo $siguiente?>">
                        <button class="btn">Siguiente</button>
                    </a>
                    <a href="verDieta.php?dni=<?php echo $dni?>&dia=<?php echo $anterior?>">
                        <button class="btn">Volver</button>
                    </a>
                </div>
                <div class="container-btn">
                    <a href="../../index.php">
                        <button class="btn">Pagina Principal</button>
                    </a>
                    <a href="../../forms/dieta/editarDieta.php?dni=<?php echo $dni?>&dia=<?php echo $dia?>">
                    <button class="btn">Editar Dia</button>
                    </a> 
                    <a href="detalles.php?dni=<?php echo $dni?>&dia=<?php echo $dia?>">
                        <button class="btn">Detalles</button>
                    </a> 
                </div>
            </div>
    </div>
</body>
</html>