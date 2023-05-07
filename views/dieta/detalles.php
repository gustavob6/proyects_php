<?php
    require_once("../../database/database.php");
    require_once("../../database/consultas.php");

    if(isset($_GET["dni"]) && isset($_GET["dia"])){
        $dni = $_GET["dni"];
        $dia = $_GET["dia"];
    }

    $registros1=$conn->prepare($sql);
	$registros1->execute(array(":dni"=>$dni,":dia"=>$dia));
	$registros=$registros1->fetchAll();

    $tipo = " ";

    $calorias = $conn->prepare($sql1);
    $calorias->execute(array(":dia"=>$dia,":dni"=>$dni));
    $count = $calorias->fetchColumn();    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./verDieta.css">
    <title>Detalles</title>
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
                    <li class="list-group-item"><?php echo $key["ALIMENTO"]?>
                        <p><?php echo $key["VITAMINAS"]?></p>
                        <p><?php echo $key["NUTRIENTES"]?></p>
                        <p><?php echo $key["GRAMOS"]?></p>
                    </li>
                </ul>
                <?php endforeach; ?>
                <div class="calorias"><?php echo $count?></div>
                <div class="card-btn">
                    <a href="../../index.php">
                        <button class="btn">Pagina Principal</button>
                    </a>
                    <a href="verDieta.php?dni=<?php echo $dni?>&dia=<?php echo $dia?>">
                        <button class="btn">Volver</button>
                    </a>   
                </div>
            </div>

        </div>
    </div>
</body>
</html>