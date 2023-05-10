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

    if(isset($_POST["add"])){
        $dni = $_GET["dni"];
        $name = $_POST["name"];
        $last = $_POST["last"];
        $peso = $_POST["weight"];
        $altura = $_POST["height"];
        $masa = $_POST["masa"];
        $actividad = $_POST["activity"];
        
        $sql="UPDATE `nutricionista1`.`pacientes` 
        SET `nombre` = :name1, `Apellido` = :last1, 
        `peso` = :peso, `altura` = :altura, `masa_muscular` = :masa, `actividad_fisica` = :actividad
        WHERE (`dni` = :dni)";
        $result=$conn->prepare($sql);  
        $result->execute(array(":dni"=>$dni,":name1"=>$name,
                                ":last1"=>$last,":peso"=>$peso,":altura"=>$altura,
                                ":masa"=>$masa,":actividad"=>$actividad));
        header("Location:../../index.php");
      }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./custom.css">
    <title>Datos</title>
</head>
<body>
    <div class="container">
        <div class="container-form">
    <?php foreach ($registros as $key):?>
        <form class="form" name="form1" method="post" action="datos.php?dni=<?php echo $dni ?>">
                    <div class="item">
                        <label for="Cedula" class="label">Cedula</label>
                        <input type="number" name="dni" class="form-control" value="<?php echo $key["dni"] ?>" disabled>
                    </div>
                    <div class="item">
                    <label for="Cedula" class="label">Nombre</label>
                        <input type="text" name="name" class="form-control" maxlength="30" value="<?php echo $key["nombre"] ?>">
                    </div>
                    <div class="item">
                    <label for="Cedula" class="label">Apellido</label>
                        <input type="text" name="last" class="form-control" maxlength="30" value="<?php echo $key["Apellido"] ?>">
                    </div>
                    <div class="item">
                    <label for="Cedula" class="label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" value="<?php echo $key["fecha_nac"] ?>" disabled>
                    </div>
                    <div class="item">
                    <label for="Cedula" class="label">Peso(Kg)</label>
                        <input type="number" name="weight"min="30" max="140" class="form-control" value="<?php echo $key["peso"] ?>">
                    </div> 
                    <div class="item">
                    <label for="Cedula" class="label">Altura(Cm)</label>
                        <input type="number" name="height"min="80" max="240" class="form-control" value="<?php echo $key["altura"] ?>">
                    </div>
                    <div class="item">
                    <label for="Cedula" class="label">Masa Muscular %</label>
                        <input type="number" name="masa"min="05" max="100" class="form-control" value="<?php echo $key["masa_muscular"] ?>">
                    </div>   
                    <div class="item">
                    <label for="Cedula" class="label">Actividad</label>
                        <input type="Text" name="activity"class="form-control" maxlength="30" value="<?php echo $key["actividad_fisica"] ?>">
                    </div>
                    <?php endforeach; ?>
                    <div class="item">
                        <button type="submit" name="add" class="button btn-create">Actualizar Paciente</button>
                    </div>      
                </form>
                    <div class="item-btn">
                        <a href="../../">
                            <button class="button btn-create">Volver</button>
                        </a>
                        <a href="../../views/enfermedad/enfermedades.php?dni=<?php echo $dni?>">
                            <button class="button btn-create">Enfermedades</button>
                        </a>
                    </div>
            </div>
               
    </div>
</body>
</html>