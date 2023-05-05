<?php
    require_once("database.php");
    require_once("consutas.php");

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./verDieta.css">
    <title>Dieta</title>
</head>
<body>
    <div class="container">
        <div class="container-item">
            <div class="card">
                <div class="card-title">
                    <p class="card-h5"><?php echo $dia?></p>
                </div>
                <hr class="solid">    
                <?php foreach ($registros as $key):?>
                <?php if($key["TIPO"] !== $tipo): ?>
                <?php $tipo = $key["TIPO"] ?>
                <div class="card-body">    
                    <p class="card-text text-uppercase"><?php echo $key["TIPO"]?></p> 
                </div>
                <?php endif;?>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $key["ALIMENTO"]?></li>
                </ul>
                <?php endforeach; ?>
                <div class="card-btn">
                    <a href="verDieta.php?dni=<?php echo $dni?>&dia=<?php echo $siguiente?>">
                        <button class="btn">Siguiente</button>
                    </a>
                    <a href="index.php">
                        <button class="btn">Pagina Principal</button>
                    </a>
                    <a href="editarDieta.php?dni=<?php echo $dni?>&dia=<?php echo $dia?>">
                    <button class="btn">Editar Dia</button>
                    </a>
                    <a href="verDieta.php?dni=<?php echo $dni?>&dia=<?php echo $anterior?>">
                        <button class="btn">Volver</button>
                    </a>   
                </div>
            </div>

        </div>
    </div>
</body>
</html>