<?php 
    require_once("../../database/database.php");
    require_once("../../database/consultas.php");
    if(isset($_GET["dni"])){
        $dni = $_GET["dni"];
    }

    $registros = array();
		
	$sql = "SELECT * FROM pacientes WHERE dni=:dni";

	$registros1=$conn->prepare($sql);
	$registros1->execute(array(":dni"=>$dni));
	$registros=$registros1->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./cusstom.css">
    <title>Datos</title>
</head>
<body>
    <div class="container">
    <?php foreach ($registros as $key):?>
                <form class="form">
                    <div class="item">
                        <label for="Cedula" class="label">Cedula</label>
                        <input type="number" class="form-control" value="<?php echo $key["dni"] ?>" disabled>
                    </div>
                    <div class="item">
                    <label for="Cedula" class="label">Nombre</label>
                        <input type="text" class="form-control" maxlength="30" value="<?php echo $key["nombre"] ?>" disabled >
                    </div>
                    <div class="item">
                    <label for="Cedula" class="label">Apellido</label>
                        <input type="text" class="form-control" maxlength="30" value="<?php echo $key["Apellido"] ?>" disabled>
                    </div>
                    <div class="item">
                    <label for="Cedula" class="label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" value="<?php echo $key["fecha_nac"] ?>" disabled>
                    </div>
                    <div class="item">
                    <label for="Cedula" class="label">Peso(Kg)</label>
                        <input type="number" min="30" max="140" class="form-control" value="<?php echo $key["peso"] ?>" disabled>
                    </div> 
                    <div class="item">
                    <label for="Cedula" class="label">Altura(Cm)</label>
                        <input type="number" min="80" max="240" class="form-control" value="<?php echo $key["altura"] ?>" disabled>
                    </div>
                    <div class="item">
                    <label for="Cedula" class="label">Masa Muscular %</label>
                        <input type="number" min="05" max="100" class="form-control" value="<?php echo $key["masa_muscular"] ?>" disabled>
                    </div>   
                    <div class="item">
                    <label for="Cedula" class="label">Actividad</label>
                        <input type="Text" class="form-control" maxlength="30" value="<?php echo $key["actividad_fisica"] ?>" disabled>
                    </div>      
                </form>
                    <div class="item">
                    <a href="../../">
                        <button class="button btn-create">Volver</button>
                    </a>
                    <a href="../../views/enfermedad/enfermedades.php?dni=<?php echo $dni?>">
                        <button class="button btn-create">Enfermedades</button>
                    </a>
                    </div>
                <?php endforeach; ?>
    </div>
</body>
</html>