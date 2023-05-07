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
    <link rel="stylesheet" href="./detalles.css">
    <title>Detalles</title>
</head>
<body>
    <div class="container">
        <div class="container-item">
                <div class="title">
                    <p class="text-day"><?php echo $dia?></p>
                </div>    
                <?php foreach ($registros as $key):?>
                
                <?php if($key["TIPO"] !== $tipo): ?>
                <?php $tipo = $key["TIPO"] ?>
                <div class="body">    
                    <p class="text-tipo"><?php echo $key["TIPO"]?></p> 
                </div>
                <?php endif;?>
                <div class="list-group">
                    <div class="list-item">
                        <div class="item"><?php echo $key["ALIMENTO"]?></div>
                        <div class="item"> <p><?php echo $key["VITAMINAS"]?></p></div>
                        <div class="item"><p><?php echo $key["NUTRIENTES"]?></p></div>
                        <div class="item"><p><?php echo $key["GRAMOS"]?> gramos</p></div>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="list-group">
                    <div class="list-item"><?php echo $count?> kcal</div>
                </div>
                <div class="container-btn">
                    <a href="../../index.php">
                        <button class="btn">Pagina Principal</button>
                    </a>
                    <a href="verDieta.php?dni=<?php echo $dni?>&dia=<?php echo $dia?>">
                        <button class="btn">Volver</button>
                    </a>   
                </div>

        </div>
    </div>
</body>
</html>